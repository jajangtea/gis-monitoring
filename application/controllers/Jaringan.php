<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jaringan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Jaringan', 'jaringan');
        $this->lang->load('auth');
        $this->load->model('m_dma');
        $this->load->model('HotspotModel', 'hotspot');
        $this->load->model('M_Marker', 'marker');
        $this->load->model('m_gallery');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    }

    public function index()
    {
        $data = array(
            'title'    => 'Jaringan Pipa',
            'jaringan' => $this->jaringan->lists(),
            'isi'      => 'jaringan/v_lists',
        );
        $this->load->view('template/v_wrapper', $data, false);

    }

    public function addview()
    {
        $data = array(
            'title' => 'Tambah Jaringan Pipa',
            'isi'   => 'jaringan/v_addview',
        );
        $this->load->view('template/v_wrapper', $data, false);

    }

    public function add()
    {

        $GeoJson = $this->input->post('result');
        // ---
        $data['GeoJson'] = $GeoJson;
        // ----
        $this->db->insert('jaringan', $data);
        echo 'Data Berhasil Ditambahkan';

    }

}
