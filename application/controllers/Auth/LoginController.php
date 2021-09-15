	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class LoginController extends MY_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('AuthModel');
			$this->load->helper('String');
		}

		public function index()
		{
			$data['page_title'] = 'Login';

			$cookie = get_cookie('sekolah');
			if ($this->session->userdata('logged')) {
				redirect($this->session->userdata('role_slug'),'refresh');
			}else if ($cookie <> '') {
				$row = $this->AuthModel->get_by_cookie($cookie)->row();
				if ($row) {
					$this->_reg_session($row);
				}else{
					$this->load->view('auth/login', $data);
				}
			}else{
				$this->load->view('auth/login', $data);
			}
		}

		public function login()
		{
			$username 	= $this->input->post('username');
			$password 	= hash('sha512', $this->input->post('password').config_item('encryption_key'));
			$remember 	= $this->input->post('remember');

			$row = $this->AuthModel->login($username, $password);
			if ($row) {
				if ($row->email_verified_at == NULL) {
					$response = array(
						'status' => 'warning',
						'message' => 'Silahkan verifikasi email terlebih dahulu, periksa kotak masuk atau spam !',
						'redirect' => base_url('login'),
					);
				}else{
					if ($remember) {
						$key = random_string('alnum', 64);
						setcookie('sekolah', $key, 3600*24*30);
						$update = array('cookie' => $key);

						$this->AuthModel->update($update, $row->id);
					}

					$response = $this->_reg_session($row);
				}
			}else{
				$response = array(
					'status' => 'danger',
					'message' => 'Username atau Password yang anda masukan salah !',
					'redirect' => base_url('login'),
				);
			}

			echo json_encode($response);
		}

		public function _reg_session($row)
		{
			$data_session = array(
				'id'			=> $row->id,
				'username'		=> $row->username,
				'email'			=> $row->email,
				'nama_lengkap'	=> $row->nama_lengkap,
				'foto'			=> $row->foto,
				'role_id'		=> $row->role_id,
				'role_name'		=> $row->role_name,
				'role_slug'		=> $row->role_slug,
				'logged' 		=> TRUE
			);

			$this->session->set_userdata($data_session);

			$response = array(
				'status' => 'success',
				'message' => 'Anda Berhasil Login',
				'redirect' => base_url($this->session->userdata('role_slug')),
			);

			return $response;
		}

		public function logout()
		{
			delete_cookie('sekolah');
			$this->session->sess_destroy();
			redirect('login','refresh');
		}

		public function create_password()
		{
			$get = 'password';
			$password 	= hash('sha512', $get.config_item('encryption_key'));
			echo $password;
		}

	}
	
	/* End of file Login.php */
	/* Location: ./application/controllers/Login.php */
?>