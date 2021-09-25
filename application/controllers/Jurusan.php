<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Jurusan extends CI_Controller {
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('JurusanModel');
		}

		public function getJurusan()
		{
			$html = '';

			$get = $this->JurusanModel->getJurusan();
			if ($get->num_rows() > 0) {
				foreach ($get->result() as $gt) {
					$html .= '<option value="'.$gt->id.'">'.$gt->nama_jurusan.'</option>';
				}
			}

			echo $html;
		}
	
	}
	
	/* End of file Jurusan.php */
	/* Location: ./application/controllers/Jurusan.php */
?>