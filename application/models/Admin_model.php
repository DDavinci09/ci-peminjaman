<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getAllPegawai()
    {
        return $this->db->get('tb_user')->result_array();
    }

}

