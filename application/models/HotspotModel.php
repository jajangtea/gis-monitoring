<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HotspotModel extends CI_Model
{

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('hotspot');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function lists_row()
    {
        $this->db->select('*');
        $this->db->from('hotspot');
        $this->db->order_by('id', 'desc');
        return $this->db->get();
    }

    // public function lists_dma_rumah($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('profile_pelanggan a');
    //     $this->db->join('hotspot b', 'a.id=b.id', 'left');
    //     $this->db->join('users c', 'a.id_user=c.id', 'left');
    //     $this->db->where('id_user', $id);
    //     return $this->db->get();
    // }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('hotspot');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('hotspot', $data);
    }

    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('hotspot', $data);
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('hotspot', $data);
    }
}
