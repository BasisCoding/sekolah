<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class RoleMenusModel extends CI_Model {
	
		function get_menu()
		{
			$this->db->select('menus.nama_menu, menus.icon, menus.link, menus.color, menus.parrent_id, menus.id');
			$this->db->from('menus');
			$this->db->join('roles', 'roles.id = menus.role_id', 'left');
			$this->db->where('parrent_id', 0);
			$this->db->where('menus.role_id', $this->session->userdata('role_id'));
			
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
			$this->db->join('roles', 'roles.id = menus.role_id', 'left');
			$this->db->where('menus.parrent_id', $id);
			$this->db->where('menus.role_id', $this->session->userdata('role_id'));

			$menus = $this->db->get()->result();
			$i = 0;

			foreach ($menus as $mn) {
				$menus[$i]->sub = $this->get_sub_menu($mn->id);
				$i++;
			}

			return $menus;
		}

		function getRoles()
		{
			$this->db->select('r.role_name, r.role_slug, COUNT(m.role_id) as jumlah_menu, r.id');
			$this->db->from('roles as r');
			$this->db->join('menus as m', 'm.role_id = r.id', 'left');
			$this->db->group_by('r.id');
			return $this->db->get();
		}

		function addRole($data)
		{
			return $this->db->insert('roles', $data);
		}

		function updateRole($id, $data)
		{
			return $this->db->update('roles', $data, array('id' => $id));
		}

		function deleteRole($id)
		{
			return $this->db->delete('roles', array('id' => $id));
		}

		function getRoleMenus($role_id)
		{
			$this->db->select('*');
			$this->db->from('menus');
			if ($role_id != null) {
				$this->db->where('role_id', $role_id);
			}
			$this->db->order_by('sequence', 'asc');
			return $this->db->get();
		}
	
	}
	
	/* End of file RoleMenusModel.php */
	/* Location: ./application/models/RoleMenusModel.php */
?>