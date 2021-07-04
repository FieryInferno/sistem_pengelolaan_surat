<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
  
	public function index()
	{
    if ($this->input->post()) {
      $this->ModelDaftar->insert();
      $this->session->set_flashdata('pesan', '
        Daftar berhasil
      ');
      redirect('login');
    }
		$this->load->view('daftar');
	}
}
