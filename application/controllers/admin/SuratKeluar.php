<?php

require_once("./vendor/autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class SuratKeluar extends CI_Controller{

	public function index()
	{
		$data['title']  = "Surat Keluar";
		$data['keluar'] = $this->SuratModel->get('surat_keluar');
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/SuratKeluar',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData($id_surat_keluar)
	{
    if ($this->input->post()) {
      ob_start();
        $this->load->view('surat_keluar.php');
        $html = ob_get_contents();
      ob_end_clean();
      ob_clean();
      $filename = uniqid();
      $options  = new Options();
      $options->set('isRemoteEnabled', TRUE);
      $dompdf = new Dompdf($options);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('legal', 'potrait');
      $dompdf->render();
      file_put_contents('./assets/' . $filename . '.pdf', $dompdf->output());
      $this->SuratModel->buatSuratkeluar($filename, $id_surat_keluar);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil menambah surat keluar.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('admin/SuratKeluar');
    }
    $data           = $this->db->get_where('surat_keluar', [
      'id_surat_keluar' => $id_surat_keluar
    ])->row_array();
		$data['title']  = "Buat Surat Keluar";
    $suratTerbaru   = $this->SuratModel->getSuratTerbaru();
    if ($suratTerbaru) {
      $urutanSurat    = (integer) $suratTerbaru['urutan_surat'] + 1;
      switch (strlen($urutanSurat)) {
        case '1':
          $data['no_surat'] = '800/00' . $urutanSurat . '-tu';
          break;
        case '2':
          $data['no_surat'] = '800/0' . $urutanSurat . '-tu';
          break;
        case '3':
          $data['no_surat'] = '800/' . $urutanSurat . '-tu';
          break;
        
        default:
          # code...
          break;
      }
    } else {
      $data['no_surat'] = '800/001-tu';
    }
    $data['urutan_surat'] = $urutanSurat;
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahSuratKeluar',$data);
		$this->load->view('templates_admin/footer');
	}

		public function updateData($no)
		{
			$where = array('Nomor_Surat' => $no);
			$data['title'] = 'Update Surat Keluar';
			$data['keluar'] = $this->db->query("SELECT * FROM surat_keluar WHERE Nomor_Surat='$no'")->result ();
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/editSuratKeluar',$data);
			$this->load->view('templates_admin/footer');

		}


		public function updateDataAksi()
		{
			$this->_rules();

			if($this->form_validation->run() == FALSE) {
				$this->updateData();
			}else{
				$no						= $this->input->post('Nomor_Surat');
				$Tanggal_Dikirim 		= $this->input->post('Tanggal_Surat');
				$Surat_Dikirim_Kepada	= $this->input->post('Surat_Dari');
				$Perihal				= $this->input->post('Perihal');
				$data = array(	

				'Tanggal_Dikirim' 		=> $Tanggal_Surat,
				'Surat_Dikirim_Kepada'	=> $Surat_Dari,
				'Perihal'				=> $Perihal,
			);

			$where = array(
				'Nomor_Surat' => $no
			);

			$this->suratModel->update_data('surat_keluar',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible 
				fade show" role="alert">
			<strong>Data Berhasil Diupdate!</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&time;</span>
			</button>
		</div>');
			redirect('admin/SuratKeluar');
		}
	}
		public function _rules()
		{
			$this->form_validation->set_rules('Nomor_Surat','Nomor Surat','required');
			$this->form_validation->set_rules('Tanggal_Dikirim','Tanggal Dikirim','required');
			$this->form_validation->set_rules('Surat_Dikirim_Kepada','Surat Dikirim Kepada','required');
			$this->form_validation->set_rules('Perihal','Tanggal Surat','required');
		}

		public function delete($no)
		{
      $this->db->where('id_surat_keluar', $no);
      $this->db->delete('surat_keluar');
			$this->session->set_flashdata('pesan','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Data Berhasil Dihapus!</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          </button>
        </div>
      ');
			redirect('admin/SuratKeluar');

		}

    public function print()
    {
      ob_start();
        $data['keluar'] = $this->SuratModel->get('surat_keluar');
        $this->load->view('laporan_surat_keluar.php', $data);
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

	public function edit($id_surat_keluar)
	{
    if ($this->input->post()) {
      unlink('assets/' . $this->input->post('surat_lama'));
      ob_start();
        $this->load->view('surat_keluar.php');
        $html = ob_get_contents();
      ob_end_clean();
      ob_clean();
      $filename = uniqid();
      $options  = new Options();
      $options->set('isRemoteEnabled', TRUE);
      $dompdf = new Dompdf($options);
      $dompdf->loadHtml($html);
      $dompdf->setPaper('legal', 'potrait');
      $dompdf->render();
      file_put_contents('./assets/' . $filename . '.pdf', $dompdf->output());
      $this->SuratModel->buatSuratkeluar($filename, $id_surat_keluar);
      $this->session->set_flashdata('pesan', '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Sukses!</strong> Berhasil edit surat keluar.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('admin/SuratKeluar');
    }
    $data = $this->db->get_where('surat_keluar', [
      'id_surat_keluar' => $id_surat_keluar
    ])->row_array();
		$data['title']  = "Edit Surat Keluar";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/editSuratKeluar',$data);
		$this->load->view('templates_admin/footer');
	}
}
?>