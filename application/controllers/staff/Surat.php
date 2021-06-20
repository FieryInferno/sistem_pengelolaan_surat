<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
  
	public function index()
	{
		$data['title']  = "Data Surat";
		$data['surat']  = $this->SuratModel->getDisposisiStaff();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('staff/data_surat');
		$this->load->view('templates_admin/footer');
	}

  public function tindaklanjuti($id_surat_masuk)
  {
    $this->db->update('disposisi', [
      'status'    => '3',
      'komentar'  => $this->input->post('komentar')
    ], ['id_surat_masuk'  => $id_surat_masuk]);
    $this->db->update('surat_masuk', [
      'status'    => '3'
    ], ['id_surat_masuk'  => $id_surat_masuk]);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Surat sudah ditindaklanjuti.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('staff/surat');
  }

  public function pengajuan()
  {
		$data['title']  = "Pengajuan Surat";
		$data['surat']  = $this->db->get('pengajuan_surat_keluar')->result_array();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('staff/pengajuanSurat');
		$this->load->view('templates_admin/footer');
  }

  public function tambahPengajuan()
  {
    if ($this->input->post()) {
      $this->db->insert('pengajuan_surat_keluar', [
        'id_staff'  => $this->session->id_staff,
        'perihal' => $this->input->post('perihal'),
        'tujuan'  => $this->input->post('tujuan'),
        'status'  => 0
      ]);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil tambah pengajuan surat.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('staff/pengajuan_surat');
    }
		$data['title']  = "Pengajuan Surat";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('staff/tambahPengajuanSurat');
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
