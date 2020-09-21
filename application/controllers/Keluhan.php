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
        $this->load->model('M_Keluhan', 'keluhan');
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
            'title'   => 'Keluhan Pelanggan',
            'keluhan' => $this->keluhan->lists(),
            'isi'     => 'keluhan/v_lists',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function create_keluhan()
    {

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->form_validation->set_rules(
            'isi_keluhan',
            'Isi Keluhan',
            'required',
            array('required' => '%s Harus Diisi')
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'Buat Keluhan Pelanggan',
                'isi'   => 'keluhan/v_create_keluhan',
            );
            $this->load->view('template/v_wrapper', $data, false);
        } else {
            $user = $this->ion_auth->user($id)->row();
            $data = array(
                'tanggal'        => date("Y-m-d H:i:s"),
                'id_user'        => $user->id,
                'isi_keluhan'    => $this->input->post('isi_keluhan'),
                'status_keluhan' => '0',
                'nomor_tiket'    => $this->keluhan->add_tiket(),
            );
            $this->keluhan->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            redirect('keluhan');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules(
            'isi_keluhan',
            'Isi Keluhan',
            'required',
            array('required' => '%s Harus Diisi')
        );
        if ($this->form_validation->run() == false) {
            $data = array(
                'title'   => 'Edit Keluhan Pelanggan',
                'keluhan' => $this->keluhan->detail($id),
                'isi'     => 'keluhan/v_edit',
            );
            $this->load->view('template/v_wrapper', $data, false);
        } else {
            $data = array(
                'id'          => $id,
                'isi_keluhan' => $this->input->post('isi_keluhan'),
            );
            $this->keluhan->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('keluhan');
        }
    }
}
