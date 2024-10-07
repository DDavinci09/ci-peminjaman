<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
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

    public function tambah()
    {
        $data['title'] = 'Tambah Data Kendaraan';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['autoKD'] = $this->Kendaraan_model->autoKD();

        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('nomor_polisi', 'Nomor Polisi', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('status_kendaraan', 'Status Kendaraan', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/img';
            $config['allowed_types']  = 'jpg|jpeg|png';
            $config['max_size']       = '20000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $this->Kendaraan_model->tambahUnit($this->upload->data());
                redirect('Admin/data_kendaraan');
            } else {
                $this->Kendaraan_model->tambahUnit2();
                redirect('Admin/data_kendaraan');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kendaraan/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function detail($kd_kendaraan)
    {
        $data['title'] = 'Detail Kendaraan';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kd'] = $this->Kendaraan_model->getKd_kendaraan($kd_kendaraan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kendaraan/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($kd_kendaraan)
    {
        $data['title'] = 'Edit Data Kendaraan';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kd'] = $this->Kendaraan_model->getKd_kendaraan($kd_kendaraan);

        $this->form_validation->set_rules('kd_kendaraan', 'Kode Kendaraan', 'required');
        $this->form_validation->set_rules('jenis_kendaraan', 'Jenis Kendaraan', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('nomor_polisi', 'Nomor Polisi', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('status_kendaraan', 'Status Kendaraan', 'required');

        if ($this->form_validation->run() == TRUE) {
            //konfigurasi upload file
            $config['upload_path']    = './assets/img';
            $config['allowed_types']  = 'jpg|jpeg|png';
            $config['max_size']       = '20000';

            $this->load->library('upload', $config);

            //Initiaze config upload
            $this->upload->initialize($config);

            if ($this->upload->do_upload('userfile')) {
                $file = './assets/img/' . $data['kd']['gambar'];

                if (is_readable($file) && unlink($file)) {
                    $this->Kendaraan_model->editFile($this->upload->data());

                    redirect('Admin/data_kendaraan');
                } else {
                    $this->Kendaraan_model->edittambahfile($this->upload->data());
    
                    redirect('Admin/data_kendaraan');
                }
            } else {
                $this->Kendaraan_model->edit();

                redirect('Admin/data_kendaraan');
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kendaraan/edit', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function editstatus($kd_kendaraan)
    {
        $data['title'] = 'Edit Data Kendaraan';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kd'] = $this->Kendaraan_model->getKd_kendaraan($kd_kendaraan);

        if ($this->form_validation->run() == TRUE) {
            $this->Kendaraan_model->editstatus($kd_kendaraan);
            redirect('Admin/data_kendaraan');
            
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kendaraan/edit', $data);
            $this->load->view('templates/footer');
        }
    }

    public function hapus($kd_kendaraan)
    {
        //$this->session->set_flashdata('flash', 'Dihapus');
        $data['kd'] = $this->Kendaraan_model->getKd_kendaraan($kd_kendaraan);
        $file = './assets/img/' . $data['kd']['gambar'];

        if (is_readable($file) && unlink($file)) {
            $this->Kendaraan_model->hapus($kd_kendaraan);
            redirect('admin/data_kendaraan');
        } else {
            $this->Kendaraan_model->hapus($kd_kendaraan);
            redirect('admin/data_kendaraan');
        }
    }
}
