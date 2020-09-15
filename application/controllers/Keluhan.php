<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dma');
        $this->load->model('HotspotModel', 'hotspot');
        $this->load->model('M_Marker', 'marker');
        $this->load->model('m_gallery');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function index()
    {
        $data = array(
            'title'    => 'Data Distrik Meter Area (DMA)',
            'kegiatan' => $this->m_dma->lists(),
            'isi'      => 'keluhan/v_lists',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }
}
