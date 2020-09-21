<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dma extends CI_Controller
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
            'isi'      => 'dma/v_lists',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function create_dma()
    {

        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->form_validation->set_rules(
            'nama_dma',
            'Nama Kegiatan',
            'required',
            array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'lokasi',
            'lokasi',
            'required',
            array('required' => '%s Harus Diisi')
        );
        $this->form_validation->set_rules(
            'latitude',
            'Latitude',
            'required',
            array('required' => '%s Harus Diisi')
        );
        $this->form_validation->set_rules(
            'longitude',
            'Longitude',
            'required',
            array('required' => '%s Harus Diisi')
        );
        if ($this->form_validation->run() == false) {
            $data = array(
                'marker' => $this->marker->lists(),
                'title'  => 'Add DMA',
                'isi'    => 'dma/v_create_dma',
            );
            $this->load->view('template/v_wrapper', $data, false);
        } else {

            $data_hotspot = array(
                'lat' => $this->input->post('latitude'),
                'lng' => $this->input->post('longitude'),
            );
            $this->hotspot->add($data_hotspot);
            $data = array(
                'nama_dma'   => $this->input->post('nama_dma'),
                'lokasi'     => $this->input->post('lokasi'),
                'deskripsi'  => $this->input->post('deskripsi'),
                'icon'       => $this->input->post('icon'),
                'id_hotspot' => $this->db->insert_id(),
            );

            $this->m_dma->add($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan');
            redirect('dma');
        }
    }

    public function edit($id_dma)
    {

        $this->form_validation->set_rules(
            'nama_dma',
            'Nama DMA',
            'required',
            array('required' => '%s Harus Diisi')
        );

        $this->form_validation->set_rules(
            'lokasi',
            'lokasi',
            'required',
            array('required' => '%s Harus Diisi')
        );
        $this->form_validation->set_rules(
            'latitude',
            'Latitude',
            'required',
            array('required' => '%s Harus Diisi')
        );
        $this->form_validation->set_rules(
            'longitude',
            'Longitude',
            'required',
            array('required' => '%s Harus Diisi')
        );
        $this->data['id_hotspot'] = [
            'name' => 'id_hotspot',
            'id'   => 'id_hotspot',
            'type' => 'hidden',

        ];
        if ($this->form_validation->run() == false) {
            $hdma = $this->m_dma->detail($id_dma);

            $data = array(
                'marker'  => $this->marker->lists(),
                'title'   => 'Edit Data DMA',
                'dma'     => $this->m_dma->detail($id_dma),
                'hotspot' => $this->hotspot->detail($hdma->id_hotspot),
                'isi'     => 'dma/v_edit',
            );
            $this->load->view('template/v_wrapper', $data, false);
        } else {
            $hdma = $this->m_dma->detail($id_dma);
            $data = array(
                'id_dma'     => $id_dma,
                'nama_dma'   => $this->input->post('nama_dma'),
                'lokasi'     => $this->input->post('lokasi'),
                'deskripsi'  => $this->input->post('deskripsi'),
                'icon'       => $this->input->post('marker'),
                'id_hotspot' => $hdma->id_hotspot,
            );
            $data_hotspot = array(
                'id'  => $hdma->id_hotspot,
                'lat' => $this->input->post('latitude'),
                'lng' => $this->input->post('longitude'),
            );
            $this->hotspot->edit($data_hotspot);
            $this->m_dma->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('dma');
        }
    }

    public function delete($id_dma)
    {
        $this->user_login->cek_login();
        $data = array('id_dma' => $id_dma);
        $this->m_dma->delete($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil Dihapus !!');
        redirect('kegiatan');
    }

    public function detail($id_dma)
    {
        $hdma = $this->m_dma->detail($id_dma);
        $data = array(
            'title'   => 'Detail Kegiatan Fisik',
            'hotspot' => $this->hotspot->detail($hdma->id_hotspot),
            'dma'     => $this->m_dma->detail($id_dma),
            'gallery' => $this->m_gallery->lists2($id_dma),
            'isi'     => 'dma/v_detail',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function lap()
    {
        $data = array(
            'title'    => 'Rekap Laporan Kegiatan',
            'kegiatan' => $this->m_dma->lists(),
            'isi'      => 'dma/v_laporan',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function laporan()
    {
        if ($this->input->post('tahun') == "All") {
            redirect('dma/lap');
        } else {
            $tahun = $this->input->post('tahun');
            $data  = array(
                'title'    => 'Rekap Laporan Kegiatan',
                'kegiatan' => $this->m_dma->lists_tahun($tahun),
                'isi'      => 'dma/v_laporan',
            );
            $this->session->set_flashdata('tahun', $tahun);

            $this->load->view('template/v_wrapper', $data, false);
        }
    }

    public function get_icon()
    {
        $id   = $this->input->post('id', true);
        $data = $this->marker->get_icon($id)->result();
        // // print_r($data->icon);
        // // exit;
        // $str = '';
        // $str = '<img src="' . base_url('icon/' . $data->icon) . '"';
        // echo $str;
        echo json_encode($data);
    }
}

/* End of file Irigasi.php */
