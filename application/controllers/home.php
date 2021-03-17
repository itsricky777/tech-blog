<?php 
	class home extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_home','model');
			$this->table = 'post';
		}
		public function index()
		{
			$data['post'] = $this->model->get_data_order_by($this->table);
			$this->load->view('page-home', $data);
		}
	}
 ?>