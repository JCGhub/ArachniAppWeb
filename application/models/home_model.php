<?php
class home_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function new_user($username, $email, $password, $name, $surname){
       $data = array(
            'user_name' => $username,
            'password' => md5($password),
            'email' => $email,
            'name' => $name,
            'surname' => $surname,
            'id_role' => '1'
        );
        return $this->db->insert('user', $data);	
    }

    function signin($username, $password){
        $this->db->select('id_user, user_name, password, id_role');
        $this->db->from('user');
        $this->db->where('user_name', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
         
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->result();
        }
        else{
            return false;
        }
    }

    function signup_exist_user($username){
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->where('user_name', $username);
        $this->db->limit(1);
         
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->result();
        }
        else{
            return false;
        }
    }

    function signup_exist_email($email){
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->where('email', $email);
        $this->db->limit(1);
         
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->result();
        }
        else{
            return false;
        }
    }
}