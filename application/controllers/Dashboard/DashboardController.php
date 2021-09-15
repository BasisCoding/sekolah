<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}
		$this->load->model('RoleMenusModel');
		$this->load->helper('menu');
	}
	
	public function index()
	{
		$menu = $this->RoleMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$def['title'] = SHORT_SITE_URL.' | Dashboard';

		$this->mybreadcrumb->add('<i class="icofont-ui-home"></i>', base_url(''));
		$def['breadcrumb'] = $this->mybreadcrumb->render();

		$this->load->view('partials/head', $def);
		$this->load->view('partials/navbar', $data);
		$this->load->view('partials/breadcrumb', $def);
		$this->load->view('Dashboard/dashboard');
		$this->load->view('partials/footer');
		$this->load->view('plugins/dashboard');
	}
	
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
?>