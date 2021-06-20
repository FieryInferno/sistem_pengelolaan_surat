<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller{

		public function index()
    {
			$this->load->view('login');
		}

		public function masuk()
    {
      $this->form_validation->set_rules('username','Nama pengguna','trim|required');
      $this->form_validation->set_rules('password','Kata sandi','trim|required');
      if($this->form_validation->run() == FALSE){
        $this->load->view('Login');    
      }else{
        $this->_login();
      }
    }
    
    private function _login()
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $surat    = $this->db->get_where('user', [
        'username'  => $username,
        'password'  => $password
      ])->row_array();
      
      if($surat){
        $this->session->set_userdata([
          'id_user'   => $surat['id_user'],
          'username'  => $surat['username'],
          'level'     => $surat['level'],
        ]);
        switch ($surat['level']) {
          case 'admin':
            redirect('admin/Dashboard');
            break;
          case 'kepala_p3d':
            redirect('kepala_p3d');
            break;
          case 'kepala_seksi':
            $akun = $this->db->get_where('kepala_seksi', ['id_user' => $surat['id_user']])->row_array();
            $this->session->set_userdata([
              'nik'             => $akun['nik'],
              'nama'            => $akun['nama'],
              'email'           => $akun['email'],
              'id_seksi'        => $akun['id_seksi'],
              'id_kepala_seksi' => $akun['id_kepala_seksi']
            ]);
            redirect('kepala_seksi');
            break;
          case 'staff':
            $akun = $this->db->get_where('staff', ['id_user' => $surat['id_user']])->row_array();
            $this->session->set_userdata([
              'nik'       => $akun['nik'],
              'nama'      => $akun['nama'],
              'email'     => $akun['email'],
              'id_seksi'  => $akun['id_seksi'],
              'subseksi'  => $akun['subseksi'],
              'id_staff'  => $akun['id_staff']
            ]);
            redirect('staff');
            break;
          
          default:
            # code...
            break;
        }
      }else{
        echo 'Akun belum terdaftar';
      }     
    }

    public function logout()
    {
      $this->session->sess_destroy();
      redirect('login');
    }
  }
?>