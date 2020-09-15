<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rumah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gallery_rumah');
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data = array(
            'title'   => 'Gallery Rumah Pelanggan',
            'gallery' => $this->m_gallery_rumah->lists(),
            'isi'     => 'gallery_rumah/v_lists',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function show($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data = array(
            'title'   => 'Gallery Rumah Pelanggan',
            'gallery' => $this->m_gallery_rumah->show($id),
            'isi'     => 'gallery_rumah/v_lists',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function show_sampul($id)
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth', 'refresh');
        }
        $data = array(
            'title'         => 'Gallery Rumah Pelanggan',
            'gallery'       => $this->m_gallery_rumah->show_sampul($id),
            'gallery_rumah' => $this->m_gallery_rumah->lists2($id),
            'isi'           => 'gallery_rumah/v_show',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function add($id)
    {
        $this->form_validation->set_rules(
            'ket_rumah',
            'Keterangan Foto',
            'required',
            array('required' => '%s Harus Diisi')
        );

        if ($this->form_validation->run()) {
            $config['upload_path']   = './foto_rumah/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_rumah')) {

                $data = array(
                    'title'             => 'Add Gallery',
                    'gallery'           => $this->m_gallery_rumah->lists2($id),
                    'profile_pelanggan' => $this->m_gallery_rumah->detail($id),
                    'error_upload'      => $this->upload->display_errors(),
                    'isi'               => 'gallery_rumah/v_add',
                );
                $this->load->view('template/v_wrapper', $data, false);
            } else {
                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = './foto_rumah/' . $upload_data['uploads']['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $i    = $this->input;
                $data = array(
                    'id_user'    => $id,
                    'ket_rumah'  => $i->post('ket_rumah'),
                    'foto_rumah' => $upload_data['uploads']['file_name'],
                );
                $this->m_gallery_rumah->add($data);
                $this->session->set_flashdata('pesan', ' Foto Berhasil Ditambahkan !');
                redirect('rumah/add/' . $id);
            }
        }
        $data = array(
            'title'             => 'Add Gallery',
            'gallery'           => $this->m_gallery_rumah->lists2($id),
            'profile_pelanggan' => $this->m_gallery_rumah->detail($id),
            'isi'               => 'gallery_rumah/v_add',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function edit($id, $id_gallery)
    {

        $config['upload_path']   = './foto_rumah/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2000;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto_rumah')) {
            $data = array(
                'id_gallery' => $id_gallery,
                'ket_rumah'  => $this->input->post('ket_rumah'),
            );
            $this->m_gallery_rumah->edit($data);
            $this->session->set_flashdata('pesan', ' Data Berhasil Diedit !');
            redirect('rumah/add/' . $id);
        } else {
            //hapus gambar
            $gallery = $this->m_gallery_rumah->detail_gallery($id_gallery);
            if ($jenis->icon != "") {
                unlink('./foto_rumah/' . $jenis->icon);
            }
            //===========================
            $upload_data             = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image']  = './foto_rumah/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $i    = $this->input;
            $data = array(
                'id_gallery' => $id_gallery,
                'ket_rumah'  => $i->post('ket_rumah'),
                'foto_rumah' => $upload_data['uploads']['file_name'],
            );
            $this->m_gallery_rumah->edit($data);
            $this->session->set_flashdata('pesan', ' Data Berhasil Diedit !');
            redirect('rumah/add/' . $id);
        }
    }

    public function delete($id, $id_gallery)
    {
        //hapus gambar
        $gallery = $this->m_gallery_rumah->detail_gallery($id_gallery);
        if ($gallery->foto_rumah != "") {
            unlink('./foto_rumah/' . $gallery->foto_rumah);
        }
        //===========================
        $data = array(
            'id_gallery' => $id_gallery,
        );
        $this->m_gallery_rumah->delete($data);
        $this->session->set_flashdata('pesan', ' Foto Berhasil Hapus !');
        redirect('rumah/add/' . $id);
    }

    public function sampul($id)
    {

        $config['upload_path']   = './sampul/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2000;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('sampul_rumah')) {
            $this->session->set_flashdata('pesan', 'Upload Sampul Gagal, Periksa Ukuran Dan Format Sampul !! ');
            redirect('rumah');
        } else {
            //hapus gambar
            $kegiatan = $this->m_gallery_rumah->detail($id);
            if ($kegiatan->sampul_rumah != "sampul.jpg") {
                unlink('./sampul/' . $kegiatan->sampul_rumah);
            }
            //===========================
            $upload_data             = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image']  = './sampul/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $i    = $this->input;
            $data = array(
                'id_user'      => $id,
                'sampul_rumah' => $upload_data['uploads']['file_name'],
            );
            $this->m_gallery_rumah->edit_sampul($data); //==>rubah lagi
            $this->session->set_flashdata('pesan', ' Sampul Berhasil Diganti !');
            redirect('rumah');
        }
    }
}

/* End of file Gallery.php */
