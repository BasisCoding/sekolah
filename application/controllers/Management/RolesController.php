<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RolesController extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}
		$this->load->model('RoleMenusModel');
		$this->load->helper('menu');


		$this->load->model('UsersModel');
	}
	
	public function index()
	{
		$menu = $this->RoleMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$def['title'] = SHORT_SITE_URL.' | Management Roles';
		$def['breadcrumb'] = 'Daftar Roles';

		$this->load->view('partials/head', $def);
		$this->load->view('partials/navbar', $data);
		$this->load->view('partials/breadcrumb', $def);
		$this->load->view('Management/daftar_roles');
		$this->load->view('partials/footer');
		$this->load->view('plugins/daftar_roles');
	}

	public function getUserById()
	{
		$id = $this->input->get('id');
		$get = $this->UsersModel->getUserById($id)->row();
		echo json_encode($get);
	}

	public function getUsers()
	{
		$html = '';
		$get = $this->RoleMenusModel->getUsers()->result();
		foreach ($get as $gt) {

			if ($gt->foto == NULL) {
					$foto = site_url('assets/assets/img/users/default.png');
				}else{
					$foto = site_url('assets/assets/img/users/'.$gt->foto);
				}
			
			$html .= '<li class="list-group-item px-0">
						<div class="row align-items-center">
							<div class="col-auto">
								<a href="'.$foto.'" class="avatar rounded-circle">
									<img alt="Image placeholder" src="'.$foto.'">
								</a>
							</div>
							<div class="col ml--2">
								<h4 class="mb-0">
									<a href="#!">'.$gt->nama_lengkap.'</a>
								</h4>
								<span class="text-success">●</span>
								<small>'.$gt->role_name.'</small>
							</div>
							<div class="col-auto">
								<span class="badge badge-success">'.$gt->jumlah_menu.'</span>
								<button type="button" class="btn btn-sm btn-primary">Add</button>
							</div>
						</div>
					</li>';
		}

		echo $html;
	}
}

/* End of file UsersController.php */
/* Location: ./application/controllers/Management/UsersController.php */
?>

