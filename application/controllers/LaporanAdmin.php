<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanAdmin extends CI_Controller
{
    public function laporanPegawai()
    {
        $customFilename = 'Laporan Pegawai';
        $data['pegawai'] = $this->Pegawai_model->getAllPegawai2();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/pegawai', $data, $customFilename);
    }
    
    public function laporanKendaraan()
    {
        $customFilename = 'Laporan Kendaraan';
        $data['kendaraan'] = $this->Kendaraan_model->getAllKendaraan();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/kendaraan', $data, $customFilename);
    }
    
    public function laporanPeminjaman()
    {
        $customFilename = 'Laporan Peminjaman';
        $mulai_tanggal = $this->input->post('mulai_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $data['peminjaman'] = $this->Peminjaman_model->tanggalpinjam($mulai_tanggal, $sampai_tanggal);
        $data['totalpeminjaman'] = $this->Peminjaman_model->totalpinjam($mulai_tanggal, $sampai_tanggal);
        $data['mulai_tgl'] = $mulai_tanggal;
        $data['sampai_tgl'] = $sampai_tanggal;

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/peminjaman', $data, $customFilename);
    }
    
    public function laporanPeminjaman0()
    {
        $customFilename = 'Laporan Peminjaman';
        $data['peminjaman'] = $this->Peminjaman_model->getAllPeminjaman2();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/peminjaman', $data, $customFilename);
    }
    
    public function laporanPengembalian()
    {
        $customFilename = 'Laporan Pengembalian';
        $mulai_tanggal = $this->input->post('mulai_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $data['pengembalian'] = $this->Pengembalian_model->tanggalkembali($mulai_tanggal, $sampai_tanggal);
        $data['totalkembali'] = $this->Pengembalian_model->totalkembali($mulai_tanggal, $sampai_tanggal);
        $data['mulai_tgl'] = $mulai_tanggal;
        $data['sampai_tgl'] = $sampai_tanggal;

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/pengembalian', $data, $customFilename);
    }
    
    public function laporanOpsmotor()
    {
        $customFilename = 'Laporan Biaya Ops Motor';
        $mulai_tanggal = $this->input->post('mulai_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $data['opsmotor'] = $this->Pengembalian_model->tanggalkembalimotor($mulai_tanggal, $sampai_tanggal);
        $data['totalkembali'] = $this->Pengembalian_model->totalkembalimotor($mulai_tanggal, $sampai_tanggal);
        $data['mulai_tgl'] = $mulai_tanggal;
        $data['sampai_tgl'] = $sampai_tanggal;

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/opsmotor', $data, $customFilename);
    }

    public function laporanOpsmobil()
    {
        $customFilename = 'Laporan Biaya Ops Mobil';
        $mulai_tanggal = $this->input->post('mulai_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $data['opsmobil'] = $this->Pengembalian_model->tanggalkembalimobil($mulai_tanggal, $sampai_tanggal);
        $data['totalkembali'] = $this->Pengembalian_model->totalkembalimobil($mulai_tanggal, $sampai_tanggal);
        $data['mulai_tgl'] = $mulai_tanggal;
        $data['sampai_tgl'] = $sampai_tanggal;

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/opsmobil', $data, $customFilename);
    }

}
