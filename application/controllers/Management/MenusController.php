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

	public function getAjaxmenu()
	{
		if($this->input->is_ajax_request()) {
			header('Content-Type: application/json');

			$menu = $this->MenusModel->getMenu();
			echo json_encode($menu);
		}
	}

	public function postAjaxmenu()
	{
		if($this->input->is_ajax_request()) {
			header('Content-Type: application/json');
			$input_data = $this->input->post('data');

			$no = 0;
			$seq_no = 0;
			foreach ($input_data as $data)
			{
				$id = $data['id'];
				$parent_id = isset($data['parrent_id']) ? $data['parrent_id'] : null;

				if($parent_id !=0){
					$no++;
				} else {
					$no = 0;
					$seq_no++;
				}

				$sequence = $parent_id == 0 ? $seq_no : $parent_id.'.'.$no;

				$update_data = ['parrent_id' => $parent_id, 'sequence' => $sequence];
				$where = ['id' => $id];
				$this->MenusModel->updateMenu($where, $update_data);
			}

			$response = array(
				'type' => 'success',
				'message' => 'Data Menu Berhasil diubah'
			);

			echo json_encode($response);
		}
	}

	public function addMenu()
	{
		$data['nama_menu'] = $this->input->post('nama_menu');
		$data['link'] = $this->input->post('link');
		$data['icon'] = $this->input->post('icon');
		$data['color'] = $this->input->post('color');
		$data['role_id'] = $this->input->post('role_id');

		$this->MenusModel->addMenu($data);

		$response = array(
			'type' => 'success',
			'message' => 'Data Menu Berhasil ditambah'
		);

		echo json_encode($response);
	}

	public function updateMenuById()
	{
		$id = $this->input->post('id_update');
		$where = ['id' => $id];
		$data['nama_menu'] = $this->input->post('nama_menu_update');
		$data['link'] = $this->input->post('link_update');
		$data['icon'] = $this->input->post('icon_update');
		$data['color'] = $this->input->post('color_update');
		$data['role_id'] = $this->input->post('role_id_update');

		$this->MenusModel->updateMenu($where, $data);

		$response = array(
			'type' => 'success',
			'message' => 'Data Menu Berhasil diubah'
		);

		echo json_encode($response);
	}

	public function deleteMenuById()
	{
		$where['id'] = $this->input->post('id_delete');
		$this->MenusModel->deleteMenu($where);

		$response = array(
			'type' => 'success',
			'message' => 'Data Menu Berhasil dihapus'
		);

		echo json_encode($response);
	}
}

/* End of file MenusController.php */
/* Location: ./application/controllers/Management/MenusController.php */
?>