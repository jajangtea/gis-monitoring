<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_dma', 'dma');
        $this->load->model('HotspotModel');
    }

    public function dataku($type = 'point')
    {
        $idnya = $this->session->userdata('last_idnya');
        //   exit;
        header('Content-Type: application/json');
        $response = [];

        if ($type == 'point') {
            //$getHotspot = $this->dma->lists_row();
            $getHotspot = $this->dma->lists_dma_rumah($idnya);
            foreach ($getHotspot->result() as $row) {
                $data               = null;
                $data['type']       = "Feature";
                $data['properties'] = [
                    "name"       => $row->first_name . '' . $row->last_name,
                    "lokasi"     => $row->pekerjaan,
                    "keterangan" => $row->no_registrasi,
                    "sampul"     => $row->sampul_rumah,
                    "icon"       => ($row->icon_rumah) == '' ? assets_marker('marker.png') : assets_marker($row->icon_rumah),
                    "popUp"      => "Nama : " . $row->first_name . ' ' . $row->last_name . ", <br/>Pekerjaan : " . $row->pekerjaan . "<br>Rumah : <img class='media-object' src='" . assets_sampul($row->sampul_rumah) . "' width='200px' height='100px'>",
                ];
                $data['geometry'] = [
                    "type"        => "Point",
                    "coordinates" => [$row->pel_lng, $row->pel_lat],
                ];

                $response[] = $data;
            }
            echo "var hotspotPoint=" . json_encode($response, JSON_PRETTY_PRINT);
        }
    }

}
