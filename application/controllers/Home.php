<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Home extends MY_Controller {
	
		public function index()
		{
			$def['title'] = 'Home';
			$this->load->view('front/home', $def);
		}
	
	}
	
	/* End of file Home.php */
	/* Location: ./application/controllers/Home.php */
	
?>