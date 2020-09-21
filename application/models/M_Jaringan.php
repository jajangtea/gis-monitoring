<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Jaringan extends CI_Model
{

    public function lists()
    {
        $this->db->select('*');
        $this->db->from('jaringan');
        return $this->db->get()->result();
    }

    public function lists_nama()
    {
        $this->db->select('*');
        $this->db->from('jaringan_master');
        $this->db->group_by('nama');
        return $this->db->get()->result();
    }

}
