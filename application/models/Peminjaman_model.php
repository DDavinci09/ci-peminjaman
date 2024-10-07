<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_model extends CI_Model
{    
    public function getKd_kendaraan($kd_kendaraan)
    {
        return $this->db->get_where('tb_kendaraan', ['kd_kendaraan' => $kd_kendaraan])->row_array();
    }

    public function getKd_peminjaman($kd_peminjaman)
    {
        return $this->db->get_where('tb_peminjaman', ['kd_peminjaman' => $kd_peminjaman])->row_array();
    }

    public function getAllPeminjaman2()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }
    
    public function totalAllPeminjaman2()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    public function peminjamanMenunggu()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Menunggu']);
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }
    
    public function peminjamanDitolak()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Tolak']);
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }
    
    public function peminjamanDiterima()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Terima']);
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }


    public function totalAllPeminjaman3()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->group_by('tb_peminjaman.kd_peminjaman');
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    public function getAllPeminjaman3()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->group_by('tb_peminjaman.kd_peminjaman');
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }

    public function peminjamanMenunggu2()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Menunggu']);
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }
    
    public function peminjamanDitolak2()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Tolak']);
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }
    
    public function peminjamanDiterima2()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Terima']);
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }


    public function getKd_peminjaman2($kd_peminjaman)
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        return $this->db->get_where('tb_peminjaman', ['kd_peminjaman' => $kd_peminjaman])->row_array();
    }
    

    public function aprovePeminjaman($konfirmasi, $kd_peminjaman)
    {
        $data = [
            "status_konfirmasi" => $konfirmasi
        ];

        $this->db->update('tb_peminjaman', $data, ['kd_peminjaman' => $kd_peminjaman]);
    }

    public function autoKD()
    {
        // Get the maximum code from the barang table
        $query = $this->db->query("SELECT MAX(kd_peminjaman) as kodeTerbesar FROM tb_peminjaman");
        $data = $query->row_array();
        $kodeBarang = $data['kodeTerbesar'];

        // Extract the numeric part of the code and convert it to an integer
        $urutan = (int) substr($kodeBarang, 3, 3);

        // Increment the number to determine the next sequence
        $urutan++;

        // Form the new barang code
        $huruf = "PJ";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);

        return $kodeBarang;
    }

    public function tambahPeminjaman($kd_kendaraan)
    {
        $data = [
            "kd_peminjaman" => $this->input->post('kd_peminjaman', true),
            "tgl_keberangkatan" => $this->input->post('tgl_keberangkatan', true),
            "waktu_peminjaman" => $this->input->post('waktu_peminjaman', true),
            "id_user" => $this->input->post('id_user', true),
            "nama_user" => $this->input->post('nama_user', true),
            "kd_kendaraan" => $this->input->post('kd_kendaraan', true),
            "status_konfirmasi" => $this->input->post('status_konfirmasi', true),
            "tujuan" => $this->input->post('tujuan', true),
            "penanggung_jawab" => $this->input->post('penanggung_jawab', true)
        ];

        $this->db->insert('tb_peminjaman', $data);
    }

    // Total Peminjaman Admin
    public function totalPeminjamanAdmin()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where('status_konfirmasi !=', 'Dikembalikan');
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    public function peminjamanAdminMenunggu()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Menunggu']);
        return $this->db->get('tb_peminjaman')->num_rows();
    }
    
    public function peminjamanAdminDitolak()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Tolak']);
        return $this->db->get('tb_peminjaman')->num_rows();
    }
    
    public function peminjamanAdminDiterima()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Terima']);
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    // Total Peminjaman Pegawai
    public function totalPeminjamanPegawai()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->group_by('tb_peminjaman.kd_peminjaman');
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    public function peminjamanPegawaiMenunggu()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Menunggu']);
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    public function peminjamanPegawaiDitolak()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Tolak']);
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    public function peminjamanPegawaiDiterima()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where(['tb_peminjaman.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_peminjaman.status_konfirmasi' => 'Terima']);
        return $this->db->get('tb_peminjaman')->num_rows();
    }




    // Cari per Tanggal
    public function tanggalpinjam($mulai_tanggal, $sampai_tanggal)
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where("tb_peminjaman.tgl_keberangkatan BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");
        $this->db->order_by('tgl_keberangkatan', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }

    public function totalpinjam($mulai_tanggal, $sampai_tanggal)
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->where("tb_peminjaman.tgl_keberangkatan BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");
        return $this->db->get('tb_peminjaman')->num_rows();
    }



}


