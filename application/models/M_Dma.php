<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Dma extends CI_Model
{

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('dma a');
        $this->db->join('hotspot b', 'a.id_hotspot=b.id', 'left');
        $this->db->order_by('id_dma', 'desc');
        return $this->db->get()->result();
    }

    public function lists_row()
    {
        $this->db->select('*');
        $this->db->from('dma');
        $this->db->order_by('id_dma', 'desc');
        return $this->db->get();
    }

    public function lists_dma_rumah($id)
    {
        $this->db->select('*,d.lat AS pel_lat,d.lng AS pel_lng,a.icon as icon_rumah');
        $this->db->from('profile_pelanggan a');
        $this->db->join('dma b', 'a.id_dma=b.id_dma', 'left');
        $this->db->join('hotspot d', 'a.id_hotspot=d.id', 'inner');
        $this->db->join('hotspot e', 'b.id_hotspot=e.id', 'inner');
        $this->db->join('users c', 'a.id_user=c.id', 'left');
        $this->db->where('id_user', $id);
        return $this->db->get();
    }

    public function detail($id_dma)
    {
        $this->db->select('*');
        $this->db->from('dma');
        $this->db->where('id_dma', $id_dma);
        return $this->db->get()->row();
    }

    public function get_nama_dma($id_dma)
    {
        $this->db->select('*');
        $this->db->from('dma');
        $this->db->where('id_dma', $id_dma);
        if (empty($this->db->get()->row()->nama_dma)) {
            return "Tidak Aktif";
        } else {
            return $this->db->get()->row()->nama_dma;
        }

    }

    public function add($data)
    {
        $this->db->insert('dma', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_dma', $data['id_dma']);
        $this->db->delete('dma', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_dma', $data['id_dma']);
        $this->db->update('dma', $data);
    }
}

/* End of file kegiatan.php */
