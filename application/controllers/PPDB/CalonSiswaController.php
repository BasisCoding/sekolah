<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalonSiswaController extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == false) {
			redirect('login','refresh');
		}

		$this->load->model('CalonSiswaModel');
		check_role('calon-siswa');
	}
	
	public function index()
	{
		$menu = $this->RoleMenusModel->get_menu();
		$data['menu'] = fetch_menu($menu);

		$def['title'] = SHORT_SITE_URL.' | Daftar Calon Siswa';
		$this->mybreadcrumb->add('<i class="icofont-ui-home"></i>', base_url(''));
		$this->mybreadcrumb->add('Daftar Calon Siswa', base_url('calon-siswa'));
		$def['breadcrumb'] = $this->mybreadcrumb->render();

		$this->load->view('partials/head', $def);
		$this->load->view('partials/navbar', $data);
		$this->load->view('partials/breadcrumb', $def);
		$this->load->view('PPDB/calon_siswa');
		$this->load->view('partials/footer');
		$this->load->view('plugins/PPDB/calon_siswa');
	}

	public function getCalonSiswa()
	{
		$list = $this->CalonSiswaModel->get_datatables();
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
			"recordsTotal" => $this->CalonSiswaModel->count_all(),
			"recordsFiltered" => $this->CalonSiswaModel->count_filtered(),
			"data" => $data
		);

		echo json_encode($output);
	}
	
}

/* End of file CalonSiswaController.php */
/* Location: ./application/controllers/PPDB/CalonSiswaController.php */
?>