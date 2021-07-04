<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelDaftar extends CI_Model {
  
	public function insert()
	{
    $this->db->insert('data_user', [
      'nama'      => $this->input->post('nama'),
      'username'  => $this->input->post('username'),
      'password'  => $this->input->post('password'),
      'level'     => 'pengirim'
    ]);
	}
}
