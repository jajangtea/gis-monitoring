<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_gallery_rumah extends CI_Model
{

    public function lists()
    {
        $this->db->select('users.*, profile_pelanggan.*, COUNT(gallery_rumah.id_gallery_rumah) AS total_foto');
        $this->db->from('users');
        $this->db->join('profile_pelanggan', 'profile_pelanggan.id_user = users.id', 'left');
        $this->db->join('gallery_rumah', 'gallery_rumah.id_user = users.id', 'left');
        $this->db->join('users_groups', 'users_groups.user_id = users.id', 'inner');
        $this->db->where('users_groups.group_id', 3);
        $this->db->group_by('users.id');
        $this->db->order_by('users.first_name', 'asc');
        return $this->db->get()->result();
    }

    public function show($id)
    {
        $this->db->select('users.*, profile_pelanggan.*, COUNT(gallery_rumah.id_gallery_rumah) AS total_foto');
        $this->db->from('users');
        $this->db->join('profile_pelanggan', 'profile_pelanggan.id_user = users.id', 'left');
        $this->db->join('gallery_rumah', 'gallery_rumah.id_user = users.id', 'left');
        $this->db->join('users_groups', 'users_groups.user_id = users.id', 'inner');
        $this->db->where('users_groups.group_id', 3);
        $this->db->where('users.id', $id);
        $this->db->group_by('users.id');
        $this->db->order_by('users.first_name', 'asc');
        return $this->db->get()->result();
    }

    public function show_sampul($id)
    {
        $this->db->select('users.*,hotspot.*, profile_pelanggan.*, COUNT(gallery_rumah.id_gallery_rumah) AS total_foto');
        $this->db->from('users');
        $this->db->join('profile_pelanggan', 'profile_pelanggan.id_user = users.id', 'left');
        $this->db->join('hotspot', 'hotspot.id = profile_pelanggan.id_hotspot', 'left');
        $this->db->join('gallery_rumah', 'gallery_rumah.id_user = users.id', 'left');
        $this->db->join('users_groups', 'users_groups.user_id = users.id', 'inner');
        $this->db->where('users_groups.group_id', 3);
        $this->db->where('users.id', $id);
        $this->db->group_by('users.id');
        $this->db->order_by('users.first_name', 'asc');
        return $this->db->get()->row();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('profile_pelanggan');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }

    public function lists2($id)
    {
        $this->db->select('*');
        $this->db->from('gallery_rumah');
        $this->db->where('id_user', $id);
        $this->db->order_by('id_gallery_rumah', 'desc');
        return $this->db->get()->result();
    }

    public function detail_gallery($id_gallery)
    {
        $this->db->select('*');
        $this->db->from('gallery_rumah');
        $this->db->where('id_gallery', $id_gallery);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('gallery_rumah', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_gallery', $data['id_gallery']);
        $this->db->delete('gallery_rumah', $data);
    }

    ///rubah lagi
    public function edit($data)
    {
        $this->db->where('id_gallery', $data['id_gallery']);
        $this->db->update('gallery_rumah', $data);
    }

    public function edit_sampul($data)
    {
        $this->db->where('id_user', $data['id_user']);
        $this->db->update('profile_pelanggan', $data);
    }
}

/* End of file M_galley.php */
