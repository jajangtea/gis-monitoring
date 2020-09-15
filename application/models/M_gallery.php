<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_gallery extends CI_Model
{

    public function lists()
    {
        $this->db->select('gallery.*,COUNT(gallery.id_dma) as total_foto');
        $this->db->from('gallery');
        $this->db->join('gallery', 'gallery.id_dma = gallery.id_dma', 'left');
        $this->db->group_by('gallery.id_dma');
        $this->db->order_by('id_dma', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_dma)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('id_dma', $id_dma);
        return $this->db->get()->row();
    }

    public function lists2($id_dma)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('id_dma', $id_dma);
        $this->db->order_by('id_gallery', 'desc');
        return $this->db->get()->result();
    }

    public function detail_gallery($id_gallery)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('id_gallery', $id_gallery);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('gallery', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_gallery', $data['id_gallery']);
        $this->db->delete('gallery', $data);
    }

    ///rubah lagi
    public function edit($data)
    {
        $this->db->where('id_gallery', $data['id_gallery']);
        $this->db->update('gallery', $data);
    }

    public function edit_sampul($data)
    {
        $this->db->where('id_dma', $data['id_dma']);
        $this->db->update('gallery', $data);
    }
}

/* End of file M_galley.php */
