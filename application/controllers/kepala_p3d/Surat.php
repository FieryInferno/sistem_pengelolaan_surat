<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
  
	public function index()
	{
		$data['title']  = "Data Surat";
		$data['surat']  = $this->SuratModel->get('surat_masuk');
    $data['seksi']  = $this->ModelSeksi->getAll();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('kepala_p3d/data_surat');
		$this->load->view('templates_admin/footer');
	}

  public function add()
  {
    if ($this->input->post()) {
      $this->SuratModel->buatSuratMasuk();
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil upload surat.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('Pengirim/Surat');
    }
		$data['title']  = "Upload Surat";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('pengirim/buat_surat', $data);
		$this->load->view('templates_admin/footer');
  }

  public function disposisi()
  {
    $this->SuratModel->disposisi();
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil Mendisposisi Surat.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('kepala_p3d/surat');
  }
}
