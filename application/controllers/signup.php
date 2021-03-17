<?php 
	class signup extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_access','model');
			$this->table = 'user';
		}
		public function index()
		{
			$this->load->view('login-signup');

		}
		public function save()
		{
			if (isset($_POST['submit'])) {
				
				$email = $this->input->post('email');
				$usr = $this->input->post('username');
				$pass = $this->input->post('password');
				$level = "user";

				if ($email and $usr and $pass) {
					if (strlen($pass) > 6) {
						
						$data = [
							'email'=>$email,
							'username'=>$usr,
							'password'=>$pass,
							'level'=>$level
						];

						$this->model->insert_data($this->table, $data);

					}
				}

				redirect('signup');
			}
		}
	}
 ?>