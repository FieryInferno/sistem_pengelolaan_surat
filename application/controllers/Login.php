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
      $surat    = $this->db->get_where('data_user', [
        'username'  => $username,
        'password'  => $password
      ])->row_array();
      
      if($surat){
        $this->session->set_userdata([
          'id_user'   => $surat['id_user'],
          'username'  => $surat['username'],
          'level'     => $surat['level'],
          'nama'      => $surat['nama'],
          'seksi'     => $surat['seksi']
        ]);
        switch ($surat['level']) {
          case 'admin':
            redirect('admin/Dashboard');
            break;
          case 'kepala_p3d':
            redirect('kepala_p3d');
            break;
          case 'kepala_seksi':
            redirect('kepala_seksi');
            break;
          case 'staff':
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
      redirect();
    }
  }
?>