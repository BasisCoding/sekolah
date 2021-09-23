<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('permission_helper')) {

	function check_role($link)
	{
		$CI = & get_instance();
		$CI->db->where('role_id', $CI->session->userdata('role_id'));
		$CI->db->where('link', $link);
		$link = $CI->db->get('menus');
		if ($link->num_rows() <= 0) {
			redirect('404_override','refresh');
		}
	}
}

?>