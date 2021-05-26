<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Surat extends CI_Controller {
  
	public function index()
	{
		$data['title']  = "Data Surat Masuk";
		$data['surat']  = $this->SuratModel->getDisposisi('surat_masuk');
		$data['staff']  = $this->db->get_where('data_user', [
      'seksi' => $this->session->seksi,
      'level' => 'staff'
    ])->result_array();
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('kepala_seksi/suratMasuk', $data);
		$this->load->view('templates_admin/footer');
	}

  public function verifikasiSuratMasuk($id_surat_masuk)
  {
    $this->SuratModel->verifikasiSuratMasuk($id_surat_masuk);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Verifikasi Surat Berhasil.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('KepalaTu/Surat/surat_masuk');
  }

  public function surat_keluar()
  {
    $data['title']  = "Data Surat Keluar";
    $data['keluar']  = $this->db->get('surat_keluar')->result_array();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('kepalaTu/suratKeluar', $data);
    $this->load->view('templates_admin/footer');
  }

  public function delete_surat_keluar($id_surat_keluar)
  {
    $this->db->where('id_surat_keluar', $id_surat_keluar);
    $this->db->delete('surat_keluar');
    $this->session->set_flashdata('pesan','
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        </button>
      </div>
    ');
    redirect('KepalaTu/Surat/surat_keluar');
  }

  public function disposisi()
  {
    $this->SuratModel->disposisiKepalaSeksi();
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil Mendisposisi Surat.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('kepala_seksi/surat');
  }
}
