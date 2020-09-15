<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Marker extends CI_Model
{

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('marker');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function lists_row()
    {
        $this->db->select('*');
        $this->db->from('marker');
        $this->db->order_by('id', 'desc');
        return $this->db->get();
    }

    public function lists_dma_rumah($id)
    {
        $this->db->select('*');
        $this->db->from('profile_pelanggan a');
        $this->db->join('marker b', 'a.id=b.id', 'left');
        $this->db->join('users c', 'a.id_user=c.id', 'left');
        $this->db->where('id_user', $id);
        return $this->db->get();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('marker');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('marker', $data);
    }

    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('marker', $data);
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('marker', $data);
    }

    public function get_icon($id)
    {
        $query = $this->db->get_where('marker', array('icon' => $id));
        return $query;
    }
}

/* End of file kegiatan.php */
