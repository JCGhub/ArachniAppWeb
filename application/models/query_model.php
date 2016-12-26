<?php
class query_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}


	// ***** FILE NAME QUERIES *************************************************************************************


	public function get_file_names(){
		$this->db->select('t1.id_cf, t1.name, t2.name as namewp, t3.name as namecat, t1.id_wp, t1.id_cat, t1.file_date');
		$this->db->from('conf_file as t1');
		$this->db->join('web_portal as t2', 't1.id_wp = t2.id_wp');
		$this->db->join('category as t3', 't1.id_cat = t3.id_cat');
		$this->db->order_by('t1.id_cf', 'ASC');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function get_file_queries($id_cf, $role, $id_user){
		$this->db->select('t1.id_query, t1.name, t1.id_cf, t2.name as namerole, t3.user_name as nameuser, t1.id_role, t1.id_user');
		$this->db->from('query as t1');
		$this->db->join('role as t2', 't1.id_role = t2.id_role');
		$this->db->join('user as t3', 't1.id_user = t3.id_user');

		switch($role){
			case "1": 	$where = "t1.id_cf=".$id_cf." AND t1.id_role='1'";
						$this->db->where($where);
						break;

			case "2":	$where = "t1.id_cf=".$id_cf." AND (t1.id_role='1' OR (t1.id_role='2' AND t1.id_user=".$id_user."))";
						$this->db->where($where);
						break;

			case "3":	$where = "t1.id_cf=".$id_cf." AND (t1.id_role='1' OR t1.id_role='2' OR t1.id_role='3')";
						$this->db->where($where);
						break;

			default:	$where = "t1.id_cf=".$id_cf." AND t1.id_role='1'";
						$this->db->where($where);
						break;
		}

		$this->db->order_by('t2.name', 'ASC');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return 0;
		}
	}

	public function get_user_queries($id_user, $i){
		$this->db->select('t1.id_query, t1.name, t2.name as namecf, t3.name as namerole');
		$this->db->from('query as t1');
		$this->db->join('conf_file as t2', 't1.id_cf = t2.id_cf');
		$this->db->join('role as t3', 't1.id_role = t3.id_role');
		$this->db->where('t1.id_user', $id_user);
		$query = $this->db->get();

		if($query->num_rows() > 0 && $i == 0){
			return $query->result();
		}
		else{
			if($query->num_rows() > 0 && $i == 1){
				return $query->num_rows();
			}
			else{
				return 0;
			}
		}
	}

	public function get_file_name_by_id($id){
		$this->db->where('id_cf', $id);
		$query = $this->db->get('conf_file');

		$row = $query->row();

		if (isset($row)){
	        return $row->name;
		}
	}

	public function get_string_info_by_file_name($id){
		$this->db->where('id_cf', $id);
		$query = $this->db->get('string_info');

		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return 0;
		}
	}

	public function get_string_info_by_file_query($q){
		$i = 0;
		$query = $this->db->query($q);

		$fields = $query->list_fields();
				
		foreach($fields as $f){
			$i++;
		}

		$array['fields'] = $fields;
		$array['nFields'] = $i;

		//echo $this->db->last_query();

		if($query->num_rows() > 0){
			$array['result'] = $query->result();

			return $array;
		}
		else{
			return 0;
		}
	}


	// ***** CATEGORY QUERIES *************************************************************************************


	public function get_file_names_by_cat($id){
		$this->db->select('t1.id_cf, t1.name, t2.name as namewp, t3.name as namecat, t1.id_wp, t1.id_cat, t1.file_date');
		$this->db->from('conf_file as t1');
		$this->db->join('web_portal as t2', 't1.id_wp = t2.id_wp');
		$this->db->join('category as t3', 't1.id_cat = t3.id_cat');
		$this->db->where('t1.id_cat', $id);
		$this->db->order_by('t1.id_cf', 'ASC');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
	}


	// ***** DATE QUERIES *************************************************************************************


	public function get_dates(){
		$this->db->distinct();
		$this->db->select('file_date');
		$query = $this->db->get('conf_file');

		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function get_file_names_by_date($dates){
		$this->db->select('t1.id_cf, t1.name, t2.name as namewp, t3.name as namecat, t1.id_wp, t1.id_cat, t1.file_date');
		$this->db->from('conf_file as t1');
		$this->db->join('web_portal as t2', 't1.id_wp = t2.id_wp');
		$this->db->join('category as t3', 't1.id_cat = t3.id_cat');

		foreach($dates as $var){
			$this->db->or_where("t1.file_date LIKE '%".$var."%'");
		}

		$this->db->order_by('t1.id_cf', 'ASC');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
	}


	// ***** WEB PORTAL QUERIES *************************************************************************************


	public function get_web_portals(){
		$this->db->select('*');
		$query = $this->db->get('web_portal');

		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function get_file_names_by_web_portal($id_wp){
		$this->db->select('t1.id_cf, t1.name, t2.name as namewp, t3.name as namecat, t1.id_wp, t1.id_cat, t1.file_date');
		$this->db->from('conf_file as t1');
		$this->db->join('web_portal as t2', 't1.id_wp = t2.id_wp');
		$this->db->join('category as t3', 't1.id_cat = t3.id_cat');
		$this->db->where('t1.id_wp', $id_wp);
		$this->db->order_by('t1.id_cf', 'ASC');
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
	}


	// ***** OTHER QUERIES *************************************************************************************


	public function get_roles($user_role){
		$this->db->select('id_role, name');
		$this->db->from('role');

		switch($user_role){
			case "2":	$where = "id_role='1' OR id_role='2'";
						$this->db->where($where);
						break;

			case "3":	$where = "id_role='1' OR id_role='3'";
						$this->db->where($where);
						break;

			default:	$where = "id_role='1'";
						$this->db->where($where);
						break;
		}

		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function get_query($id){
		$this->db->select('value');
		$this->db->from('query');
		$this->db->where('query.id_query', $id);
		$query = $this->db->get();

		$row = $query->row();

		if(isset($row)){
	        return $row->value;
		}
	}

	public function get_query_name($id){
		$this->db->select('name');
		$this->db->from('query');
		$this->db->where('query.id_query', $id);
		$query = $this->db->get();

		$row = $query->row();

		if(isset($row)){
	        return $row->name;
		}
	}

	public function get_query_view($id){
		$this->db->select('value');
		$this->db->from('query');
		$this->db->where('query.id_query', $id);
		$query = $this->db->get();

		$row = $query->row();

		if(isset($row)){
	        return $row->value;
		}
	}

	function exists_query_name($query_name, $id_cf){
        $this->db->select('id_query');
        $this->db->from('query');
        $this->db->where('id_cf', $id_cf);
        $this->db->where('name', $query_name);
        $this->db->limit(1);
         
        $query = $this->db->get();

        if($query->num_rows() == 1){
            return $query->result();
        }
        else{
            return false;
        }
    }

	public function check_query($q){
		$query = $this->db->query($q);

		//$numRows = $query->num_rows();

		if(!$query){
		    return false;
		}
		else{
			return true;
		}
	}

	public function new_query($id_cf, $name, $query, $role, $id_user){
		$data = array(
            'name' => $name,
            'id_cf' => $id_cf,
            'value' => $query,
            'id_role' => $role,
            'id_user' => $id_user
        );
        return $this->db->insert('query', $data);
	}

	public function get_file_id_by_query_id($id){
		$this->db->select('id_cf');
		$this->db->from('query');
		$this->db->where('query.id_query', $id);
		$query = $this->db->get();

		$row = $query->row();

		if(isset($row)){
	        return $row->id_cf;
		}
	}

	public function get_info_by_entity($entity, $date){
		$this->db->select('*');
		$this->db->from('string_info');
		$this->db->where('string_info.entity', $entity);
		$this->db->where("string_info.date LIKE '%".$date."%'");
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function get_file_name_by_entity($entity){
		$this->db->select('t2.name');
		$this->db->from('string_info as t1');
		$this->db->join('conf_file as t2', 't1.id_cf = t2.id_cf');
		$this->db->where('t1.entity', $entity);
		$query = $this->db->get();

		$row = $query->row();

		if(isset($row)){
	        return $row->name;
		}
	}

	public function get_info_user($id_user){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.id_user', $id_user);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->result();
		}
	}

	public function change_data($name, $surname, $id_user){
		$this->db->select('name, surname');
		$this->db->from('user');
		$this->db->where('user.id_user', $id_user);
		$query = $this->db->get();

		$row = $query->row();

		if(isset($row)){
	        $default_name = $row->name;
	        $default_surname = $row->surname;
		}

		$data = array(
               'name' => ($name != "") ? $name : $default_name,
               'surname' => ($surname != "") ? $surname : $default_surname
        	);

		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	public function change_pass($newpass, $id_user){
		$data = array(
               'password' => MD5($newpass)
        	);

		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}

	public function exist_pass($username, $password){
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
}