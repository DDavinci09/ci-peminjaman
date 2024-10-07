<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian_model extends CI_Model
{
    public function getAllPengembalian()
    {
        return $this->db->get('tb_pengembalian')->result_array();
    }

    public function autoKD()
    {
        // Get the maximum code from the barang table
        $query = $this->db->query("SELECT MAX(kd_pengembalian) as kodeTerbesar FROM tb_pengembalian");
        $data = $query->row_array();
        $kodeBarang = $data['kodeTerbesar'];

        // Extract the numeric part of the code and convert it to an integer
        $urutan = (int) substr($kodeBarang, 3, 3);

        // Increment the number to determine the next sequence
        $urutan++;

        // Form the new barang code
        $huruf = "PG";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);

        return $kodeBarang;
    }

    public function autoKDOMB()
    {
        // Get the maximum code from the barang table
        $query = $this->db->query("SELECT MAX(kd_ops_mobil) as kodeTerbesar FROM tb_biaya_ops_mobil");
        $data = $query->row_array();
        $kodeBarang = $data['kodeTerbesar'];

        // Extract the numeric part of the code and convert it to an integer
        $urutan = (int) substr($kodeBarang, 3, 3);

        // Increment the number to determine the next sequence
        $urutan++;

        // Form the new barang code
        $huruf = "OMB";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);

        return $kodeBarang;
    }

    public function autoKDOMT()
    {
        // Get the maximum code from the barang table
        $query = $this->db->query("SELECT MAX(kd_ops_motor) as kodeTerbesar FROM tb_biaya_ops_motor");
        $data = $query->row_array();
        $kodeBarang = $data['kodeTerbesar'];

        // Extract the numeric part of the code and convert it to an integer
        $urutan = (int) substr($kodeBarang, 3, 3);

        // Increment the number to determine the next sequence
        $urutan++;

        // Form the new barang code
        $huruf = "OMT";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);

        return $kodeBarang;
    }

    public function tambahPengembalian($kd_peminjaman, $kd_kendaraan, $kd_pengembalian)
    {
        $data = [
            "kd_pengembalian" => $kd_pengembalian,
            "kd_peminjaman" => $this->input->post('kd_peminjaman', true),
            "kd_kendaraan" => $kd_kendaraan,
            "id_user" => $this->input->post('id_user', true),
            "nama_user" => $this->input->post('nama_user', true),
            "tgl_kembali" => $this->input->post('tgl_kembali', true),
            "waktu_kembali" => $this->input->post('waktu_kembali', true),
            "keterangan" => $this->input->post('keterangan', true)
        ];

        $this->db->insert('tb_pengembalian', $data);
    }

    public function statusPengembalian($kd_kendaraan)
    {
        $data = [
            "status_kendaraan" => "Tersedia"
        ];

        $this->db->update('tb_kendaraan', $data, ['kd_kendaraan' => $kd_kendaraan]);
    }

    public function getAllPengembalian2()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->group_by('tb_pengembalian.kd_pengembalian');
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }
    
    public function getAllPengembalian3()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->where(['tb_pengembalian.id_user' => $this->session->userdata('id_user')]);
        $this->db->group_by('tb_pengembalian.kd_pengembalian');
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }

    public function getKd_pengembalian($kd_pengembalian)
    {
        $this->db->join('tb_kendaraan', 'tb_pengembalian.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->group_by('tb_pengembalian.kd_pengembalian');
        return $this->db->get_where('tb_pengembalian', ['kd_pengembalian' => $kd_pengembalian])->row_array();
    }
    
    public function getOpsmotor()
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_motor.*');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_motor', 'tb_biaya_ops_motor.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Motor']);
        $this->db->group_by('tb_biaya_ops_motor.kd_ops_motor');
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_kendaraan')->result_array();
    }

    public function getOpsmobil()
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_mobil.*');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_mobil', 'tb_biaya_ops_mobil.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Mobil']);
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_kendaraan')->result_array();
    }
    
    public function getOpsmotor2()
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_motor.*');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_motor', 'tb_biaya_ops_motor.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_pengembalian.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Motor']);
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_kendaraan')->result_array();
    }

    public function getOpsmobil2()
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_mobil.*');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_mobil', 'tb_biaya_ops_mobil.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_pengembalian.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Mobil']);
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_kendaraan')->result_array();
    }

    public function biayaMobil($kd_pengembalian,  $bbm, $tol, $parkir)
    {
        $total = $bbm + $tol + $parkir;

        $data = [
            "kd_ops_mobil" => $this->input->post('kd_ops_mobil', true),
            "kd_pengembalian" => $this->input->post('kd_pengembalian', true),
            "nama_user" => $this->input->post('nama_user', true),
            "bbm" => $bbm,
            "tol" => $tol,
            "parkir" => $parkir,
            "total" => $total
        ];

        $this->db->insert('tb_biaya_ops_mobil', $data);
    }
    
    public function biayaMotor($kd_pengembalian,  $bbm, $parkir)
    {
        $total = $bbm + $parkir;

        $data = [
            "kd_ops_motor" => $this->input->post('kd_ops_motor', true),
            "kd_pengembalian" => $this->input->post('kd_pengembalian', true),
            "nama_user" => $this->input->post('nama_user', true),
            "bbm" => $bbm,
            "parkir" => $parkir,
            "total" => $total
        ];

        $this->db->insert('tb_biaya_ops_motor', $data);
    }

    // Total Pengembalian Admin
    public function totalPengembalianAdmin()
    {
        return $this->db->get('tb_pengembalian')->num_rows();
    }

    public function OpsmotorAdmin()
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_motor.*');
        $this->db->from('tb_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_motor', 'tb_biaya_ops_motor.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Motor']);
        return $this->db->get()->num_rows();
    }

    public function OpsmobilAdmin()
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_mobil.*');
        $this->db->from('tb_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_mobil', 'tb_biaya_ops_mobil.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Mobil']);
        return $this->db->get()->num_rows();
    }

    // Total Pengembalian Pegawai
    public function totalPengembalianPegawai()
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->where(['tb_pengembalian.id_user' => $this->session->userdata('id_user')]);
        $this->db->group_by('tb_pengembalian.kd_pengembalian');
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    public function OpsmotorPegawai()
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_motor.*');
        $this->db->from('tb_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_motor', 'tb_biaya_ops_motor.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_pengembalian.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Motor']);
        return $this->db->get()->num_rows();
    }

    public function OpsmobilPegawai()
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_mobil.*');
        $this->db->from('tb_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_mobil', 'tb_biaya_ops_mobil.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_pengembalian.id_user' => $this->session->userdata('id_user')]);
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Mobil']);
        return $this->db->get()->num_rows();
    }


    // Cari per Tanggal kembali
    public function tanggalkembali($mulai_tanggal, $sampai_tanggal)
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->where("tb_pengembalian.tgl_kembali BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_peminjaman')->result_array();
    }

    public function totalkembali($mulai_tanggal, $sampai_tanggal)
    {
        $this->db->join('tb_kendaraan', 'tb_peminjaman.kd_kendaraan = tb_kendaraan.kd_kendaraan');
        $this->db->join('tb_pengembalian', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->where("tb_pengembalian.tgl_kembali BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_peminjaman')->num_rows();
    }

    // Cari per Tanggal kembali motor
    public function tanggalkembalimotor($mulai_tanggal, $sampai_tanggal)
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_motor.*');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_motor', 'tb_biaya_ops_motor.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Motor']);
        $this->db->where("tb_pengembalian.tgl_kembali BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_kendaraan')->result_array();
    }

    public function totalkembalimotor($mulai_tanggal, $sampai_tanggal)
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_motor.*');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_motor', 'tb_biaya_ops_motor.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Motor']);
        $this->db->where("tb_pengembalian.tgl_kembali BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");
        return $this->db->get('tb_kendaraan')->num_rows();
    }
    
    // Cari per Tanggal kembali mobil
    public function tanggalkembalimobil($mulai_tanggal, $sampai_tanggal)
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_mobil.*');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_mobil', 'tb_biaya_ops_mobil.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Mobil']);
        $this->db->where("tb_pengembalian.tgl_kembali BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");
        $this->db->order_by('tgl_kembali', 'DESC');
        return $this->db->get('tb_kendaraan')->result_array();
    }

    public function totalkembalimobil($mulai_tanggal, $sampai_tanggal)
    {
        $this->db->select('tb_kendaraan.*, tb_peminjaman.*, tb_pengembalian.*, tb_biaya_ops_mobil.*');
        $this->db->join('tb_pengembalian', 'tb_kendaraan.kd_kendaraan = tb_pengembalian.kd_kendaraan');
        $this->db->join('tb_peminjaman', 'tb_peminjaman.kd_peminjaman = tb_pengembalian.kd_peminjaman');
        $this->db->join('tb_biaya_ops_mobil', 'tb_biaya_ops_mobil.kd_pengembalian = tb_pengembalian.kd_pengembalian');
        $this->db->where(['tb_kendaraan.jenis_kendaraan' => 'Mobil']);
        $this->db->where("tb_pengembalian.tgl_kembali BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'");
        return $this->db->get('tb_kendaraan')->num_rows();
    }

}


