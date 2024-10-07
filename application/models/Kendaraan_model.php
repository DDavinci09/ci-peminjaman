<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{
    public function getAllKendaraan()
    {
        $this->db->order_by('kd_kendaraan', 'DESC');
		return $this->db->get('tb_kendaraan')->result_array();

    }
    
    public function totalAllKendaraan()
    {
        return $this->db->get('tb_kendaraan')->num_rows();
    }

    public function autoKD()
    {
        // Get the maximum code from the barang table
        $query = $this->db->query("SELECT MAX(kd_kendaraan) as kodeTerbesar FROM tb_kendaraan");
        $data = $query->row_array();
        $kodeBarang = $data['kodeTerbesar'];

        // Extract the numeric part of the code and convert it to an integer
        $urutan = (int) substr($kodeBarang, 3, 3);

        // Increment the number to determine the next sequence
        $urutan++;

        // Form the new barang code
        $huruf = "KD";
        $kodeBarang = $huruf . sprintf("%03s", $urutan);

        return $kodeBarang;
    }
    
    public function autoKD2()
    {
        // Logika untuk mendapatkan kode otomatis
        $last_kd = $this->db->select('kd_kendaraan')->order_by('kd_kendaraan', 'DESC')->limit(1)->get('tb_kendaraan')->row();

        if ($last_kd) {
            $last_number = (int) substr($last_kd, 2); // Ambil angka dari kode terakhir
            $new_number = str_pad($last_number + 1, 3, '0', STR_PAD_LEFT); // Tambah 1 ke angka terakhir dan pad dengan 0
            $new_kd = 'KD' . $new_number;
        } else {
            $new_kd = 'KD001'; // Jika belum ada data, gunakan nilai awal
        }

        // Kirim nilai kode otomatis ke view
        $data['kode_otomatis'] = $new_kd;

        return  $data['kode_otomatis'];
    }

    public function getKd_kendaraan($kd_kendaraan)
    {
        return $this->db->get_where('tb_kendaraan', ['kd_kendaraan' => $kd_kendaraan])->row_array();
    }

    public function editStatus_kendaraan()
    {
        $data = [
            "status_kendaraan" => $this->input->post('status_kendaraan', true)
        ];

        $this->db->update('tb_kendaraan', $data);
    }


    public function tambahUnit($file)
    {
        $data = [
            "kd_kendaraan" => $this->input->post('kd_kendaraan', true),
            "jenis_kendaraan" => $this->input->post('jenis_kendaraan', true),
            "merk" => $this->input->post('merk', true),
            "nomor_polisi" => $this->input->post('nomor_polisi', true),
            "warna" => $this->input->post('warna', true),
            "status_kendaraan" => $this->input->post('status_kendaraan', true),
            "gambar" => $file['file_name']
        ];

        $this->db->insert('tb_kendaraan', $data);
    }
    
    public function tambahUnit2()
    {
        $data = [
            "kd_kendaraan" => $this->input->post('kd_kendaraan', true),
            "jenis_kendaraan" => $this->input->post('jenis_kendaraan', true),
            "merk" => $this->input->post('merk', true),
            "nomor_polisi" => $this->input->post('nomor_polisi', true),
            "warna" => $this->input->post('warna', true),
            "status_kendaraan" => $this->input->post('status_kendaraan', true)
        ];

        $this->db->insert('tb_kendaraan', $data);
    }

    public function editstatus()
    {
        $data = [
            "status_kendaraan" => $this->input->post('status_kendaraan', true)
        ];

        $this->db->where('kd_kendaraan', $this->input->post('kd_kendaraan'));

        $this->db->update('tb_kendaraan', $data);
    }

    public function edit()
    {
        $data = [
            "kd_kendaraan" => $this->input->post('kd_kendaraan', true),
            "jenis_kendaraan" => $this->input->post('jenis_kendaraan', true),
            "merk" => $this->input->post('merk', true),
            "nomor_polisi" => $this->input->post('nomor_polisi', true),
            "warna" => $this->input->post('warna', true),
            "status_kendaraan" => $this->input->post('status_kendaraan', true)
        ];

        $this->db->where('kd_kendaraan', $this->input->post('kd_kendaraan'));
        // id berdasar input hidden pada view ubah data

        $this->db->update('tb_kendaraan', $data);
    }

    public function editFile($file)
    {

        $data = [
            "kd_kendaraan" => $this->input->post('kd_kendaraan', true),
            "jenis_kendaraan" => $this->input->post('jenis_kendaraan', true),
            "merk" => $this->input->post('merk', true),
            "nomor_polisi" => $this->input->post('nomor_polisi', true),
            "warna" => $this->input->post('warna', true),
            "status_kendaraan" => $this->input->post('status_kendaraan', true),
            "gambar" => $file['file_name']
        ];

        $this->db->where('kd_kendaraan', $this->input->post('kd_kendaraan'));
        // id berdasar input hidden pada view ubah data

        $this->db->update('tb_kendaraan', $data);
    }

    public function edittambahFile($file)
    {

        $data = [
            "kd_kendaraan" => $this->input->post('kd_kendaraan', true),
            "jenis_kendaraan" => $this->input->post('jenis_kendaraan', true),
            "merk" => $this->input->post('merk', true),
            "nomor_polisi" => $this->input->post('nomor_polisi', true),
            "warna" => $this->input->post('warna', true),
            "status_kendaraan" => $this->input->post('status_kendaraan', true),
            "gambar" => $file['file_name']
        ];

        $this->db->where('kd_kendaraan', $this->input->post('kd_kendaraan'));
        // id berdasar input hidden pada view ubah data

        $this->db->update('tb_kendaraan', $data);
    }

    public function hapus($kd_kendaraan)
    {
        $this->db->delete('tb_kendaraan', ['kd_kendaraan' => $kd_kendaraan]);
    }

    // Total kendaraan
    public function totalKendaraan()
    {
        return $this->db->get('tb_kendaraan')->num_rows();
    }
    
    public function totalKendaraantersedia()
    {
        $this->db->where(['tb_kendaraan.status_kendaraan' => 'Tersedia']);
        return $this->db->get('tb_kendaraan')->num_rows();
    }
    
    public function totalKendaraandigunakan()
    {
        $this->db->where(['tb_kendaraan.status_kendaraan' => 'Digunakan']);
        return $this->db->get('tb_kendaraan')->num_rows();
    }

}


