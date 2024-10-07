<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{
    public function getAllPeminjaman()
    {
        return $this->db->get('tb_user')->result_array();
    }
    
    public function getId_user($id_user)
    {
        return $this->db->get('tb_user', ['id_user' => $id_user])->row_array();
    }

    public function tambahPeminjaman()
    {
        $data = [
            "kd_kendaraan" => $this->input->post('kd_kendaraan', true),
            "jenis_kendaraan" => $this->input->post('jenis_kendaraan', true),
            "merk" => $this->input->post('merk', true),
            "nomor_polisi" => $this->input->post('nomor_polisi', true),
            "warna" => $this->input->post('warna', true),
            "status_kendaraan" => $this->input->post('status_kendaraan', true),
        ];

        $this->db->insert('tb_peinjaman', $data);
    }

}