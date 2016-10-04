<?php

class Groom_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    function get_groom_by_id($id = 0)
    {

        return $this->db->get_where('users',array('id'=>$id , 'gender'=>'male'))->row_array();
    }

    function get_groom($id=0)
    {

        $sql = "SELECT 
                    u.id,u.user_personal_description,u.full_name,u.email,u.gender,u.age as user_birthday, TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(u.age), NOW()) as age,u.user_height,bt.beard_type_name,nt.namaz_type_name,ft.fasting_type_name,ms.marital_status_name as marital_status ,q.qualification_name,p.profession_name,ag.age_group,ct.city_name,st.state_name,ctry.country_name,u.user_work_location,u.user_native_location,u.user_partner_current_location,u.user_partner_native_location,u.user_children_status, GROUP_CONCAT(uhpms.user_partner_marital_status) as partner_marital_statuses,u.profile_id
                from
                    users u
                left JOIN  beard_types bt on bt.id=u.user_beard_type
                left JOIN  namaz_types nt on nt.id=u.user_namaz_type
                left JOIN  fasting_types ft on ft.id=u.user_fasting_type
                left JOIN  marital_status ms on ms.id=u.user_marital_status
                left JOIN  qualifications q on q.id=u.user_qualification
                left JOIN  professions p on p.id=u.user_profession
                left JOIN  age_groups ag on ag.id=u.user_partner_age_group
                left JOIN  cities ct on ct.id=u.user_location_city
                left JOIN  states st on st.id=u.user_location_state
                left JOIN  countries ctry on ctry.id=u.user_location_country
                left JOIN  user_has_partner_marital_statuses uhpms on uhpms.user_id=u.id
                WHERE 
                    1=1
                AND 
                    u.id=$id";
                    // pr($sql);
        return $this->db->query($sql)->row_array();
    }

    function edit_groom($id = 0,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('users',$params);
        
    }

    function get_groom_traits()
    {
        $response = array();
        $response['namaz_types'] = $this->db->get('namaz_types')->result_array();
        $response['beard_types'] = $this->db->get('beard_types')->result_array();
        $response['fasting_types'] = $this->db->get('fasting_types')->result_array();
        $response['marital_status'] = $this->db->get('marital_status')->result_array();
        $response['age_groups'] = $this->db->get('age_groups')->result_array();
        return $response;        
    }
}

?>