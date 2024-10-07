<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['totalkendaraan'] = $this->Kendaraan_model->totalKendaraan();
        $data['kendaraantersedia'] = $this->Kendaraan_model->totalKendaraantersedia();
        $data['kendaraandigunakan'] = $this->Kendaraan_model->totalKendaraandigunakan();
        $data['totalpeminjaman'] = $this->Peminjaman_model->totalPeminjamanAdmin();
        $data['menunggu'] = $this->Peminjaman_model->peminjamanAdminMenunggu();
        $data['diterima'] = $this->Peminjaman_model->peminjamanAdminDiterima();
        $data['ditolak'] = $this->Peminjaman_model->peminjamanAdminDitolak();
        $data['totalpengembalian'] = $this->Pengembalian_model->totalPengembalianAdmin();
        $data['motor'] = $this->Pengembalian_model->OpsmotorAdmin();
        $data['mobil'] = $this->Pengembalian_model->OpsmobilAdmin();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/admin', $data);
        $this->load->view('templates/footer');
    }
    
    public function data_pegawai()
    {
        $data['title'] = 'Daftar Pegawai';
        $data['pegawai'] = $this->Pegawai_model->getAllPegawai();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function data_kendaraan()
    {
        $data['title'] = 'Daftar Kendaraan';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kendaraan'] = $this->Kendaraan_model->getAllKendaraan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Kendaraan/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function menunggu()
    {
        $data['title'] = 'Daftar Peminjaman';
        $data['peminjaman'] = $this->Peminjaman_model->peminjamanMenunggu();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }

    public function ditolak()
    {
        $data['title'] = 'Daftar Peminjaman';
        $data['peminjaman'] = $this->Peminjaman_model->peminjamanDitolak();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function diterima()
    {
        $data['title'] = 'Daftar Peminjaman';
        $data['peminjaman'] = $this->Peminjaman_model->peminjamanDiterima();
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function kelola_pengembalian()
    {
        $data['title'] = 'Daftar Pengembalian';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengembalian'] = $this->Pengembalian_model->getAllPengembalian2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengembalian/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function biayaOpsmotor()
    {
        $data['title'] = 'Data Biaya Ops Motor';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['opsmotor'] = $this->Pengembalian_model->getOpsmotor();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengembalian/opsmotor', $data);
        $this->load->view('templates/footer');
    }
    
    public function biayaOpsmobil()
    {
        $data['title'] = 'Data Biaya Ops Mobil';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['opsmobil'] = $this->Pengembalian_model->getOpsmobil();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengembalian/opsmobil', $data);
        $this->load->view('templates/footer');
    }

    public function laporanPegawai()
    {
        $data['title'] = 'Laporan Data Pegawai';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pegawai'] = $this->Pegawai_model->getAllPegawai2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function laporanKendaraan()
    {
        $data['title'] = 'Laporan Data Kendaraan';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kendaraan'] = $this->Kendaraan_model->getAllKendaraan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kendaraan/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function laporanPeminjaman()
    {
        $data['title'] = 'Laporan Data Peminjaman';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['peminjaman'] = $this->Peminjaman_model->getAllPeminjaman2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('peminjaman/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function laporanPengembalian()
    {
        $data['title'] = 'Laporan Data Pengembalian';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengembalian'] = $this->Pengembalian_model->getAllPengembalian2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengembalian/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function laporanbiayaOpsmotor()
    {
        $data['title'] = 'Laporan Biaya Ops Motor';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['opsmotor'] = $this->Pengembalian_model->getOpsmotor();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengembalian/laporanopsmotor', $data);
        $this->load->view('templates/footer');
    }
    
    public function laporanbiayaOpsmobil()
    {
        $data['title'] = 'Laporan Biaya Ops Mobil';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['opsmobil'] = $this->Pengembalian_model->getOpsmobil();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengembalian/laporanopsmobil', $data);
        $this->load->view('templates/footer');
    }
}
