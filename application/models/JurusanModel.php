<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class JurusanModel extends CI_Model {
	
	function getJurusan()
	{
		return $this->db->get('jurusan');
	}	
	
}

/* End of file JurusanModel.php */
/* Location: ./application/models/JurusanModel.php */
?>