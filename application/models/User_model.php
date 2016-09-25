<?php

class User_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }


    function add_user($params)
    {
    	$add_data = array(	'full_name' => $params['full_name'],
    						'email' => $params['email'],
    						'password' => md5($params['password']),
    						'age' => $params['age'],
    						'gender' => $params['gender'],
    					);

    	$this->db->insert('users',$add_data);

    	return $this->db->insert_id();
    }

    function get_user_by_id($id)
    {

        return $this->db->get_where('users',array('id'=>$id))->row_array();
    }

    function get_marital_status_by_id($marital_status_id)
    {

        return $this->db->get_where('marital_status',array('id'=>$marital_status_id))->row_array();
    }
}

?>