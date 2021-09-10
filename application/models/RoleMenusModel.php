<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class RoleMenusModel extends CI_Model {
	
		function get_menu()
		{
			$this->db->select('menus.nama_menu, menus.icon, menus.link, menus.color, menus.parrent_id, menus.id');
			$this->db->from('menus');
			$this->db->join('menu_users', 'menus.id = menu_users.menu_id', 'left');
			$this->db->join('users', 'users.id = menu_users.user_id', 'left');
			$this->db->where('parrent_id', 0);
			$this->db->where('menu_users.user_id', $this->session->userdata('id'));
			
			$menus = $this->db->get()->result();
			$i = 0;

			foreach ($menus as $mn) {
				$menus[$i]->sub = $this->get_sub_menu($mn->id);
				$i++;
			}

			return $menus;
		}

		function get_sub_menu($id)
		{
			$this->db->select('menus.nama_menu, menus.icon, menus.link, menus.color, menus.parrent_id, menus.id');
			$this->db->from('menus');
			$this->db->join('menu_users', 'menus.id = menu_users.menu_id', 'left');
			$this->db->join('users', 'users.id = menu_users.user_id', 'left');
			$this->db->where('menus.parrent_id', $id);
			$this->db->where('menu_users.user_id', $this->session->userdata('id'));

			$menus = $this->db->get()->result();
			$i = 0;

			foreach ($menus as $mn) {
				$menus[$i]->sub = $this->get_sub_menu($mn->id);
				$i++;
			}

			return $menus;
		}

		function getUsers()
		{
			$this->db->select('u.nama_lengkap, u.foto, u.id, m.nama_menu, r.role_name, m.link, m.icon, m.color, m.parrent_id, COUNT(mu.user_id) as jumlah_menu');
			$this->db->from('users as u');
			$this->db->join('menu_users as mu', 'u.id = mu.user_id', 'left');
			$this->db->join('menus as m', 'm.id = mu.menu_id', 'left');
			$this->db->join('roles as r', 'r.id = u.role_id', 'left');
			// $this->db->group_by('menu_users.user_id');
			return $this->db->get();
		}
	
	}
	
	/* End of file RoleMenusModel.php */
	/* Location: ./application/models/RoleMenusModel.php */
?>