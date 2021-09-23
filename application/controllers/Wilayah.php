<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Wilayah extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->model('WilayahModel');
		}

		public function provinces()
		{
			$html = '';
			$get = $this->WilayahModel->getProvinces();
			if ($get->num_rows() > 0) {
				foreach ($get->result() as $gt) {
					$html .= '<option value="'.$gt->id.'">'.$gt->name.'</option>';
				}
			}else{
				$html .= '<option disabled>Tidak Ada Data</option>';
			}

			echo $html;
		}

		public function regencies()
		{
			$html = '';
			$get = $this->WilayahModel->getRegencies();
			if ($get->num_rows() > 0) {
				foreach ($get->result() as $gt) {
					$html .= '<option value="'.$gt->id.'">'.$gt->name.'</option>';
				}
			}else{
				$html .= '<option disabled>Tidak Ada Data</option>';
			}

			echo $html;
		}

		public function districts()
		{
			$html = '';
			$get = $this->WilayahModel->getDistricts();
			if ($get->num_rows() > 0) {
				foreach ($get->result() as $gt) {
					$html .= '<option value="'.$gt->id.'">'.$gt->name.'</option>';
				}
			}else{
				$html .= '<option disabled>Tidak Ada Data</option>';
			}

			echo $html;
		}

		public function villages()
		{
			$html = '';
			$get = $this->WilayahModel->getVillages();
			if ($get->num_rows() > 0) {
				foreach ($get->result() as $gt) {
					$html .= '<option value="'.$gt->id.'">'.$gt->name.'</option>';
				}
			}else{
				$html .= '<option disabled>Tidak Ada Data</option>';
			}

			echo $html;
		}
	
	}
	
	/* End of file Wilayah.php */
	/* Location: ./application/controllers/Wilayah.php */
?>