<?php

class Proposal_model extends CI_Model {

    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }

    function get_user_relationships($id,$having_status=array(),$switch = 0){
        
        $status_condition= '';
        $switch_condition= '';
        if(!empty($having_status))
        {
            $status_condition= ' AND ur.status IN ("'.implode('", "',$having_status).'")';
        }
        if($switch == 1)
        {
            $switch_condition = ' AND ur.to_id ='.$id;
        }
        elseif($switch == 2){

            $switch_condition = ' AND ur.from_id ='.$id;
        }
        $sql = "SELECT u.id, u.profile_id ,u.full_name,q.qualification_name,p.profession_name,TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(u.age), NOW()) as age,u.user_height,u.user_marital_status,u.gender,ur.status
                FROM 
                    users u 
                LEFT JOIN 
                    user_relationships ur on(ur.from_id = u.id || ur.to_id = u.id)
                left JOIN  qualifications q on q.qualification_id=u.user_qualification
                left JOIN  professions p on p.id=u.user_profession
                WHERE
                    1=1
                AND
                    (ur.from_id = ".$id." || ur.to_id = ".$id.")
                    $status_condition
                    $switch_condition
                AND
                    u.id !=".$id."
                GROUP BY u.id ";
         return $this->db->query($sql)->result_array();
        // echo $this->db->last_query();exit;
    }

    function get_relationship($from_id , $to_id){
        $sql = " SELECT * FROM  user_relationships 
                WHERE (from_id=".$from_id." AND to_id = ".$to_id.") || (to_id=".$from_id." AND from_id = ".$to_id.") ";

        return $this->db->query($sql)->row_array();
    }

    function add_relationship($from_id , $to_id)
    {
        $add_data = array(  'from_id' => $from_id,
                            'to_id' => $to_id,
                            'status' => 'awaiting_response'
                        );

        return  $this->db->insert('user_relationships',$add_data); 
    }

    function edit_relationship($from_id , $to_id ,$new_status)
    {
        $edit_data = array(
                            'status' => $new_status
                        );

        $this->db->group_start()->where(array('from_id' =>  $from_id , 'to_id' => $to_id ))->group_end();
        $this->db->or_group_start()->where(array('to_id' =>  $from_id , 'from_id' => $to_id ))->group_end();
        
        return $this->db->update('user_relationships',$edit_data);
        // echo $this->db->last_query(); exit;
    }

    function delete_relationship($from_id , $to_id )
    {
        $this->db->group_start()->where(array('from_id' =>  $from_id , 'to_id' => $to_id ))->group_end();
        $this->db->or_group_start()->where(array('to_id' =>  $from_id , 'from_id' => $to_id ))->group_end();
        return $this->db->delete('user_relationships');
    }

    function get_status_notification($id,$status)
    {
        if($status =='accepted'){
            $data_id = 'from_id';
        }
        else{
            $data_id = 'to_id';
        }
        $this->db->where(array($data_id => $id,'has_seen' => 0, 'status'=> $status ));
        return $this->db->get('user_relationships')->num_rows();
        
    }

    function get_update_seen($id)
    {
        $this->db->where(array('from_id' => $id, 'status'=> 'acceped' ));
        $this->db->update('user_relationships',array('has_seen'=>1));

        $this->db->where(array('to_id' => $id, 'status'=> 'awaiting_response' ));
        $this->db->update('user_relationships',array('has_seen'=>1));
        
    }
}

?>