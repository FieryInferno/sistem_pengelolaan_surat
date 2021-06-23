<?php

class SuratModel extends CI_Model{

	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($table,$data){
		$this->db->insert($table, $data);
	}

	public function update_data($table, $data, $where){
		$this->db->get($table, $data, $where);
	}

	public function delete_data($where, $table){
		$this->db->where($where);
		$this->db->update($table, [
      'status_admin'  => '1'
    ]);	
	}

  public function tambah()
  {
    $config['upload_path']          = './assets/';
    $config['allowed_types']        = 'pdf';
    $config['max_size']             = 100000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->upload->initialize($config);

    if ( ! $this->upload->do_upload('file')) {
      $this->session->flashdata('pesan', '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Gagal!</strong> gagal mengupload file surat.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      ');
      redirect('Pengirim/Surat/add');
    } else {
      $file = $this->upload->data('file_name');
    }
    $this->db->insert('surat_masuk', [
      'no_surat'  => $this->input->post('no_surat'),
      'tanggal'   => $this->input->post('tanggal'),
      'pengirim'  => $this->input->post('pengirim'),
      'perihal'   => $this->input->post('perihal'),
      'file'      => $file,
    ]);
  }

  public function get($jenis, $no_surat = null)
  {
    switch ($jenis) {
      case 'surat_masuk':
        if ($no_surat) {
          return $this->db->get_where('surat_masuk', [
            'no_surat'  => $no_surat
          ])->row_array();
        } else {
          $this->input->get('bulan') ? $this->db->where('month(tanggal)', $this->input->get('bulan')) : b ;
          return $this->db->get('surat_masuk')->result_array();
        }
        break;
      case 'surat_keluar':
        $this->db->join('surat_keluar', 'surat_keluar.id_pengajuan_surat_keluar = pengajuan_surat_keluar.id_pengajuan_surat_keluar', 'left');
        $this->db->select('pengajuan_surat_keluar.*, surat_keluar.no_surat, surat_keluar.tanggal, surat_keluar.isi, surat_keluar.file');
        return $this->db->get('pengajuan_surat_keluar')->result_array();
        break;
      
      default:
        # code...
        break;
    }
    
  }

  public function verifikasiSuratMasuk($id_surat_masuk)
  {
    $this->db->where('id_surat_masuk', $id_surat_masuk);
    $this->db->update('surat_masuk', [
      'status'  => '1'
    ]);
  }

  public function buatSuratKeluar($filename, $id_surat_keluar)
  {
    $this->db->insert('surat_keluar', [
      'id_pengajuan_surat_keluar' => $id_surat_keluar,
      'no_surat'                  => $this->input->post('no_surat'),
      'tanggal'                   => $this->input->post('tanggal'),
      'file'                      => $filename . '.pdf',
      'isi'                       => $this->input->post('isi'),
      'urutan_surat'              => $this->input->post('urutan_surat')
    ]);
    $this->db->update('pengajuan_surat_keluar', [
      'status'  => 1
    ], ['id_pengajuan_surat_keluar' => $id_surat_keluar]);
  }

  public function getSuratTerbaru()
  {
    $this->db->order_by('urutan_surat', 'DESC');
    return $this->db->get('surat_keluar')->row_array();
  }

  public function disposisi()
  {
    $this->db->insert('disposisi', [
      'id_surat_masuk'  => $this->input->post('id_surat_masuk'),
      'seksi'           => $this->input->post('seksi'),
      'status'          => '1'
    ]);
    $this->db->update('surat_masuk', ['status' => '1'], ['id_surat_masuk' => $this->input->post('id_surat_masuk')]);
  }

  public function getDisposisi()
  {
    $this->db->where_not_in('disposisi.status', ['0']);
    $this->db->join('surat_masuk', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk');
    return $this->db->get_where('disposisi', [
      'disposisi.seksi' => $this->session->id_seksi
    ])->result_array();
  }

  public function disposisiKepalaSeksi()
  {
    $this->db->update('disposisi', [
      'subseksi'  => $this->input->post('staff'),
      'status'    => '2'
    ], ['id_surat_masuk'  => $this->input->post('id_surat_masuk')]);
    $this->db->update('surat_masuk', ['status' => '2'], ['id_surat_masuk' => $this->input->post('id_surat_masuk')]);
  }

  public function getDisposisiStaff()
  {
    $this->db->where_not_in('disposisi.status', ['0', '1']);
    $this->db->join('surat_masuk', 'disposisi.id_surat_masuk = surat_masuk.id_surat_masuk');
    return $this->db->get_where('disposisi', [
      'seksi'     => $this->session->id_seksi,
      'subseksi'  => $this->session->id_staff
    ])->result_array();
  }

  public function edit($id_surat_masuk)
  {
    if ($_FILES['file']['name'] == '') {
      $file = $this->input->post('file_old');
    } else {
      unlink('assets/' . $this->input->post('file_old'));
      $config['upload_path']          = './assets/';
      $config['allowed_types']        = 'pdf';
  
      $this->upload->initialize($config);
  
      if ( ! $this->upload->do_upload('file')) {
        $this->session->flashdata('pesan', '
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> gagal mengupload file surat.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        ');
        redirect('admin/surat_masuk/edit/' . $id_surat_masuk);
      } else {
        $file = $this->upload->data('file_name');
      }
    }
    
    $this->db->update('surat_masuk', [
      'no_surat'  => $this->input->post('no_surat'),
      'tanggal'   => $this->input->post('tanggal'),
      'pengirim'  => $this->input->post('pengirim'),
      'perihal'   => $this->input->post('perihal'),
      'file'      => $file,
    ], ['id_surat_masuk'  => $id_surat_masuk]);
  }

  public function hapus($id_surat_masuk)
  {
    $data = $this->db->get_where('surat_masuk', ['id_surat_masuk' => $id_surat_masuk])->row_array();
    if (file_exists('./assets/' . $data['file'])) {
      unlink('./assets/' . $data['file']);
    }
    $this->db->delete('disposisi', ['id_surat_masuk'  => $id_surat_masuk]);
    $this->db->delete('surat_masuk', ['id_surat_masuk'  => $id_surat_masuk]);
  }

  public function hapusSuratKeluar($id_surat_keluar)
  {
    $data = $this->db->get_where('surat_keluar', ['id_pengajuan_surat_keluar' => $id_surat_keluar])->row_array();
    if (file_exists('./assets/' . $data['file'])) {
      unlink('./assets/' . $data['file']);
    }
    $this->db->delete('surat_keluar', ['id_surat_keluar'  => $id_surat_keluar]);
    $this->db->delete('pengajuan_surat_keluar', ['id_pengajuan_surat_keluar'  => $id_surat_keluar]);
  }
}

?>