<?php 
	class login extends CI_Controller
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
		public function process()
		{
			if (isset($_POST['submit'])) {
				
				$email = $this->input->post('email');
				$pass = $this->input->post('password');

				if ($email and $pass) {
					
					$data = [
						'email'=>$email,
						'password'=>$pass
					];

					$user_account = $this->model->get_data($this->table, $data)->row();

					if($user_account)
					{
						$session_data = [
							'email' => $user_account->email,
							'password' => $user_account->password,
							'id' => $user_account->id,
							'username' => $user_account->username,
							'level' => $user_account->level
						];
						$this->session->set_userdata($session_data);
						if ($_SESSION['level'] == "admin") {
							redirect('admin/create_article');
						}
						else{
							redirect('home');
						}
					}
					else
					{
						$this->session->set_flashdata('error', 'Email atau password tidak cocok');
						redirect('login/show');
					}
		
				}
				else
				{
					$this->session->set_flashdata('error', 'Seluruh data harus diisi');
					redirect('login/show');
				}
			}
		}
	}
 ?>
