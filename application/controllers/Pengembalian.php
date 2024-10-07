<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengembalian extends CI_Controller
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

    public function kembalikan($kd_peminjaman)
    {
        $data['title'] = 'Input Pengembalian';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pj'] = $this->Peminjaman_model->getKd_peminjaman2($kd_peminjaman);
        $data['autoKD'] = $this->Pengembalian_model->autoKD();

        $kd_kendaraan = $this->input->post('kd_kendaraan');
        $kd_pengembalian = $this->input->post('kd_pengembalian');

        $this->form_validation->set_rules('kd_pengembalian', 'Kode Pengembalian', 'required|is_unique[tb_pengembalian.kd_pengembalian]');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('waktu_kembali', 'Waktu Kembali', 'required');
        $this->form_validation->set_rules('keterangan', 'Penanggung Jawab', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Pengembalian_model->tambahPengembalian($kd_peminjaman, $kd_kendaraan, $kd_pengembalian);
            $statuskd = [
                "status_kendaraan" => "Tersedia"
            ];

            $dikembalikan   = [
                "status_konfirmasi" => "Dikembalikan"
            ];

            $this->db->update('tb_kendaraan', $statuskd, ['kd_kendaraan' => $kd_kendaraan]  );
            $this->db->update('tb_peminjaman', $dikembalikan, ['kd_peminjaman' => $kd_peminjaman]  );
            if ($data['pj']['jenis_kendaraan'] == "Motor") {
                redirect('Pengembalian/tambahbiayaMotor/'. $kd_pengembalian);
            } else {
                redirect('Pengembalian/tambahbiayaMobil/'. $kd_pengembalian);
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengembalian/kembalikan', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function kembalikan0($kd_peminjaman)
    {
        $data['title'] = 'Input Pengembalian';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pj'] = $this->Peminjaman_model->getKd_peminjaman2($kd_peminjaman);

        $kd_kendaraan = $this->input->post('kd_kendaraan');

        $this->form_validation->set_rules('kd_pengembalian', 'Kode Pengembalian', 'required');
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('waktu_kembali', 'Waktu Kembali', 'required');
        $this->form_validation->set_rules('keterangan', 'Penanggung Jawab', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Pengembalian_model->tambahPengembalian($kd_peminjaman, $kd_kendaraan);
            $statuskd = [
                "status_kendaraan" => "Tersedia"
            ];

            $this->db->update('tb_kendaraan', $statuskd, ['kd_kendaraan' => $kd_kendaraan]  );
            redirect('admin/kelola_pengembalian');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengembalian/kembalikan', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function tambahbiayaMotor($kd_pengembalian)
    {
        $data['title'] = 'Input Biaya Ops Motor';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pg'] = $this->Pengembalian_model->getKd_pengembalian($kd_pengembalian);
        $data['autoKD'] = $this->Pengembalian_model->autoKDOMT();

        $bbm = $this->input->post('bbm');
        $parkir = $this->input->post('parkir');

        $this->form_validation->set_rules('kd_ops_motor', 'Kode Ops Motor', 'required|is_unique[tb_biaya_ops_motor.kd_ops_motor]' );
        $this->form_validation->set_rules('bbm', 'BBM', 'required');
        $this->form_validation->set_rules('parkir', 'Parkir', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Pengembalian_model->biayaMotor($kd_pengembalian, $bbm, $parkir);
            redirect('pegawai/biayaOpsmotor');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengembalian/biayaMotor', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function tambahbiayaMobil($kd_pengembalian)
    {
        $data['title'] = 'Input Biaya Ops Mobil';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pg'] = $this->Pengembalian_model->getKd_pengembalian($kd_pengembalian);
        $data['autoKD'] = $this->Pengembalian_model->autoKDOMB();

        $bbm = $this->input->post('bbm');
        $tol = $this->input->post('tol');
        $parkir = $this->input->post('parkir');

        $this->form_validation->set_rules('kd_ops_mobil', 'Kode Ops Mobil', 'required|is_unique[tb_biaya_ops_mobil.kd_ops_mobil]');
        $this->form_validation->set_rules('bbm', 'BBM', 'required');
        $this->form_validation->set_rules('tol', 'TOL', 'required');
        $this->form_validation->set_rules('parkir', 'Parkir', 'required');

        if ($this->form_validation->run() == TRUE) {
            $this->Pengembalian_model->biayaMobil($kd_pengembalian, $bbm, $tol, $parkir);
            redirect('pegawai/biayaOpsmobil');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pengembalian/biayaMobil', $data);
            $this->load->view('templates/footer');
        }
    }

    
}
