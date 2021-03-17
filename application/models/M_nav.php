<?php 
	class M_nav extends CI_Model
	{
		public function insert_data($table, $data)
		{
			return $this->db->insert($table, $data);
		}
		public function get_all_data($table)
		{
			return $this->db->get($table);
		}

		public function get_data($table, $data)
		{
			return $this->db->get_where($table, $data);
		}
	}
 ?>