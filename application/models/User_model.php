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
                            'profile_id' => $params['profile_id']
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

    function get_user_contact_person($user_id)
    {
        return $this->db->get_where('user_has_contact_person',array('user_id'=>$user_id))->result_array();
    }

    function edit_user_contacts ($params)
    {
        return $this->db->update_batch('user_has_contact_person',$params,'id');
    }

    function add_user_contacts ($params)
    {
        return $this->db->insert_batch('user_has_contact_person',$params);
    }

    function edit_user_family ($params)
    {
        return $this->db->update_batch('user_has_family',$params,'id');
    }

    function add_user_family ($params)
    {
        return $this->db->insert_batch('user_has_family',$params);
    }

    function get_user_family($user_id)
    {
        return $this->db->get_where('user_has_family',array('user_id'=>$user_id))->result_array();
    }

    function add_user_partner_marital_status ($id,$params)
    {
        $this->db->delete('user_has_partner_marital_statuses', array('user_id' => $id));
        return $this->db->insert_batch('user_has_partner_marital_statuses',$params);
    }

    function get_user_partner_marital_status ($id)
    {
        return $this->db->get_where('user_has_partner_marital_statuses',array('user_id'=>$id))->result_array();
    }
}

?>