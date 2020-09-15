<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dma');
        $this->load->model('M_Profile_Pelanggan', 'profile');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function index()
    {
        $data = array(
            'title'    => 'Pemetaan',
            'kegiatan' => $this->m_dma->lists(),
            'profile'  => $this->profile->lists(),
            'isi'      => 'v_home3',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function geojson()
    {
        $data = array(
            'title'    => 'Pemetaan',
            'kegiatan' => $this->m_kegiatan->lists(),
            'isi'      => 'v_geojson',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function pemetaan_json()
    {
        $kegiatan = $this->m_kegiatan->lists();
        echo json_encode($kegiatan);
    }

    public function detail($id_tempat)
    {
        $tempat = $this->m_tempat->detail($id_tempat);
        $data   = array(
            'title'  => 'Gis Irigasi Kabupaten Luwu Timur',
            'title2' => 'Detail Tempat',
            'tempat' => $tempat,
            'isi'    => 'v_detail',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function about()
    {
        $data = array(
            'title' => 'About Me',
            'isi'   => 'v_about',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function kegiatan_pertahun($tahun)
    {
        $data = array(
            'title'    => 'Kegiatan Fisik Per Tahun : ' . $tahun,
            'kegiatan' => $this->m_home->kegiatan_pertahun($tahun),
            'isi'      => 'v_home3',
        );
        $this->load->view('template/v_wrapper', $data, false);
        //echo json_encode($data);
    }

    public function kegiatan_sumberdana($tahun, $id_sumberdana)
    {
        $kegiatan   = $this->m_home->kegiatan_sumberdana($tahun, $id_sumberdana);
        $sumberdana = $this->m_home->detailsumberdana($id_sumberdana);
        $data       = array(
            'title'    => 'Kegiatan Fisik Per Tahun : <b>' . $tahun . '</b> <i class="ace-icon fa fa-angle-double-right"></i> Sumber Dana : <b>' . $sumberdana->sumber_dana . '</b>',
            'kegiatan' => $kegiatan,
            'isi'      => 'v_home3',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }
}

/* End of file Home.php */
