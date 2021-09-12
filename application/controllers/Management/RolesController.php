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

	public function selectRole()
	{
		$get = $this->RoleMenusModel->getRoles()->result();
		echo json_encode($get);
	}

	public function getUserById()
	{
		$id = $this->input->get('id');
		$get = $this->UsersModel->getUserById($id)->row();
		echo json_encode($get);
	}

	public function getRoles()
	{
		$html = '';
		$get = $this->RoleMenusModel->getRoles()->result();
		foreach ($get as $gt) {
			
			$html .= '<li class="list-group-item px-0">
						<div class="row align-items-center">
							<div class="col ml--2">
								<h4 class="mb-0">
									<a href="#!">'.$gt->role_name.'</a>
								</h4>
								<small>'.$gt->role_slug.'</small>
							</div>
							<div class="col-auto">
								<button type="button" data-id="'.$gt->id.'" data-nama="'.$gt->role_name.'" class="btn btn-sm btn-primary btn-icon view-menu">'.$gt->jumlah_menu.' Menu</button>
								<button type="button" data-id="'.$gt->id.'" data-nama="'.$gt->role_name.'" data-slug="'.$gt->role_slug.'" class="btn btn-sm btn-warning btn-icon update-role"><i class="ni ni-settings"></i></button>
								<button type="button" data-id="'.$gt->id.'" data-nama="'.$gt->role_name.'" data-slug="'.$gt->role_slug.'" class="btn btn-sm btn-danger btn-icon delete-role"><i class="ni ni-fat-delete"></i></button>
							</div>
						</div>
					</li>';
		}

		echo $html;
	}

	public function getRoleMenus()
	{
		if($this->input->is_ajax_request()) {
			header('Content-Type: application/json');

			$role_id = $this->input->post('role_id');
			$menu = $this->RoleMenusModel->getRoleMenus($role_id)->result();
			echo json_encode($menu);
		}
	}

	public function addRole()
	{
		$data['role_name'] = $this->input->post('role_name');
		$data['role_slug'] = $this->input->post('role_slug');

		$insert = $this->RoleMenusModel->addRole($data);
		$response = array(
			'type' => 'success',
			'message' => 'Role '.$data['role_name'].' Berhasil ditambah'
		);

		echo json_encode($response);
	}

	public function updateRole()
	{
		$id = $this->input->post('id_update');
		$data['role_name'] = $this->input->post('role_name_update');
		$data['role_slug'] = $this->input->post('role_slug_update');

		$insert = $this->RoleMenusModel->updateRole($id, $data);
		$response = array(
			'type' => 'success',
			'message' => 'Role '.$data['role_name'].' Berhasil diubah'
		);

		echo json_encode($response);
	}

	public function deleteRole()
	{
		$id = $this->input->post('id_delete');
		$delete = $this->RoleMenusModel->deleteRole($id);
		$response = array(
			'type' => 'success',
			'message' => 'Role '.$data['role_name'].' Berhasil dihapus'
		);

		echo json_encode($response);
	}
}

/* End of file UsersController.php */
/* Location: ./application/controllers/Management/UsersController.php */
?>

