<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_gallery');
    }

    public function index()
    {
        $data = array(
            'title'   => 'Data Gallery',
            'gallery' => $this->m_gallery->lists(),
            'isi'     => 'gallery/v_lists',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function add($id_dma)
    {
        $this->form_validation->set_rules(
            'ket_foto',
            'Keterangan Foto',
            'required',
            array('required' => '%s Harus Diisi')
        );

        if ($this->form_validation->run()) {
            $config['upload_path']   = './foto_kegiatan/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_kegiatan')) {

                $data = array(
                    'title'        => 'Add Gallery',
                    'gallery'      => $this->m_gallery->lists2($id_dma),
                    'kegiatan'     => $this->m_gallery->detail($id_dma),
                    'error_upload' => $this->upload->display_errors(),
                    'isi'          => 'gallery/v_add',
                );
                $this->load->view('template/v_wrapper', $data, false);
            } else {
                $upload_data             = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image']  = './foto_kegiatan/' . $upload_data['uploads']['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $i    = $this->input;
                $data = array(
                    'id_dma'        => $id_dma,
                    'ket_foto'      => $i->post('ket_foto'),
                    'foto_kegiatan' => $upload_data['uploads']['file_name'],
                );
                $this->m_gallery->add($data);
                $this->session->set_flashdata('pesan', ' Foto Berhasil Ditambahkan !');
                redirect('gallery/add/' . $id_dma);
            }
        }
        $data = array(
            'title'    => 'Add Gallery',
            'gallery'  => $this->m_gallery->lists2($id_dma),
            'kegiatan' => $this->m_gallery->detail($id_dma),
            'isi'      => 'gallery/v_add',
        );
        $this->load->view('template/v_wrapper', $data, false);
    }

    public function edit($id_dma, $id_gallery)
    {

        $config['upload_path']   = './foto_kegiatan/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2000;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto_kegiatan')) {
            $data = array(
                'id_gallery' => $id_gallery,
                'ket_foto'   => $this->input->post('ket_foto'),
            );
            $this->m_gallery->edit($data);
            $this->session->set_flashdata('pesan', ' Data Berhasil Diedit !');
            redirect('gallery/add/' . $id_dma);
        } else {
            //hapus gambar
            $gallery = $this->m_gallery->detail_gallery($id_gallery);
            if ($jenis->icon != "") {
                unlink('./foto_kegiatan/' . $jenis->icon);
            }
            //===========================
            $upload_data             = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image']  = './foto_kegiatan/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $i    = $this->input;
            $data = array(
                'id_gallery'    => $id_gallery,
                'ket_foto'      => $i->post('ket_foto'),
                'foto_kegiatan' => $upload_data['uploads']['file_name'],
            );
            $this->m_gallery->edit($data);
            $this->session->set_flashdata('pesan', ' Data Berhasil Diedit !');
            redirect('gallery/add/' . $id_dma);
        }
    }

    public function delete($id_dma, $id_gallery)
    {
        //hapus gambar
        $gallery = $this->m_gallery->detail_gallery($id_gallery);
        if ($gallery->foto_kegiatan != "") {
            unlink('./foto_kegiatan/' . $gallery->foto_kegiatan);
        }
        //===========================
        $data = array(
            'id_gallery' => $id_gallery,
        );
        $this->m_gallery->delete($data);
        $this->session->set_flashdata('pesan', ' Foto Berhasil Hapus !');
        redirect('gallery/add/' . $id_dma);
    }

    public function sampul($id_dma)
    {

        $config['upload_path']   = './sampul/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2000;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sampul')) {
            $this->session->set_flashdata('pesan', 'Upload Sampul Gagal, Periksa Ukuran Dan Format Sampul !! ');
            redirect('gallery');
        } else {
            //hapus gambar
            $kegiatan = $this->m_gallery->detail($id_dma);
            if ($kegiatan->sampul != "sampul.jpg") {
                unlink('./sampul/' . $kegiatan->sampul);
            }
            //===========================
            $upload_data             = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image']  = './sampul/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $i    = $this->input;
            $data = array(
                'id_dma' => $id_dma,
                'sampul' => $upload_data['uploads']['file_name'],
            );
            $this->m_gallery->edit_sampul($data); //==>rubah lagi
            $this->session->set_flashdata('pesan', ' Sampul Berhasil Diganti !');
            redirect('gallery');
        }
    }
}

/* End of file Gallery.php */
