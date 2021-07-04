<?php

class User extends CI_Controller{

	public function index()
	{
		$data['title']  = "Data User";
		$data['user']   = $this->db->get('data_user')->result_array();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/user', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		if ($this->input->post()) {
			$this->db->insert('data_user', [
        'nama'      => $this->input->post('nama'),
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password'),
				'level'		  => $this->input->post('role'),
        'seksi'     => $this->input->post('seksi'),
        'nik'       => $this->input->post('nik'),
        'subseksi'  => $this->input->post('subseksi')
			]);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data user.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
			redirect('admin/user');
		}
		$data['title']	= "Tambah Data User";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambah_user');
		$this->load->view('templates_admin/footer');
	}

	public function hapus($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('data_user');
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Sukses!</strong> Berhasil hapus data user.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  ');
		redirect('admin/User');
	}

  public function pilihSubseksi()
  {
    $data = $this->db->get_where('subseksi', ['id_seksi'  => $this->input->post('id_seksi')])->result_array();
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($data));
  }
}
?>