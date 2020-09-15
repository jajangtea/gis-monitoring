<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dma', 'dma');
        $this->load->model('m_gallery');
        $this->load->model('M_Profile_Pelanggan', 'profile_pelanggan');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function detail($id, $jenis = 'kecamatan', $type = 'point')
    {
        if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id))) {
            redirect('auth', 'refresh');
        }
        $this->session->set_userdata('last_idnya', $this->uri->segment('3'));

        // $getHotspot = $this->dma->lists_dma_rumah($id);
        // foreach ($getHotspot->result() as $row) {
        //     $data               = null;
        //     $data['type']       = "Feature";
        //     $data['properties'] = [
        //         "name"       => $row->nama_dma,
        //         "lokasi"     => $row->lokasi,
        //         "keterangan" => $row->deskripsi,
        //         "sampul"     => $row->sampul,
        //         "icon"       => ($row->icon == '') ? assets('icons/marker.png') : assets('unggah/marker/' . $row->icon),
        //         "popUp"      => "Lokasi : " . $row->lokasi . ", Kec. " . $row->nama_dma . "<br>Keterangan : <img class='media-object' src='" . assets_sampul($row->sampul) . "' width='200px' height='100px'>",
        //     ];
        //     $data['geometry'] = [
        //         "type"        => "Point",
        //         "coordinates" => [$row->longitude, $row->latitude],
        //     ];

        //     $response[] = $data;
        //     // echo json_encode($data);
        //     //echo "var hotspotPoint=" . json_encode($response, JSON_PRETTY_PRINT);
        // }
        $data = array(
            'title'             => 'Detail Peta Pelanggan',
            // 'profile_pelanggan' => $this->profile_pelanggan->edit_pelanggan($id)->row(),
            'profile_pelanggan' => $this->dma->lists_dma_rumah($id)->row(),
            // 'hotspotPoint'      => json_encode($response, JSON_PRETTY_PRINT),
            'isi'               => 'profile/v_detail',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

}

/* End of file Irigasi.php */
