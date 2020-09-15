<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Profile_Pelanggan extends CI_Model
{

    public function lists()
    {
        $this->db->select('*,b.lat as pel_lat,b.lng as pel_lng');
        $this->db->from('profile_pelanggan a');
        $this->db->join('hotspot b', 'a.id_hotspot=b.id', 'inner');
        $this->db->join('users c', 'a.id_user=c.id', 'inner');
        return $this->db->get()->result();
    }

    public function edit_pelanggan($id)
    {
        $this->db->select('*');
        $this->db->from('profile_pelanggan');
        $this->db->join('hotspot', 'hotspot.id=profile_pelanggan.id_hotspot', 'left');
        $this->db->where('id_user', $id);
        return $this->db->get();
    }

    public function update_profile($data_profile)
    {
        $this->db->where('id_user', $data_profile['id_user']);
        $this->db->update('profile_pelanggan', $data_profile);
    }

    public function get_no_registrasi()
    {
        $q  = $this->db->query("SELECT MAX(RIGHT(no_invoice,4)) AS kd_max FROM profile_pelanggan WHERE DATE(tanggal)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd  = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }

    public function simpan_invoice($no_invoice)
    {
        $hasil = $this->db->query("INSERT INTO tbl_invoice (no_invoice) VALUES ('$no_invoice')");
        return $hasil;
    }

}

/* End of file kegiatan.php */
