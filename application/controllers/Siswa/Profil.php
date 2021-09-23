<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller {
	
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
		$data['menu'] = fetch_menu($menu, 'profil-siswa');

		$def['title'] = SHORT_SITE_URL.' | Profil Siswa';
		$this->mybreadcrumb->add('<i class="icofont-ui-home"></i>', base_url(''));
		$this->mybreadcrumb->add('Profil Siswa', base_url('profil-siswa'));
		$def['breadcrumb'] = $this->mybreadcrumb->render();

		$this->load->view('partials/head', $def);
		$this->load->view('partials/navbar', $data);
		$this->load->view('partials/breadcrumb', $def);
		$this->load->view('Siswa/profil');
		$this->load->view('partials/footer');
		$this->load->view('plugins/Siswa/profil');
	}
	
}

/* End of file Profil.php */
/* Location: ./application/controllers/Siswa/Profil.php */

?>