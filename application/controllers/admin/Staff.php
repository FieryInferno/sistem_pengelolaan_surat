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
      $this->StaffModel->tambah();
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
		$data['title']    = "Tambah Staff";
    $data['seksi']    = $this->ModelSeksi->getAll();
    $data['subseksi'] = $this->ModelSubseksi->getAll();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahStaff',$data);
		$this->load->view('templates_admin/footer');
  }

  public function edit($id_user)
  {
		if ($this->input->post()) {
      $this->StaffModel->edit($id_user);
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
    $data             = $this->StaffModel->getById($id_user);
		$data['title']    = "Edit Staff";
    $data['seksi']    = $this->ModelSeksi->getAll();
    $data['id_subseksi'] = $this->ModelSubseksi->getAll();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/editStaff',$data);
		$this->load->view('templates_admin/footer');
  }

  public function hapus($id_user)
  {
    $this->db->delete('user', ['id_user' => $id_user]);
    $this->db->delete('kepala_seksi', ['id_user' => $id_user]);
    $this->db->delete('staff', ['id_user' => $id_user]);
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
