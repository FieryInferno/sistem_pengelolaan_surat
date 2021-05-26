<?php

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class SuratMasuk extends CI_Controller{

	public function index()
	{
		$data['title']  = "Surat Masuk";
		$data['surat']  = $this->SuratModel->get('surat_masuk');
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/SuratMasuk',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
    if ($this->input->post()) {
      $this->SuratModel->tambah();
      $this->session->set_flashdata('pesan','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Berhasi tambah surat masuk!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"></span>
          </button>
        </div>
      ');
      redirect('admin/surat_masuk');
    }
		$data['title'] = "Tambah Surat Masuk";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahSuratMasuk',$data);
		$this->load->view('templates_admin/footer');
	}

  public function delete($no)
  {
    $where = array('id_surat_masuk' => $no);
    $this->SuratModel->delete_data($where, 'surat_masuk');
    $this->session->set_flashdata('pesan','
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"></span>
        </button>
      </div>
    ');
    redirect('admin/SuratMasuk');
  }

  public function print()
  {
    ob_start();
      $data['masuk']  = $this->SuratModel->get('surat_masuk', '1');
      $this->load->view('laporan_surat_masuk.php', $data);
      $html = ob_get_contents();
    ob_end_clean();
    ob_clean();
    $filename = 'Laporan Surat Masuk';
    $options  = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('legal', 'potrait');
    $dompdf->render();
    $dompdf->stream($filename, array("Attachment" => 0) );
  }

  public function tracking()
  {
    if ($this->input->get()) {
      $data = $this->SuratModel->get('surat_masuk', $this->input->get('no_surat'));
      if (!$data) {
        $data['status'] = '<div class="alert alert-danger">No. surat tidak ada</div>';
      } else {
        switch ($data['status']) {
          case '0':
            $data['status'] = '<div class="alert alert-primary">Sedang dilihat kepala P3d</div>';
            break;
          case '1':
            $data['status'] = '<div class="alert alert-warning">Sudah didisposisikan ke kepala seksi</div>';
            break;
          case '2':
            $data['status'] = '<div class="alert alert-info">Sudah didisposisikan ke staff/menuggu tindak lanjut</div>';
            break;
          case '3':
            $data['status'] = '<div class="alert alert-success">Surat sudah ditindaklanjuti oleh staff</div>';
            break;
          
          default:
            # code...
            break;
        }
      }
    }
		$data['title']  = "Tracking Surat";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/trackingSurat',$data);
		$this->load->view('templates_admin/footer');
  }
}
?>