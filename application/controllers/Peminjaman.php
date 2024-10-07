<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/admin', $data);
        $this->load->view('templates/footer');
    }

    public function tambah($kd_kendaraan)
    {
        $data['title'] = 'Input Peminjaman';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kd'] = $this->Kendaraan_model->getKd_kendaraan($kd_kendaraan);
        $data['autoKD'] = $this->Peminjaman_model->autoKD();

        $this->form_validation->set_rules('kd_peminjaman', 'Kode Peminjaman', 'required|is_unique[tb_peminjaman.kd_peminjaman]' );
        $this->form_validation->set_rules('tgl_keberangkatan', 'Tanggal Keberangkatan', 'required');
        $this->form_validation->set_rules('waktu_peminjaman', 'Waktu Peminjaman', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Peminjaman_model->tambahPeminjaman($kd_kendaraan);
            redirect('pegawai/menunggu');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peminjaman/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function aprove($kd_peminjaman)
    {
        $data['title'] = 'Konfirmasi Peminjaman';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pj'] = $this->Peminjaman_model->getKd_peminjaman2($kd_peminjaman);

        $kd_kendaraan = $this->input->post('kd_kendaraan');
        $konfirmasi = $this->input->post('status_konfirmasi');

        $this->form_validation->set_rules('status_konfirmasi', 'Status Konfirmasi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Peminjaman_model->aprovePeminjaman($konfirmasi, $kd_peminjaman);
            if ($konfirmasi == "Terima") {
                $statuskd = [
                    "status_kendaraan" => "Digunakan"
                ];

                $this->db->update('tb_kendaraan', $statuskd, ['kd_kendaraan' => $kd_kendaraan]  );
                redirect('admin/diterima');
            } else if ($konfirmasi == "Tolak") {
                $statuskd = [
                    "status_kendaraan" => "Tersedia"
                ];

                $this->db->update('tb_kendaraan', $statuskd, ['kd_kendaraan' => $kd_kendaraan]  );
                redirect('admin/ditolak');
            } else if ($konfirmasi == "Menunggu") {
                $statuskd = [
                    "status_kendaraan" => "Tersedia"
                ];

                $this->db->update('tb_kendaraan', $statuskd, ['kd_kendaraan' => $kd_kendaraan]  );
                redirect('admin/menunggu');
            } 
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('peminjaman/aprove', $data);
            $this->load->view('templates/footer');
        }
    }
}
