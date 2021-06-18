<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {
  
	public function index()
	{
		$data['title']  = "Kelola Staff";
		$data['staff']  = $this->StaffModel->getAll();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/kelolaStaff',$data);
		$this->load->view('templates_admin/footer');
	}
}
