<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffModel extends CI_Model {
  
	public function getAll()
	{
    $this->db->where('level !=', 'admin');
    $this->db->where('level !=', 'kepala_p3d');
    $data = $this->db->get('user')->result_array();
    for ($i=0; $i < count($data); $i++) { 
      $key  = $data[$i];
      switch ($key['level']) {
        case 'kepala_seksi':
          $this->db->join('seksi', 'kepala_seksi.id_seksi = seksi.id_seksi');
          $kepala_seksi = $this->db->get_where('kepala_seksi', ['id_user' => $key['id_user']])->row_array();
          $data[$i]['nik']        = $kepala_seksi['nik'];
          $data[$i]['nama']       = $kepala_seksi['nama'];
          $data[$i]['email']      = $kepala_seksi['email'];
          $data[$i]['nama_seksi'] = $kepala_seksi['nama_seksi'];
          break;
        case 'staff':
          $this->db->join('seksi', 'staff.id_seksi = seksi.id_seksi');
          $this->db->join('subseksi', 'staff.subseksi = subseksi.id_subseksi');
          $kepala_seksi = $this->db->get_where('staff', ['id_user' => $key['id_user']])->row_array();
          $data[$i]['nik']            = $kepala_seksi['nik'];
          $data[$i]['nama']           = $kepala_seksi['nama'];
          $data[$i]['email']          = $kepala_seksi['email'];
          $data[$i]['nama_seksi']     = $kepala_seksi['nama_seksi'];
          $data[$i]['nama_subseksi']  = $kepala_seksi['nama_subseksi'];
          break;
        
        default:
          # code...
          break;
      } 
    }
    return $data;
	}

  public function getById($id_user)
  {
    $data = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    switch ($data['level']) {
      case 'admin':
      case 'kepala_p3d':
        $data['nik']      = NULL;
        $data['nama']     = NULL;
        $data['email']    = NULL;
        $data['id_seksi'] = NULL;
        $data['subseksi'] = NULL;
        break;
      case 'kepala_seksi':
        $kepala_seksi     = $this->db->get_where('kepala_seksi', ['id_user' => $data['id_user']])->row_array();
        $data['nik']      = $kepala_seksi['nik'];
        $data['nama']     = $kepala_seksi['nama'];
        $data['email']    = $kepala_seksi['email'];
        $data['id_seksi'] = $kepala_seksi['id_seksi'];
        $data['subseksi'] = NULL;
        break;
      case 'staff':
        $staff            = $this->db->get_where('staff', ['id_user' => $data['id_user']])->row_array();
        $data['nik']      = $staff['nik'];
        $data['nama']     = $staff['nama'];
        $data['email']    = $staff['email'];
        $data['id_seksi'] = $staff['id_seksi'];
        $data['subseksi'] = $staff['subseksi'];
        break;
      
      default:
        # code...
        break;
    }
    return $data;
  }

  public function tambah()
  {
    $id_user  = uniqid();
    $this->db->insert('user', [
      'id_user'   => $id_user,
      'username'	=> $this->input->post('username'),
      'password'	=> $this->input->post('password'),
      'level'		  => $this->input->post('role'),
    ]);

    if ($this->input->post('role') !== 'admin' || $this->input->post('role') !== 'kepala_p3d') {
      switch ($this->input->post('role')) {
        case 'kepala_seksi':
          $this->db->insert('kepala_seksi', [
            'id_user'   => $id_user,
            'nik'	      => $this->input->post('nik'),
            'nama'	    => $this->input->post('nama'),
            'email'	    => $this->input->post('email'),
            'id_seksi'	=> $this->input->post('id_seksi'),
          ]);
          break;
        case 'staff':
          $this->db->insert('staff', [
            'id_user'   => $id_user,
            'nik'	      => $this->input->post('nik'),
            'nama'	    => $this->input->post('nama'),
            'email'	    => $this->input->post('email'),
            'id_seksi'	=> $this->input->post('id_seksi'),
            'subseksi'	=> $this->input->post('subseksi'),
          ]);
          break;
        
        default:
          # code...
          break;
      }
    }
  }

  public function edit($id_user)
  {
    $this->db->update('user', [
      'username'	=> $this->input->post('username'),
      'password'	=> $this->input->post('password'),
      'level'		  => $this->input->post('role'),
    ], ['id_user' => $id_user]);

    if ($this->input->post('role') !== 'admin' || $this->input->post('role') !== 'kepala_p3d') {
      switch ($this->input->post('role')) {
        case 'kepala_seksi':
          $data  = $this->db->get_where('kepala_seksi', ['id_user'  => $id_user])->num_rows();
          if ($data > 0) {
            $this->db->update('kepala_seksi', [
              'id_user'   => $id_user,
              'nik'	      => $this->input->post('nik'),
              'nama'	    => $this->input->post('nama'),
              'email'	    => $this->input->post('email'),
              'id_seksi'	=> $this->input->post('id_seksi'),
            ], ['id_user'  => $id_user]);
          } else {
            $this->db->insert('kepala_seksi', [
              'id_user'   => $id_user,
              'nik'	      => $this->input->post('nik'),
              'nama'	    => $this->input->post('nama'),
              'email'	    => $this->input->post('email'),
              'id_seksi'	=> $this->input->post('id_seksi'),
            ]);
            $this->db->delete('staff', ['id_user'  => $id_user]);
          }
          break;
        case 'staff':
          $data  = $this->db->get_where('staff', ['id_user'  => $id_user])->num_rows();
          if ($data > 0) {
            $this->db->update('staff', [
              'id_user'   => $id_user,
              'nik'	      => $this->input->post('nik'),
              'nama'	    => $this->input->post('nama'),
              'email'	    => $this->input->post('email'),
              'id_seksi'	=> $this->input->post('id_seksi'),
              'subseksi'	=> $this->input->post('subseksi'),
            ], ['id_user'  => $id_user]);
          } else {
            $this->db->insert('staff', [
              'id_user'   => $id_user,
              'nik'	      => $this->input->post('nik'),
              'nama'	    => $this->input->post('nama'),
              'email'	    => $this->input->post('email'),
              'id_seksi'	=> $this->input->post('id_seksi'),
              'subseksi'	=> $this->input->post('subseksi'),
            ]);
            $this->db->delete('kepala_seksi', ['id_user'  => $id_user]);
          }
          break;
        
        default:
          # code...
          break;
      }
    }
  }
}
