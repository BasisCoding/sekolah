<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class AuthModel extends CI_Model {

		private $table_users = 'users';
		private $table_role = 'roles';
		private $pk = 'id';

		public function __construct()
		{
			parent::__construct();
		}

		function login($username, $password)
		{
			$this->db->select('*');
			$this->db->from($this->table_users);
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$this->db->limit(1);
			$users = $this->db->get();
			if ($users->num_rows() > 0) {
				$user = $users->row();
				return $this->role_active($user->role_id);
			}else{
				return false;
			}
		}

		function role_active($role_id)
		{
			$this->db->select('*');
			$this->db->from($this->table_users);
			$this->db->join($this->table_role, 'roles.id = users.role_id', 'left');
			$this->db->where($this->table_role.'.id', $role_id);
			return $this->db->get()->row();
		}

		function update($data, $id)
		{
			$this->db->update('users', $data, array($this->pk => $id));
		}

		function get_by_cookie($cookie)
		{
			$this->db->where('cookie', $cookie);
			return $this->db->get('users');
		}

		function verification($code)
		{
			$data['email_verified_at'] = date('Y-m-d H:i:s');
			return $this->db->update('users', $data, array('verified_code' => $code));
		}
	
	}
	
	/* End of file AuthModel.php */
	/* Location: ./application/models/AuthModel.php */
?>