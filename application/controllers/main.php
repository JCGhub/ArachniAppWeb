<?php
class main extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model("main_model","qM");
		$this->load->model("home_model","hM");
	}

	public function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];

			$data["active"] = "";
			$data["title"] = "Introduction";

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/intro");
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function about(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];

			$data["active"] = "";
			$data["title"] = "About Us";

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/about");
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}


	// ***** QUERY FUNCTIONS *****************************************************************************************


	public function file_queries($id_cf){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $role = $session_data['role'];
		    $data['role'] = $role;
		    $id_user = $session_data['id_user'];
		    $data['id_user'] = $id_user;

			$data["active"] = "in";
			$data["title"] = "File Name Queries";
			$data["name_file"] = $this->qM->get_file_name_by_id($id_cf);			
			$data["id_cf"] = $id_cf;
					
			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			if($this->qM->get_file_queries($id_cf, $role, $id_user) == 0){
				$this->load->view("main/file_queries_empty", $data);
			}
			else{
				$data["file_queries"] = $this->qM->get_file_queries($id_cf, $role, $id_user);
				$this->load->view("main/file_queries", $data);
			}
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function query_form($id){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $role = $session_data['role'];
		    $data['role'] = $role;

		    if($role != "1"){
		    	$data["active"] = "";
				$data["title"] = "Create query";
				$data["id_cf"] = $id;
				$data["name_file"] = $this->qM->get_file_name_by_id($id);
				$data["roles"] = $this->qM->get_roles($role);

				$this->load->view("theme/menu", $data);
				$this->load->view("theme/header", $data);
				$this->load->view("main/query_form", $data);
				$this->load->view("theme/footer");
		    }
		    else{
				header('Location: //localhost/ArachniApp/home');
		    }			
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function query_form_val($id){
		if(($this->session->userdata('logged_in'))){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $id_user = $session_data['id_user'];
		    $userRole = $session_data['role'];

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean|callback_check_database_query_name['.$id.']',
			array('required' => 'You must provide a SQL name.'));
			$this->form_validation->set_rules('role', 'Role', 'required|trim|xss_clean',
			array('required' => 'You must provide a query role.'));
			$this->form_validation->set_rules('select', 'Select', 'required|trim|xss_clean|callback_select_invalid_characters',
			array('required' => 'You must provide one or more fields to select.'));
			$this->form_validation->set_rules('alias1', 'Alias1', 'trim|xss_clean|callback_alias_invalid_characters');
			$this->form_validation->set_rules('alias2', 'Alias2', 'trim|xss_clean|callback_alias_invalid_characters');
			$this->form_validation->set_rules('alias3', 'Alias3', 'trim|xss_clean|callback_alias_invalid_characters');
			$this->form_validation->set_rules('alias4', 'Alias4', 'trim|xss_clean|callback_alias_invalid_characters');
			$this->form_validation->set_rules('on', 'On', 'trim|xss_clean|callback_clause_invalid_characters');
			$this->form_validation->set_rules('where', 'Where', 'trim|xss_clean|callback_clause_invalid_characters');

			if($this->form_validation->run() == FALSE){
				$this->query_form($id);
			}
			else{
				$name = $this->input->post('name');
				$queryRole = $this->input->post('role');
				$select = $this->input->post('select');
				$alias1 = $this->input->post('alias1');
				$alias2 = $this->input->post('alias2');
				$alias3 = $this->input->post('alias3');
				$alias4 = $this->input->post('alias4');
				$on = $this->input->post('on');
				$where = $this->input->post('where');

				$from = " FROM";

				if($alias1 != null){
					$f1 = " string_info AS ".$alias1;
					$from = $from.$f1;
				}
				if($alias2 != null){
					$f2 = " JOIN string_info AS ".$alias2;
					$from = $from.$f2;
				}
				if($alias3 != null){
					$f3 = " JOIN string_info AS ".$alias3;
					$from = $from.$f3;
				}
				if($alias4 != null){
					$f4 = " JOIN string_info AS ".$alias4;
					$from = $from.$f4;
				}

				if($alias1 == null && $alias2 == null && $alias3 == null && $alias4 == null){
					$from = $from." string_info";
				}

				$query = "SELECT ".$select.$from;

				if($alias1 != null || $alias2 != null || $alias3 != null || $alias4 != null){
					$query = $query." ON ".$on;

					if($where != null){
						$queryPart = " and ".$alias1.".id_cf=".$id;
					}
					else{
						$queryPart = " WHERE ".$alias1.".id_cf=".$id;
					}
				}
				else{
					if($where != null){
						$queryPart = " and id_cf=".$id;
					}
					else{
						$queryPart = " WHERE id_cf=".$id;
					}
				}

				if($where != null){
					$queryFinal = $query." WHERE ".$where.$queryPart.";";
				}
				else{
					$queryFinal = $query.$queryPart.";";
				}



				if($this->query_validator($queryFinal)){
					$this->qM->new_query($id, $name, $queryFinal, $queryRole, $id_user);

					//echo $queryFinal;
					//echo $role." ".$id_user;

					header('Location:  //localhost/ArachniApp/main/file_queries/'.$id);
				}
				else{
					//echo "Error";
					//Crear vista que lleve a query_form_error * CORRECCION FUTURA

					$this->query_form($id);
				}
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	function check_database_query_name($query_name, $id_cf){
		if(($this->session->userdata('logged_in'))){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];

			if($this->qM->exists_query_name($query_name, $id_cf)){
				$this->form_validation->set_message('check_database_query_name', 'This query name already exists for this configuration file');
				return false;
			}
			else{
				return TRUE;
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function query_validator($query){
		if(($this->session->userdata('logged_in'))){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];

			if($this->qM->check_query($query)){
				return true;
			}
			else{
				$this->form_validation->set_message('query_invalid_characters', 'Invalid or empty query.');
				return false;
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function select_invalid_characters($clause){
		if(($this->session->userdata('logged_in'))){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];

			if(preg_match('/(\;)/', $clause) || preg_match('/(id_cf)/', $clause) || preg_match('/(id_cat)/', $clause) || preg_match('/(id_wp)/', $clause) || preg_match('/(id_str)/', $clause) || preg_match('/([0-9])/', $clause)){
				$this->form_validation->set_message('select_invalid_characters', 'Invalid select characters.');
				return false;
			}
			else{
				return true;
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function clause_invalid_characters($clause){
		if(($this->session->userdata('logged_in'))){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];

			if(preg_match('/(\;)/', $clause) || preg_match('/(id_cf)/', $clause) || preg_match('/(id_cat)/', $clause) || preg_match('/(id_wp)/', $clause) || preg_match('/(id_str)/', $clause)){
				$this->form_validation->set_message('clause_invalid_characters', 'Invalid clause characters.');
				return false;
			}
			else{
				return true;
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function alias_invalid_characters($alias){
		if(($this->session->userdata('logged_in'))){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];

		    if(preg_match('/(\;)/', $alias)){
				$this->form_validation->set_message('alias_invalid_characters', 'Invalid characters.');
				return false;
			}
			else{
				return true;
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function query_view($id_query){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $role = $session_data['role'];
		    $data['role'] = $role;
		    $id_user = $session_data['id_user'];

			$data["active"] = "in";
			$data["title"] = "View query";
			$data["query_name"] = $this->qM->get_query_name($id_query);	
			$data["query_view"] = $this->qM->get_query_view($id_query);
					
			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/query_view", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function delete_query($id_query){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $role = $session_data['role'];
		    $data['role'] = $role;
		    $id_user = $session_data['id_user'];

			$data["active"] = "in";
			$data["title"] = "Delete Queries";
			$id_cf = $this->qM->get_file_id_by_query_id($id_query);
			$this->qM->delete_query($id_query, $id_user);
					
			header('Location: //localhost/ArachniApp/main/file_queries/'.$id_cf);
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function delete_user_query($id_query){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $role = $session_data['role'];
		    $data['role'] = $role;
		    $id_user = $session_data['id_user'];

			$data["active"] = "in";
			$data["title"] = "Delete User Query";
			$id_cf = $this->qM->get_file_id_by_query_id($id_query);
			$this->qM->delete_query($id_query, $id_user);
					
			header('Location: //localhost/ArachniApp/main/user_queries');
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}


	// ***** FILE NAME FUNCTIONS *************************************************************************************
 

	public function file_name(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];

			$data["active"] = "fn";
			$data["title"] = "File Name List";
			$data["cf_names"] = $this->qM->get_file_names();
					
			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/file_name", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}	

	public function file_name_row($id){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];

			$data["active"] = "in";
			$data["title"] = "Query Results";
			$id_cf = $this->qM->get_file_id_by_query_id($id);
			$data["name_file"] = $this->qM->get_file_name_by_id($id_cf);
			$query = $this->qM->get_query($id);
			$data["name_query"] = $this->qM->get_query_name($id);

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);

			if($this->qM->get_string_info_by_file_query($query)['result'] == 0){
				$this->load->view("main/file_name_info_empty", $data);
			}
			else{
				$resultArray = $this->qM->get_string_info_by_file_query($query);

				//$nFields = $resultArray['nFields'];
				$result = $resultArray['result'];
				$fields = $resultArray['fields'];

				//$data["nFields"] = $nFields;
				$data["result"] = $result;
				$data["fields"] = $fields;

				$this->load->view("main/file_name_info", $data);
			}
			
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}


	// ***** CATEGORY FUNCTIONS *************************************************************************************


	public function category_list(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];
			
			$data["active"] = "ca";
			$data["title"] = "Category List";

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/category_list", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function category($id = null){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];

			$data["active"] = "ca";
			$data["title"] = "Category Files List";

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);

			if($id != null){
				$data["cat_name"] = $this->qM->get_category_name_by_id($id);

				if($this->qM->get_file_names_by_cat($id) == 0){
					$this->load->view("main/category_empty", $data);				
				}
				else{
					$data["cf_names"] = $this->qM->get_file_names_by_cat($id);
	    			$this->load->view("main/category", $data);
				}
	    	}
	   		else{
	    		header('Location: //localhost/ArachniApp/main/category_list');
	    	}
			
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}


	// ***** DATE FUNCTIONS *************************************************************************************

	public function date_list(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];
			
			$data["active"] = "da";
			$data["title"] = "Date List";
			$data["dates"] = $this->qM->get_dates();

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/date_list", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function date($id = null){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];

		    $data["active"] = "da";
			$data["title"] = "Date Files List";

		    if(isset($_GET['selectDate'])){
		    	foreach($_GET['selectDate'] as $selectedOption){
    				$dates[] = $selectedOption;
		    	}
		    	
		    	$data["cf_names"] = $this->qM->get_file_names_by_date($dates);
		    }
		    else{
		    	if($id != null){
		    		$dates[] = $id;
		    		$data["cf_names"] = $this->qM->get_file_names_by_date($dates);
		    	}
		    	else{
		    		header('Location: //localhost/ArachniApp/main/date_list');
		    	}
		    }

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/date", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}


	// ***** WEB PORTAL FUNCTIONS *************************************************************************************


	public function web_portal_list(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];
			
			$data["active"] = "wp";
			$data["title"] = "Web Portal List";
			$data["portals"] = $this->qM->get_web_portals();

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/web_portal_list", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function web_portal($id = null){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];

		    $data["active"] = "wp";
			$data["title"] = "Web Portal Files List";

		    if(isset($_GET['selectWebPortal'])){
		    	$id_wp = $_GET['selectWebPortal'];

		    	$data["wp_name"] = $this->qM->get_web_portal_name_by_id($id_wp);
		    	$data["cf_names"] = $this->qM->get_file_names_by_web_portal($id_wp);
		    }
		    else{
		    	if($id != null){
		    		$data["wp_name"] = $this->qM->get_web_portal_name_by_id($id);
		    		$data["cf_names"] = $this->qM->get_file_names_by_web_portal($id);
		    	}
		    	else{
		    		header('Location: //localhost/ArachniApp/main/web_portal_list');
		    	}
		    }

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/web_portal", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}


	// ***** WEB PORTAL FUNCTIONS *************************************************************************************


	public function info_detail(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $data['role'] = $session_data['role'];

		    if(($this->uri->segment(3) != null) && ($this->uri->segment(4) != null)){
		    	$entity =  $this->uri->segment(3);
	  			$date =  $this->uri->segment(4);

	  			$newDate = str_replace("%20", " ", $date);
				
				$data["active"] = "in";
				$data["title"] = "Detailed Information";
				$data["info"] = $this->qM->get_info_by_entity($entity, $newDate);
				$data["id_cf"] = $this->qM->get_file_name_by_entity($entity);
				$data["entity"] = $entity;

				$this->load->view("theme/menu", $data);
				$this->load->view("theme/header", $data);
				$this->load->view("main/info_detail", $data);
				$this->load->view("theme/footer");
		    }
		    else{
		    	header('Location: //localhost/ArachniApp/main');
		    }		    
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}


	// ***** WEB PORTAL FUNCTIONS *************************************************************************************


	public function profile(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $id_user = $session_data['id_user'];
		    $data['id_user'] = $id_user;
		    $data['role'] = $session_data['role'];
				
			$data["active"] = "in";
			$data["title"] = "User profile";
			$data["info_user"] = $this->qM->get_info_user($id_user);
			$data["num_queries"] = $this->qM->get_user_queries($id_user, 1);

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/profile", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function profile_data_val(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $id_user = $session_data['id_user'];
		    $userRole = $session_data['role'];
		    $data['role'] = $userRole;

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean');
			$this->form_validation->set_rules('surname', 'Surname', 'trim|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database_pass',
			array('required' => 'You must provide a %s.'));

			if($this->form_validation->run() == FALSE){
				$this->profile();
			}
			else{
				$name = $this->input->post('name');
				$surname = $this->input->post('surname');

				$this->qM->change_data($name, $surname, $id_user);

				$message = "SUCCESS: Your data profile has been changed!";
				echo "<script type='text/javascript'>alert('$message');</script>";

				$this->profile();
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function check_database_pass($password){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$result = $this->qM->exist_pass($username, $password);

			if($result){
				return TRUE;
			}
			else{
				$this->form_validation->set_message('check_database_pass', 'Invalid password.');
				return false;
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function profile_pass_val(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $id_user = $session_data['id_user'];
		    $userRole = $session_data['role'];

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');

			$this->form_validation->set_rules('oldpass', 'Oldpass', 'trim|required|xss_clean|callback_check_database_pass',
			array('required' => 'You must provide the old password.'));
			$this->form_validation->set_rules('newpass1', 'Newpass1', 'required|min_length[6]|trim|xss_clean',
			array('required' => 'You must provide the new password.'));
			$this->form_validation->set_rules('newpass2', 'Newpass2', 'required|min_length[6]|trim|xss_clean|callback_check_confirm_pass',
			array('required' => 'You must confirm the new password.'));

			if($this->form_validation->run() == FALSE){
				$this->profile();
			}
			else{
				$newpass = $this->input->post('newpass1');

				$this->qM->change_pass($newpass, $id_user);

				$message = "SUCCESS: Your password has been changed!";
				echo "<script type='text/javascript'>alert('$message');</script>";

				$this->profile();
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function check_confirm_pass($newpass2){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');

			$newpass1 = $this->input->post('newpass1');
			
			if($newpass1 == $newpass2){
				return true;
			}
			else{
				$this->form_validation->set_message('check_confirm_pass', 'The new passwords are different.');
				return false;
			}
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}

	public function user_queries(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
		    $data['username'] = $session_data['username'];
		    $role = $session_data['role'];
		    $data['role'] = $role;
		    $id_user = $session_data['id_user'];
				
			$data["active"] = "in";
			$data["title"] = "User queries";
			$data["user_queries"] = $this->qM->get_user_queries($id_user, 0);

			$this->load->view("theme/menu", $data);
			$this->load->view("theme/header", $data);
			$this->load->view("main/user_queries", $data);
			$this->load->view("theme/footer");
		}
		else{
			header('Location: //localhost/ArachniApp/home');
		}
	}
}