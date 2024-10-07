<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function myProfile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Data User';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_user.username]' );
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $this->Pegawai_model->tambah();
            redirect('admin/data_pegawai');
            
        } else {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/tambah', $data);
        $this->load->view('templates/footer');
        }
    }

    public function updateProfile($id_user)
    {
        $data['title'] = 'Update Profile';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['id_user'] = $this->Pegawai_model->getId_user($id_user);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        
        if ($this->form_validation->run() == TRUE) {
            $update = $this->Pegawai_model->update();
            if ($update) {
                $this->session->set_userdata($update);
            }
            redirect('user/myProfile');
            
        } else {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/update', $data);
        $this->load->view('templates/footer');
        }
    }
    
    public function changePassword()
    {
        $data['title'] = 'Update Profile';
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/change', $data);
        $this->load->view('templates/footer');
    }

    public function gantiUsername()
    {
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $id_user = $this->session->userdata('id_user');

        $username = htmlspecialchars($this->input->post('username', true));
        
        $data = [
            'username' => $username
        ];

        $this->db->update('tb_user', $data, ['id_user' => $id_user]);

        $this->session->set_userdata($data);

        redirect('user/changePassword/'. $id_user);
    }
    
    public function gantiPassword()
    {
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $id_user = $this->session->userdata('id_user');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data = [
            'password' => $password
        ];

        $this->db->update('tb_user', $data, ['id_user' => $id_user]);

        $this->session->set_userdata($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diganti!
                    </div>');
        redirect('user/changePassword/'. $id_user); 
    }

    public function editStatusActive($id_user)
    {
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['iduser'] = $this->Pegawai_model->getId_user($id_user);
        
        $status = [
            "status" => 0
        ];
        $this->db->update('tb_user', $status, ['id_user' => $id_user]);
        redirect('admin/data_pegawai');
    }
    
    public function editStatusDeactive($id_user)
    {
        $data['user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['iduser'] = $this->Pegawai_model->getId_user($id_user);
        
        $status = [
            "status" => 1
        ];
        $this->db->update('tb_user', $status, ['id_user' => $id_user]);
        redirect('admin/data_pegawai');
    }

    public function hapus($id_user) 
    {
        $data['id_user'] = $this->Pegawai_model->getId_user($id_user);
        $this->Pegawai_model->hapus($id_user);
        redirect('admin/data_pegawai');
    }

}
