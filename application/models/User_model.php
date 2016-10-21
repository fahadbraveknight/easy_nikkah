<?php

class User_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }


    function login($email,$password)
    {
        $user = $this->db->get_where('users',array('email'=>$email , 'password' =>md5($password)))->row_array();

        if(!empty($user))
        {
            if($user['email_verification_status'] == 1){
                $response['rc'] = TRUE;
                $response['user_height'] = $user['user_height'];
                $response['id'] = $user['id'];
                $this->session->set_userdata('userid',$user['id']);
                if($user['gender'] == 'male'){
                    $user_detail = 'groom';
                }
                elseif($user['gender'] == 'female')
                {
                    $user_detail = 'bride';
                }
                $this->session->set_userdata('user_detail',$user_detail);
            }
            else
            {       
                $response['rc'] = FALSE;
                $response['error'] = "Not a Verified User.";
            }
        }
        else
        {
            $response['rc'] = FALSE;
            $response['error'] = "Invalid Credentials.";
        }

        return $response;
    }

    function add_user($params)
    {
    	$add_data = array(	'full_name' => $params['full_name'],
    						'email' => $params['email'],
    						'password' => md5($params['password']),
    						'age' => $params['age'],
    						'gender' => $params['gender'],
                            'profile_id' => $params['profile_id'],
                            'verification_id' => $params['verification_id']
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
      
    function delete_user_family ($id)
    {
        return $this->db->delete('user_has_family',$id);
    }  

    function delete_user_contact_person ($id)
    {
        return $this->db->delete('user_has_contact_person',$id);
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

    function get_users_by_params($params)
    {
        $gender_condition = "";
        $age_condition = "";
        $marital_status_condition = "";
        $qualification_condition = "";
        $location_condition = "";
        $location_order_by = "";

        if(!empty($params['age']))
        {
            $age_condition = " AND TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(u.age), NOW()) IN (".implode(",",$params['age']).")";
        }

        if(!empty($params['gender']))
        {
            $gender_condition = " AND u.gender ='".$params['gender']."'";
        }

        if(!empty($params['marital_status']))
        {
            $marital_status_condition = " AND u.user_marital_status='".$params['marital_status']."'";
        }
        if(!empty($params['qualification']))
        {
            $qualification_condition = " AND u.user_qualification=".$params['qualification'];
        }

        if(!empty($params['location_country']))
        {
            $location_condition = " AND u.user_location_country=".$params['location_country'];

            if(!empty($params['location_state']) && !empty($params['location_city']))
            {
                $location_condition .= " AND u.user_location_state= ".$params['location_state']." AND u.user_location_city= ".$params['location_city'];
            }
        }

        $sql = "SELECT 
                    u.id,u.profile_id,u.user_personal_description,u.full_name,u.email,u.gender,u.age as user_birthday, TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(u.age), NOW()) as age,u.user_height,ms.marital_status_name as marital_status ,q.qualification_name,p.profession_name,ct.city_name,st.state_name,ctry.country_name,u.user_work_location,u.user_native_location,u.user_partner_current_location,u.user_partner_native_location
                from
                    users u
                left JOIN  qualifications q on q.qualification_id=u.user_qualification
                left JOIN  professions p on p.id=u.user_profession
                left JOIN  cities ct on ct.city_id=u.user_location_city
                left JOIN  states st on st.state_id=u.user_location_state
                left JOIN  countries ctry on ctry.country_id=u.user_location_country
                WHERE 
                    1=1
                $age_condition
                $marital_status_condition
                $gender_condition
                $qualification_condition
                $location_condition

                GROUP BY u.id
                ";
        return $this->db->query($sql)->result_array();
    }

    //for getting all details of user.
    function get_user_details($id)
    {
       return $this->db->where('verification_id',$id)->get('users')->row();
    }

    //for email_verification_status changing.
    function change_email_status($id)
    {
        $data = array(
            'email_verification_status' => 1
            );
        return $this->db->where('verification_id',$id)->update('users',$data);
    }
}

?>