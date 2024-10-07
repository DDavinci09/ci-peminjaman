<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPegawai extends CI_Controller
{    
    public function laporanPeminjaman()
    {
        $customFilename = 'Laporan Peminjaman';
        $data['peminjaman'] = $this->Peminjaman_model->getAllPeminjaman3();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/peminjaman', $data, $customFilename);
    }
    
    public function laporanPengembalian()
    {
        $customFilename = 'Laporan Pengembalian';
        $data['pengembalian'] = $this->Pengembalian_model->getAllPengembalian3();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/pengembalian', $data, $customFilename);
    }
    
    public function laporanOpsmotor()
    {
        $customFilename = 'Laporan Biaya Ops Motor';
        $data['opsmotor'] = $this->Pengembalian_model->getOpsmotor2();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/opsmotor', $data, $customFilename);
    }

    public function laporanOpsmobil()
    {
        $customFilename = 'Laporan Biaya Ops Mobil';
        $data['opsmobil'] = $this->Pengembalian_model->getOpsmobil2();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/opsmobil', $data, $customFilename);
    }


    public function suratmasuk()
    {
        $data['suratmasuk'] = $this->SuratMasuk_model->getAllSuratMasukLaporan();
        
        $data['ttd'] = $this->User_model->getTtd();

        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/laporan_semuasuratmasuk', $data);
    }
    
    public function laporansuratmasuk()
    {
        $data['suratmasuk'] = $this->SuratMasuk_model->getAllSuratMasukLaporan();
        $mulai_tanggal = $this->input->post('mulai_tanggal');
        $sampai_tanggal = $this->input->post('sampai_tanggal');
        $data['suratmasuk'] = $this->SuratMasuk_model->tanggalsurat($mulai_tanggal, $sampai_tanggal);
        $data['totalsurat'] = $this->SuratMasuk_model->totaltanggalsurat($mulai_tanggal, $sampai_tanggal);
        $data['mulai_tgl'] = $mulai_tanggal;
        $data['sampai_tgl'] = $sampai_tanggal;
        $data['ttd'] = $this->User_model->getTtd();
        $this->load->library('mypdf2');
        $this->mypdf2->generate('laporan/laporan_suratmasuk', $data);
    }
}
