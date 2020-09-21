<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Keluhan extends CI_Model
{

    public function lists()
    {
        $this->db->select('*,a.id as id_keluhan');
        $this->db->from('keluhan a');
        $this->db->join('users b', 'a.id_user=b.id', 'inner');
        $this->db->join('profile_pelanggan c', 'c.id_user=b.id', 'inner');
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get()->result();
    }

    public static function status($id)
    {
        $keluhan = "0";
        switch ($keluhan) {
            case '0':
                return "Pending";
                break;
            case '1':
                return "Proses";
                break;
            case '2':
                return "Selesai";
                break;
            default:
                return "Error";
                break;
        }
    }

    public function add_tiket()
    {
        $no   = date("Y-m-d H:i:s");
        $long = strtotime($no);
        return 'K-' . $long;
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

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('keluhan');
        $this->db->where('id', $id);
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
        $this->db->insert('keluhan', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_dma', $data['id_dma']);
        $this->db->delete('dma', $data);
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('keluhan', $data);
    }
}

/* End of file kegiatan.php */
