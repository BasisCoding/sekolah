<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MenusModel extends CI_Model {

	function getMenu()
	{
		$this->db->select('menus.*, roles.role_name, roles.role_slug');
		$this->db->from('menus');
		$this->db->join('roles', 'roles.id = menus.role_id', 'left');
		$this->db->order_by('sequence', 'asc');
		$this->db->where('menus.parrent_id', 0);
		$parrent = $this->db->get();
		$menu = $parrent->result();
		$i = 0;

		foreach ($menu as $mn) {
			$menu[$i]->parrent = $this->getChildMenu($mn->id);
			$i++;
		}

		return $menu;
	}

	function getChildMenu($parrent_id)
	{
		$this->db->select('menus.*, roles.role_name, roles.role_slug');
		$this->db->from('menus');
		$this->db->join('roles', 'roles.id = menus.role_id', 'left');
		$this->db->order_by('sequence', 'asc');
		$this->db->where('menus.parrent_id', $parrent_id);
		$parrent = $this->db->get();
		$menu = $parrent->result();
		$i = 0;

		foreach ($menu as $mn) {
			$menu[$i]->parrent = $this->getChildMenu($mn->id);
			$i++;
		}

		return $menu;
	}

	function addMenu($data)
	{
		return $this->db->insert('menus', $data);
	}

	function updateMenu($where, $data)
	{
		$this->db->update("menus", $data, $where);
	}

	function deleteMenu($where)
	{
		$this->db->delete("menus", $where);
	}

}

/* End of file MenusModel.php */
/* Location: ./application/models/MenusModel.php */
?>