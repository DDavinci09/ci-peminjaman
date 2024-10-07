<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function getAllPegawai()
    {
        return $this->db->get('tb_user')->result_array();
    }
    
    public function getAllPegawai2()
    {
        return $this->db->get_where('tb_user', ['level' => 'Pegawai'])->result_array();
    }

    public function getId_user($id_user)
    {
        return $this->db->get('tb_user', ['id_user' => $id_user])->row_array();
    }
    
    public function getId_user2($user)
    {
        return $this->db->get('tb_user', ['id_user' => $user['id_user']])->row_array();
    }

    public function tambah()
    {
        $data = [
            'username' => $this->input->post('username', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "level" => $this->input->post('level', true),
            "status" => $this->input->post('status', true),
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
            "no_hp" => $this->input->post('no_hp', true),
            "divisi" => $this->input->post('divisi', true)
        ];

        $this->db->insert('tb_user', $data);
    }

    public function update()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nik" => $this->input->post('nik', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
            "no_hp" => $this->input->post('no_hp', true),
            "divisi" => $this->input->post('divisi', true)
        ];

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('tb_user', $data);
    }
    
    public function updateUsername()
    {
        $data = [
            "username" => htmlspecialchars($this->input->post('username', true))
        ];

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('tb_user', $data);
    }
    
    public function updatePassword()
    {
        $data = [
            "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];

        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('tb_user', $data);
    }

    public function hapus($id_user)
    {
        $this->db->delete('tb_user', ['id_user' => $id_user]);
    }
}


