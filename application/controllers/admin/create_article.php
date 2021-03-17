<?php 
	class create_article extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_admin','model');
			$this->table = 'post';
		}
		public function index()
		{
			$this->load->view('admin/admin-createarticle');
		}
		public function upload()
		{
			$title = $this->input->post('title');
			$opening = $this->input->post('opening-txt');
			$content = $this->input->post('content');
			$date = date("Y/m/d");

			
       		$data = [
       			'title'=>$title,
       			'opening_txt'=>$opening,
       			'content'=>$content,
       			'upload_dt'=>$date
       		];

       		$this->model->insert_data($this->table, $data);

       		$latest_id = $this->db->insert_id();

       		$file_name = $_FILES['img']['name'];
			$base_dir ='./uploads/';
			$target_dir = $base_dir . $latest_id . "/";
			$target_file = $target_dir . basename($_FILES['img']['name']);
			if (!is_dir($target_dir)) {
				mkdir($target_dir);
			}
			$tmp_file = $_FILES['img']['tmp_name'];
			$config['file_name'] = $file_name; 
			$config['upload_path'] = $target_dir;
       		$config['allowed_types'] = 'jpg|jpeg|png';


       		$data = [
       			'title'=>$title,
       			'opening_txt'=>$opening,
       			'content'=>$content,
       			'img_nm'=>$file_name,
       			'img_dir'=>$target_file,
       			'upload_dt'=>$date
       		];

       		$this->db->where('article_id', $latest_id);
			$this->db->update($this->table, $data);

       		$this->load->library('upload', $config);

       		move_uploaded_file($tmp_file, $target_file);


		}
	}
?>