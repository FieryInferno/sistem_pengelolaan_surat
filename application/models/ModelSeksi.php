<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSeksi extends CI_Model {
  
	public function getAll()
	{
    return $this->db->get('seksi')->result_array();
	}
}
