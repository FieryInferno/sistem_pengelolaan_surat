<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffModel extends CI_Model {
  
	public function getAll()
	{
    return $this->db->get_where('data_user', ['level != ' => 'admin'])->result_array();
	}

  public function getById($id_user)
  {
    return $this->db->get_where('data_user', ['id_user' => $id_user])->row_array();
  }
}
