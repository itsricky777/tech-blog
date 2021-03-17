<?php 
	class M_home extends CI_Model
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
		public function get_data_order_by($table)
		{
			$this->db->select('*');
			$this->db->from('post');
			$this->db->order_by("upload_dt","desc");
			$query=$this->db->get();
			return $query->result();
		}
	}
 ?>