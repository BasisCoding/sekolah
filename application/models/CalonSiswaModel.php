<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class CalonSiswaModel extends CI_Model {
	
		var $column_order = array(null, 'a.username','a.nama_lengkap','a.email', 'a.hp', 'a.jenis_kelamin', 'r.role_name', 'a.alamat'); 
	    var $column_search = array('a.username','a.nama_lengkap','a.email', 'a.hp', 'a.jenis_kelamin', 'r.role_name', 'a.alamat'); //field yang diizin untuk pencarian 
	    var $order = array('a.nama_lengkap' => 'asc'); // default order 
	
	// Datatable
		private function _get_datatables_query()
		{
			$this->db->select('a.*, r.role_name, r.role_slug');
			$this->db->from('users as a');
			$this->db->join('roles as r', 'r.id = a.role_id', 'left');
			$this->db->where('role_id', 3);
	        $i = 0;
	     	
	        foreach ($this->column_search as $item) // looping awal
	        {
	            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
	            {
	                 
	                if($i===0) // looping awal
	                {
	                    $this->db->group_start();
	                    $this->db->like($item, $_POST['search']['value']); 
	                }
	                else
	                {
	                    $this->db->or_like($item, $_POST['search']['value']);
	                }
	 
	                if(count($this->column_search) - 1 == $i) 
	                    $this->db->group_end(); 
	            }
	            $i++;
	        }
	         
	        if(isset($_POST['order'])) { // here order processing
	            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        }  else if(isset($this->order)) {
	            $order = $this->order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
		}

		function get_datatables()
		{
			$this->_get_datatables_query();
	        if($_POST['length'] != -1)
	        $this->db->limit($_POST['length'], $_POST['start']);
	    	
	        $query = $this->db->get();
	        return $query->result();
		}

		function count_filtered()
	    {
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    function count_all()
	    {
	        $this->db->from('users');
	        return $this->db->count_all_results();
	    }
	// Datatable

	    function getUserById($id)
	    {
	    	return $this->db->get_where('users', array('id' => $id));
	    }

	    function addUsers($users, $data)
	    {
	    	$this->db->insert('users', $users);
	    		$data['user_id'] = $this->db->insert_id();
	    		$role = $this->db->get_where('roles', array('id' => $users['role_id']))->row();
	    		return $this->db->insert('users_'.$role, $data);
	    }

	    function updateUsers($id, $data)
	    {
	    	return $this->db->update('users', $data, array('id' => $id));
	    }

	    function deleteUsers($id)
	    {
	    	return $this->db->delete('users', array('id' => $id));
	    }
	
	}
	
	/* End of file UsersModel.php */
	/* Location: ./application/models/UsersModel.php */
?>