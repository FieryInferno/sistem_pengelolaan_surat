<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSubseksi extends CI_Model {
  
	public function getAll()
	{
    return $this->db->get('subseksi')->result_array();
	}
}
