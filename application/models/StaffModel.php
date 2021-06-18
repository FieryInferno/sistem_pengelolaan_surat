<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffModel extends CI_Model {
  
	public function getAll()
	{
    return $this->db->get_where('data_user', ['level != ' => 'admin'])->result_array();
	}
}
