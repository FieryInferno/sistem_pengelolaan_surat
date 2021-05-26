<?php

class Dashboard extends CI_Controller{
	public function index()
	{
    $data['pengirim'] = $this->db->get_where('data_user', [
      'level' => 'pengirim'
    ])->num_rows();
    $data['masuk'] = $this->db->get('surat_masuk')->num_rows();
    $data['keluar'] = $this->db->get('surat_keluar')->num_rows();
		$data['title']    = "Dashboard";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('templates_admin/footer');
		
	}
}
?>