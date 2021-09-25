<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}

	}
	
	public function index()
	{
		$menu = $this->RoleMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu, 'data-registrasi');

		$def['title'] = SHORT_SITE_URL.' | Data Registrasi';
		$this->mybreadcrumb->add('<i class="icofont-ui-home"></i>', base_url(''));
		$this->mybreadcrumb->add('Data Registrasi', base_url('data-registrasi'));
		$def['breadcrumb'] = $this->mybreadcrumb->render();

		$this->load->view('partials/head', $def);
		$this->load->view('partials/navbar', $data);
		$this->load->view('partials/breadcrumb', $def);
		$this->load->view('Siswa/registrasi');
		$this->load->view('partials/footer');
		$this->load->view('plugins/Siswa/registrasi');
	}
	
}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Siswa/Registrasi.php */
?>