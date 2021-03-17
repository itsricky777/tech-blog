<?php 
	class articlelist extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_admin','model');
			$this->table = 'post';
		}
		public function index()
		{
			$data['post'] = $this->model->get_all_data($this->table);
			$this->load->view('admin/admin-articlelist', $data);
		}
		public function show_edit($id)
		{
			$data['post'] = $this->model->get_data($this->table, ['article_id' => $id])->row();
			$this->load->view('admin/admin-articlelist-edit', $data);
		}
		public function edit($id)
		{
				//mengambil data email, password, nama, dan id dari client side
				$article_id = $id;
				$title = $this->input->post('title');
				$opening = $this->input->post('opening-txt');
				$content = $this->input->post('content');
				

				if (isset($_FILES['img'])) {
					$file_name = $_FILES['img']['name'];
					$base_dir ='./uploads/';
					$target_dir = $base_dir . $article_id . "/";
					$target_file = $target_dir . basename($_FILES['img']['name']);
					if (!is_dir($target_dir)) {
						mkdir($target_dir);
					}
					if(file_exists($target_file)){
        				unlink($target_file);
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
       					'img_dir'=>$target_file
       				];

       				$this->db->where('article_id', $article_id);
					$this->db->update($this->table, $data);

       				$this->load->library('upload', $config);

       				move_uploaded_file($tmp_file, $target_file);
				}
				else
				{
					$data = [
						'title'=>$title,
       					'opening_txt'=>$opening,
       					'content'=>$content,
					];
				}
				redirect('articlelist/index');



			}
			public function delete($id)
			{
				//meminta model untuk menghapus data dengan id = $id
				$delete = $this->model->delete_data($this->table, ['id'=>$id]);

				//jika data berhasil dihapus, maka pengunjung diarahkan ke halaman show
				if($delete)
				{
					redirect('articlelist/index');
				}
			}
	}
?>