<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leafletroutingmachine extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('HotspotModel');
        $this->load->model('KecamatanModel');

        $this->load->model('m_dma', 'dma');
        $this->load->model('m_gallery');
        $this->load->model('M_Profile_Pelanggan', 'profile_pelanggan');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function index()
    {
        $datacontent['url']   = 'admin/leafletroutingmachine';
        $datacontent['title'] = 'Halaman Leaflet Routing Machine';
        // $datacontent['datatable']=$this->Model->get();
        $data['isi']   = 'leafletroutingmachine/mapView';
        $data['title'] = $datacontent['title'];
        // $this->load->view('admin/layouts/html', $data);
        $this->load->view('template/v_wrapper', $data, false);
    }
}
