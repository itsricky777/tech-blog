<?php 
	class userlist extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_admin','model');
			$this->table = 'user';
		}
		public function index()
		{
			$data['user'] = $this->model->get_all_data($this->table);
			$this->load->view('admin/admin-userlist', $data);
		}
		public function delete($id)
		{
			//meminta model untuk menghapus data dengan id = $id
			$delete = $this->model->delete_data($this->table, ['id'=>$id]);

			//jika data berhasil dihapus, maka pengunjung diarahkan ke halaman show
			if($delete)
			{
				redirect('userlist/index');
			}
		}
	}
?>