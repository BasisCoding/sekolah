<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}
		$this->load->model('RoleMenusModel');
		$this->load->helper('menu');
		$this->load->helper('upload');


		$this->load->model('UsersModel');
	}
	
	public function index()
	{
		$menu = $this->RoleMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$def['title'] = SHORT_SITE_URL.' | Management Users';
		$def['breadcrumb'] = 'Daftar Users';

		$this->load->view('partials/head', $def);
		$this->load->view('partials/navbar', $data);
		$this->load->view('partials/breadcrumb', $def);
		$this->load->view('Management/daftar_users');
		$this->load->view('partials/footer');
		$this->load->view('plugins/daftar_users');
	}

	public function getUserById()
	{
		$id = $this->input->get('id');
		$get = $this->UsersModel->getUserById($id)->row();
		echo json_encode($get);
	}

	public function getUsers()
	{
		$list = $this->UsersModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach ($list as $ls) {

			if ($ls->foto == NULL) {
				$foto = site_url('assets/users/default.png');
			}else{
				$foto = site_url('assets/users/'.$ls->foto);
			}

			$no++;
			$row = array();
			$row[] = '<a href="'.$foto.'" target="_blank"><img src="'.$foto.'" width="30" height="30"></a>';
			$row[] = $ls->username;
			$row[] = $ls->nama_lengkap;
			$row[] = $ls->email;
			$row[] = $ls->role_name;

			$row[] = '
			<div class="dropdown">
			<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-ellipsis-v"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
			<a class="dropdown-item update-data" href="#" data-id="'.$ls->id.'">Update</a>
			<a class="dropdown-item delete-data" href="#" data-id="'.$ls->id.'" data-foto="'.$ls->foto.'" data-nama="'.$ls->nama_lengkap.'">Delete</a>
			</div>
			</div>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->UsersModel->count_all(),
			"recordsFiltered" => $this->UsersModel->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}

	public function addUsers()
	{
		$data['username'] 		= $this->input->post('username');
		$data['password'] 		= hash('sha512', $this->input->post('password').config_item('encryption_key'));
		$data['nama_lengkap'] 	= $this->input->post('nama_lengkap');
		$data['email'] 			= $this->input->post('email');
		$data['hp'] 			= $this->input->post('hp');
		$data['jenis_kelamin'] 	= $this->input->post('jenis_kelamin');
		$data['tempat_lahir'] 	= $this->input->post('tempat_lahir');
		$data['tanggal_lahir'] 	= $this->input->post('tanggal_lahir');
		$data['alamat'] 		= $this->input->post('alamat');
		$data['role_id'] 		= $this->input->post('role_id');
		$data['status'] 		= 1;

		if (!empty($_FILES['foto']['name'])) {
			$upload = h_upload($data['username'], 'assets/assets/img/users', 'gif|jpg|png|jpeg', '1024', 'foto');
			
			if($upload){
				$data['foto'] = $upload;
			}else{
				$data['foto'] = null;
			}
		}

		$act = $this->UsersModel->addUsers($data);

		if ($act) {
			$response = array(
				'type' => 'success',
				'message' => 'Data Users berhasil dikirim'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'message' => 'Data Users gagal dikirim'
			);
		}

		echo json_encode($response);
	}
	
	public function updateUsers()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$foto_lama = $this->input->post('foto_lama');

		$data['nama_lengkap'] 	= $this->input->post('nama_lengkap');
		$data['email'] 			= $this->input->post('email');
		$data['hp'] 			= $this->input->post('hp');
		$data['jenis_kelamin'] 	= $this->input->post('jenis_kelamin');
		if (!empty($this->input->post('password'))) {
			$data['password'] 		= hash('sha512', $this->input->post('password').config_item('encryption_key'));
		}
		$data['tempat_lahir'] 	= $this->input->post('tempat_lahir');
		$data['tanggal_lahir'] 	= $this->input->post('tanggal_lahir');
		$data['alamat'] 		= $this->input->post('alamat');
		$data['role_id'] 		= $this->input->post('role_id');

		if (!empty($_FILES['foto']['name'])) {
			$upload = h_upload($username, 'assets/assets/img/users', 'gif|jpg|png|jpeg', '1024', 'foto');
			
			if($upload){
				$data['foto'] = $upload;
				@unlink('./assets/assets/img/users/'.$foto_lama);
			}else{
				$data['foto'] = $foto_lama;
			}
		}

		$act = $this->UsersModel->updateUsers($id, $data);

		if ($act) {
			$response = array(
				'type' => 'success',
				'message' => 'Data Users berhasil diubah'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'message' => 'Data Users gagal diubah'
			);
		}

		echo json_encode($response);
	}

	public function deleteUsers()
	{
		$id = $this->input->post('id');
		$foto = $this->input->post('foto');

		$act = $this->UsersModel->deleteUsers($id);

		if ($act) {
			@unlink('./assets/assets/img/users/'.$foto);
			$response = array(
				'type' => 'success',
				'message' => 'Data User berhasil dihapus'
			);
		}else{
			$response = array(
				'type' => 'danger',
				'message' => 'Data User gagal dihapus'
			);
		}

		echo json_encode($response);
	}
}

/* End of file UsersController.php */
/* Location: ./application/controllers/Management/UsersController.php */
?>