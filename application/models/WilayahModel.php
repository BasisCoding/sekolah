<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class WilayahModel extends CI_Model {
	
		function getProvinces()
		{
			return $this->db->get('provinces');
		}

		function getRegencies()
		{
			if ($this->input->get('prov_id')) {
				$this->db->where('province_id', $this->input->get('prov_id'));
			}

			return $this->db->get('regencies');
		}

		function getDistricts()
		{
			if ($this->input->get('regency_id')) {
				$this->db->where('regency_id', $this->input->get('regency_id'));
			}

			return $this->db->get('districts');
		}

		function getVillages()
		{
			if ($this->input->get('district_id')) {
				$this->db->where('district_id', $this->input->get('district_id'));
			}

			return $this->db->get('villages');
		}		
	
	}
	
	/* End of file WilayahModel.php */
	/* Location: ./application/models/WilayahModel.php */
?>