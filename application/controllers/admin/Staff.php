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

  public function tambah()
  {
		if ($this->input->post()) {
			$this->db->insert('data_user', [
        'nama'      => $this->input->post('nama'),
        'email'     => $this->input->post('email'),
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
			redirect('admin/kelola_staff');
		}
		$data['title']  = "Tambah Staff";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahStaff',$data);
		$this->load->view('templates_admin/footer');
  }

  public function edit($id_user)
  {
		if ($this->input->post()) {
			$this->db->update('data_user', [
        'nama'      => $this->input->post('nama'),
        'email'     => $this->input->post('email'),
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password'),
				'level'		  => $this->input->post('role'),
        'seksi'     => $this->input->post('seksi'),
        'nik'       => $this->input->post('nik'),
        'subseksi'  => $this->input->post('subseksi')
			], ['id_user' => $id_user]);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah data user.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
			redirect('admin/kelola_staff');
		}
    $data           = $this->StaffModel->getById($id_user);
		$data['title']  = "Edit Staff";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/editStaff',$data);
		$this->load->view('templates_admin/footer');
  }

  public function hapus($id_user)
  {
    $this->db->delete('data_user', ['id_user' => $id_user]);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil hapus data user.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('admin/kelola_staff');
  }
}
