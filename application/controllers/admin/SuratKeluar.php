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
        $this->load->view('surat_keluar');
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
    $data           = $this->db->get_where('pengajuan_surat_keluar', [
      'id_pengajuan_surat_keluar' => $id_surat_keluar
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
      $data['urutan_surat'] = $urutanSurat;
    } else {
      $data['no_surat']     = '800/001-tu';
      $data['urutan_surat'] = 1;
    }
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
      $this->SuratModel->editSuratkeluar($filename, $id_surat_keluar);
      if (file_exists('assets/' . $this->input->post('surat_lama'))) unlink('assets/' . $this->input->post('surat_lama'));
      
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
    $this->db->join('pengajuan_surat_keluar', 'surat_keluar.id_pengajuan_surat_keluar = pengajuan_surat_keluar.id_pengajuan_surat_keluar');
    $data = $this->db->get_where('surat_keluar', [
      'id_surat_keluar' => $id_surat_keluar
    ])->row_array();
		$data['title']  = "Ubah Surat Keluar";
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/editSuratKeluar',$data);
		$this->load->view('templates_admin/footer');
	}

  public function kirim($id_pengajuan_surat_keluar)
  {
    $this->db->update('pengajuan_surat_keluar', [
      'status'  => 2,
    ], ['id_pengajuan_surat_keluar' => $id_pengajuan_surat_keluar]); 
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil mengubah status surat keluar.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('admin/SuratKeluar');
  }

	public function buatSurat()
	{
    if ($this->input->post()) {
      ob_start();
        $this->load->view('surat_keluar');
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

      $this->db->insert('pengajuan_surat_keluar', [
        'perihal' => $this->input->post('perihal'),
        'tujuan'  => $this->input->post('tujuan'),
        'status'  => 1,
        'isi'     => $this->input->post('isi'),
      ]);
      $this->db->select_max('id_pengajuan_surat_keluar');
      $id_pengajuan_surat_keluar  = $this->db->get('pengajuan_surat_keluar')->row_array();
      
      $this->db->insert('surat_keluar', [
        'id_pengajuan_surat_keluar' => $id_pengajuan_surat_keluar['id_pengajuan_surat_keluar'],
        'no_surat'                  => $this->input->post('no_surat'),
        'tanggal'                   => $this->input->post('tanggal'),
        'file'                      => $filename . '.pdf',
        'isi'                       => $this->input->post('isi'),
        'urutan_surat'              => $this->input->post('urutan_surat'),
        'klasifikasi'               => $this->input->post('klasifikasi')
      ]);

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
		$data['title']  = "Buat Surat Keluar";

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/buatSuratKeluar',$data);
		$this->load->view('templates_admin/footer');
	}

  public function hapus($id_pengajuan_surat_keluar)
  {
    $this->SuratModel->hapusSuratKeluar($id_pengajuan_surat_keluar);
    $this->session->set_flashdata('pesan', '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Berhasil hapus surat keluar.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ');
    redirect('admin/surat_keluar');
  }

  public function nomorSurat()
  {
    $suratTerbaru   = $this->SuratModel->getSuratTerbaru();

    switch ($this->input->post('klasifikasi')) {
      case 'umum':
        $klasifikasi  = '000';
        $akhiran      = '';
        break;
      case 'pemerintahan':
        $klasifikasi  = '100';
        $akhiran      = '';
        break;
      case 'pengawasan':
        $klasifikasi  = '200';
        $akhiran      = '';
        break;
      case 'pekerjaan_umum_dan_ketenagaan':
        $klasifikasi  = '300';
        $akhiran      = '';
        break;
      case 'perekonomian':
        $klasifikasi  = '400';
        $akhiran      = '';
        break;
      case 'kesejahteraan_rakyat':
        $klasifikasi  = '500';
        $akhiran      = '';
        break;
      case 'keamanan':
        $klasifikasi  = '600';
        $akhiran      = '';
        break;
      case 'politik':
        $klasifikasi  = '700';
        $akhiran      = '';
        break;
      case 'kepegawaian':
        $klasifikasi  = '800';
        $akhiran      = '-tu';
        break;
      case 'keuangan':
        $klasifikasi  = '900';
        $akhiran      = '';
        break;
      
      default:
        # code...
        break;
    }
    if ($suratTerbaru) {
      $urutanSurat    = (integer) $suratTerbaru['urutan_surat'] + 1;
      switch (strlen($urutanSurat)) {
        case '1':
          $data['no_surat'] = $klasifikasi . '/00' . $urutanSurat . $akhiran;
          break;
        case '2':
          $data['no_surat'] = $klasifikasi . '/0' . $urutanSurat . $akhiran;
          break;
        case '3':
          $data['no_surat'] = $klasifikasi . '/' . $urutanSurat . $akhiran;
          break;
        
        default:
          # code...
          break;
      }
      $data['urutan_surat'] = $urutanSurat;
    } else {
      $data['no_surat']     = $klasifikasi . '/001' . $akhiran;
      $data['urutan_surat'] = 1;
    }

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
  }

  public function cekNomorSurat()
  {
    $data = $this->db->get_where('surat_masuk', ['no_surat' => $this->input->post('no_surat')])->row_array();
    if ($data) {
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(['status'  => TRUE]));
    } else {
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(['status'  => FALSE]));
    }
    
  }
}
?>