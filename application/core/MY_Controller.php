<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class MY_Controller extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$config = $this->db->get('config')->result_array();
			foreach ($config as $cf) {
				define("_{$cf['attr']}", $cf['value']);
			}
		}
	
	}
	
	/* End of file MY_Controller.php */
	/* Location: ./application/core/MY_Controller.php */
	
?>