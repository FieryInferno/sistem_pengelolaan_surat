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

  public function pengajuan()
  {
		$data['title']  = "Pengajuan Surat";
    $this->db->join('surat_keluar', 'pengajuan_surat_keluar.id_pengajuan_surat_keluar = surat_keluar.id_pengajuan_surat_keluar', 'left');
    $this->db->select('pengajuan_surat_keluar.*, surat_keluar.file');
		$data['surat']  = $this->db->get_where('pengajuan_surat_keluar', ['kepala_p3d'  => $this->session->id_user])->result_array();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('kepala_p3d/pengajuanSurat');
		$this->load->view('templates_admin/footer');
  }

  public function tambahPengajuan()
  {
    if ($this->input->post()) {
      $this->db->insert('pengajuan_surat_keluar', [
        'perihal'     => $this->input->post('perihal'),
        'tujuan'      => $this->input->post('tujuan'),
        'isi'         => $this->input->post('isi'),
        'status'      => 0,
        'kepala_p3d'  => $this->session->id_user
      ]);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah pengajuan surat.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('kepala_p3d/pengajuan_surat');
    }
		$data['title']  = "Tambah Pengajuan Surat";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('kepala_p3d/tambahPengajuanSurat');
		$this->load->view('templates_admin/footer');
  }

  public function hapus($id_surat_keluar)
  {
    $this->SuratModel->hapusSuratKeluar($id_surat_keluar);
    $this->session->set_flashdata('pesan','
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"></span>
        </button>
      </div>
    ');
    redirect('staff/pengajuan_surat');
  }
}
