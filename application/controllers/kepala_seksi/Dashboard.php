<?php

class Dashboard extends CI_Controller{

	public function index()
	{
		$data['title']  = "Dashboard Kepala Seksi";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('kepala_seksi/dashboard');
		$this->load->view('templates_admin/footer');
	}
}
?>