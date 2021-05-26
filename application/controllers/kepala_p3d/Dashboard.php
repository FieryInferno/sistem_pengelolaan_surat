<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
	public function index()
	{
		$data['title'] = "Dashboard Kepala P3D";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('kepala_p3d/dashboard');
		$this->load->view('templates_admin/footer');
	}
}
