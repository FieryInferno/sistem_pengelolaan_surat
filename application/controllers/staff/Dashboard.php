<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  
	public function index()
	{
    $data['masuk'] = $this->db->get('surat_masuk')->num_rows();
    $data['keluar'] = $this->db->get('surat_keluar')->num_rows();
		$data['title'] = "Dashboard Staff";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('staff/dashboard');
		$this->load->view('templates_admin/footer');
	}
}
