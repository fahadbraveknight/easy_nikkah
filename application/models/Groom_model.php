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
                    u.id,u.full_name,u.email,u.gender,u.age as user_birthday, TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(u.age), NOW()) as age,u.user_height,u.user_namaz_type, u.user_fasting_type,u.user_beard_type,u.user_marital_status ,q.qualification_name,p.profession_name,ct.city_name,st.state_name,ctry.country_name,u.user_work_location,u.user_native_location,u.user_children,u.profile_id,
                        u.user_brothers,u.user_married_brothers,u.user_sisters,u.user_married_sisters,u.user_father_name,u.user_father_profession,
                        u.user_mother_name,u.user_mother_profession
                from
                    users u
                left JOIN  qualifications q on q.qualification_id=u.user_qualification
                left JOIN  professions p on p.id=u.user_profession
                left JOIN  cities ct on ct.city_id=u.user_location_city
                left JOIN  states st on st.state_id=u.user_location_state
                left JOIN  countries ctry on ctry.country_id=u.user_location_country
                WHERE 
                    1=1
                AND 
                    u.gender = 'male'
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
}

?>