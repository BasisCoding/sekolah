<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MenusController extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}
		$this->load->model('RoleMenusModel');
		$this->load->helper('menu');

		$this->load->model('MenusModel');
	}
	
	public function index()
	{
		$menu = $this->RoleMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$def['title'] = SHORT_SITE_URL.' | Management Menus';
		$def['breadcrumb'] = 'Daftar Menu';

		$this->load->view('partials/head', $def);
		$this->load->view('partials/navbar', $data);
		$this->load->view('partials/breadcrumb', $def);
		$this->load->view('Management/daftar_menus');
		$this->load->view('partials/footer');
		$this->load->view('plugins/daftar_menus');
	}
}

/* End of file MenusController.php */
/* Location: ./application/controllers/Management/MenusController.php */
?>