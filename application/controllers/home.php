<?php
class home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("home_model","hM");	
	}

	// FUNCIONES PARA EL SIGN IN ******************************************************************

	public function index(){
		if(!($this->session->userdata('logged_in'))){
			$data["title"] = "Sign in";

			$this->load->view("theme/header_home", $data);
			$this->load->view("home/signin");
			$this->load->view("theme/footer_home");
		}
		else{
			header("Location: ".base_url()."query");
		}
	}

	public function signin_val(){
		if(!($this->session->userdata('logged_in'))){
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean',
			array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database_signin',
			array('required' => 'You must provide a %s.'));

			if($this->form_validation->run() == FALSE){
				$this->index();
			}
			else{
				$this->logged();
			}
		}
		else{
			header("Location: ".base_url()."query");
		}
	}

	function check_database_signin($password){
		if(!($this->session->userdata('logged_in'))){
			$username = $this->input->post('username');
			$result = $this->hM->signin($username, $password);

			if($result){
				$sess_array = array();

				foreach($result as $row){
					$sess_array = array(
					'id_user' => $row->id_user,
					'username' => $row->user_name,
					'role' => $row->id_role
					);

					$this->session->set_userdata('logged_in', $sess_array);
				}
				return TRUE;
			}
			else{
				$this->form_validation->set_message('check_database_signin', 'Invalid username or password');
				return false;
			}
		}
		else{
			header("Location: ".base_url()."query");
		}
	}

	// FUNCIONES PARA EL SIGN UP ******************************************************************

	public function signup(){
		if(!($this->session->userdata('logged_in'))){
			$data["title"] = "Sign up";

			$this->load->view("theme/header_home", $data);
			$this->load->view("home/signup");
			$this->load->view("theme/footer_home");
		}
		else{
			header("Location: ".base_url()."query");
		}
	}

	public function signup_val(){
		if(!($this->session->userdata('logged_in'))){
			$this->load->library('email');
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|trim|xss_clean|callback_check_database_signup_user',
			array('required' => 'You must provide a %s.',
			'min_length' => '%s too short, it must contains 4 characters or more.'));
			$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean',
			array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('surname', 'Surname', 'required|trim|xss_clean',
			array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean|callback_check_database_signup_email',
			array('required' => 'You must provide a %s.',
			'valid_email' => 'Invalid email format'));
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|trim|xss_clean',
			array('required' => 'You must provide a %s.',
			'min_length' => '%s too short, it must contains 6 characters or more.'));

			if($this->form_validation->run() == FALSE){
				$this->signup();
			}
			else{
				$username = $this->input->post('username');
				$name = $this->input->post('name');
				$surname = $this->input->post('surname');
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$this->hM->new_user($username, $email, $password, $name, $surname);

				/*$this->email->from('noreply@arachniapp.com');
				$this->email->to($email);
				$this->email->subject('Welcome to ArachniApp, '. $username);
				$this->email->message('<h2>Thank you for joining our community. You will soon know what this application is capable of.</h2><hr><br><br>
				Your username is: ' . $username . '.<br>, and your password is: ' . $password);
				$this->email->send();*/

				header('Location:  index.php');
			}
		}
		else{
			header("Location: ".base_url()."query");
		}
	}

	function check_database_signup_user($username){
		if(!($this->session->userdata('logged_in'))){
			$result = $this->hM->signup_exist_user($username);

			if($result){
				$this->form_validation->set_message('check_database_signup_user', 'This username already exists');
				return false;
			}
			else{
				return TRUE;
			}
		}
		else{
			header("Location: ".base_url()."query");
		}
	}

	function check_database_signup_email($email){
		if(!($this->session->userdata('logged_in'))){
			$result = $this->hM->signup_exist_email($email);

			if($result){
				$this->form_validation->set_message('check_database_signup_email', 'This email already exists');
				return false;
			}
			else{
				return TRUE;
			}
		}
		else{
			header("Location: ".base_url()."query");
		}
	}

	// FUNCIONES PARA LA SESIÓN ***********************************************************

	function logged(){
		if($this->session->userdata('logged_in')){
			header("Location: ".base_url()."query");
		}
		else{
			$this->index();
		}
	}

	function logout(){
		if($this->session->userdata('logged_in')){
			$this->session->unset_userdata('logged_in');
			session_destroy();
			$this->index();
		}
		else{
			$this->index();
		}
	}
}