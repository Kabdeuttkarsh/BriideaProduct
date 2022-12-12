<?php
class Crud_model extends CI_Model
{


    public function loadUsersForChat(){
    $user_id=$this->session->userdata('id');
    $outPutArray = array();
    $ids=array();
     
    $sql = $this->db->query("SELECT MAX(message_id) as message_id FROM (SELECT * FROM messages ORDER BY message_id DESC) AS messages WHERE $user_id in (sender_message_id, receiver_message_id) GROUP BY receiver_message_id ORDER BY message_id DESC");

    $array=$sql->result();

        foreach ($array as $key => $value) {
        
            $value->sender_info=NULL;
            $value->receiver_info=NULL;


            $sql_last_mes_row = $this->db->query("SELECT * FROM messages WHERE message_id=$value->message_id AND is_deleted=0");
            $message_info=$sql_last_mes_row->row();
     
            $value->message_id=$message_info->message_id;
            $value->message=$message_info->message;
            $value->message_time=$message_info->message_time; 
            $value->is_seen=$message_info->is_seen; 
            $value->is_deleted=$message_info->is_deleted; 
            $value->is_delivered=$message_info->is_delivered; 
            $value->is_sent=$message_info->is_sent; 
            $value->sender_message_id=$message_info->sender_message_id; 
            $value->receiver_message_id=$message_info->receiver_message_id; 

                $sql_sender_row = $this->db->query("SELECT id,company_id,username,firstname,lastname,is_online FROM users WHERE id=$value->sender_message_id");
                $sender_info=$sql_sender_row->row();
                
                $sql_receiver_row = $this->db->query("SELECT id,company_id,username,firstname,lastname,is_online FROM users WHERE id=$value->receiver_message_id");

                $receiver_info=$sql_receiver_row->row();

                if($value->sender_message_id!=$user_id){

                    $value->id=$value->sender_message_id;
                    $value->firstname=$sender_info->firstname;
                    $value->lastname=$sender_info->lastname;
                    $value->is_online=$sender_info->is_online;
                    $value->company_id=$sender_info->company_id;

                }
                else{

                    $value->id=$value->receiver_message_id;
                    $value->firstname=$receiver_info->firstname;
                    $value->lastname=$receiver_info->lastname;
                    $value->company_id=$receiver_info->company_id;
                }

                if(!in_array($value->id,$ids)){
                    $outPutArray[]=$value;
                    array_push($ids,$value->id);

                }


            $sql_count_unseen_msg = $this->db->query("SELECT count(*) AS unseen_msgs FROM messages WHERE receiver_message_id=$user_id AND sender_message_id=$value->id AND is_deleted=0 AND is_delivered=1 AND is_seen=0");

            $count_unseenmessage_info=$sql_count_unseen_msg->row();
           
            if($count_unseenmessage_info){
                $value->count_unseenmessage_info=$count_unseenmessage_info->unseen_msgs;
            }else{
                $value->count_unseenmessage_info=0;
            }

            $sql_company_info = $this->db->query("SELECT * FROM company WHERE id= $value->company_id");

            $company_info=$sql_company_info->row();

            if($company_info){
                $value->company_name=$company_info->company_name;
                $value->address=$company_info->address;
            }

            $sql_designation_info = $this->db->query("SELECT user_group.*,designations.id,designations.designation_name FROM user_group JOIN designations ON designations.id = user_group.group_id WHERE user_id= $value->id ");

            $designation_info=$sql_designation_info->row();

            if($designation_info){
                $value->designation_name=$designation_info->designation_name;
               
            }

        
        }

        return $outPutArray;
   
    }

     public function loadGroupsForChat(){
        $user_id=$this->session->userdata('id');
        $outPutArray = array();
        $sql = $this->db->query("SELECT a.group_id,a.chat_group_name, t.group_messages_id, MAX(t.group_messages_id) AS group_messages_id 
            FROM chat_groups AS a INNER JOIN group_messages AS t 
            ON t.group_id = a.group_id 
            GROUP BY a.group_id, t.group_id
            ORDER BY MAX(t.group_messages_id) DESC "); 
        $array=$sql->result();
   
        foreach ($array as $key => $value) {
            $value->unseen_msgs=0;
            $con['conditions']=array(
                'is_active' => 1,
                'is_deleted' => 0,
                'group_id' =>$value->group_id,
                'user_id'=>$user_id
            );
            if($users_row=$this->Crud_model->getRows('group_user_mapping',$con,'row')){
                    $outPutArray[]=$value;
            }
            // code...
            
            $conCheck['conditions']=array(
                'is_active' => 1,
                'is_deleted' => 0,
                'group_id' =>$value->group_id,
               // 'group_message_sender_id!='=>$user_id
            );
            
            if($grpMsg=$this->Crud_model->getRows('group_messages',$conCheck,'result')){
                $unseen_count=0;

                foreach ($grpMsg as $grpMsgkey => $grpMsgvalue) {

                    $seen_by=json_decode($grpMsgvalue->seen_by);
                    foreach($seen_by as $seen_by_row => $seen_by_val){

                        if($seen_by_val->user_id==$user_id && $seen_by_val->is_seen==0){
                                $unseen_count=$unseen_count+1;
                             
                                $conCheckLatest['conditions']=array(
                                    'seen_group_message_id' => $grpMsgvalue->group_messages_id,
                                    'seen_group_id' =>$grpMsgvalue->group_id,
                                    'seen_user_id' =>$user_id,
                                );

                                if($this->Crud_model->getRows('seen_temp_table',$conCheckLatest,'row')){
                                      $unseen_count=$unseen_count-1;
                                }

                        }

                        $value->unseen_msgs=$unseen_count;  

                    }
                }
        

            }

        }


             return $outPutArray;
     }



     
    function getRows($table,$params = array(),$record){

      $this->db->from($table);
      //fetch data by conditions
      if(array_key_exists("conditions",$params)){
          foreach($params['conditions'] as $key => $value){
              $this->db->where($key,$value);
          }
      }
    
        $data=$this->db->get();
        if ($data->num_rows()>0) {
            
            if ($record=='row') {
                # code...
                return $data->row();
            }
            else{
                return $data->result();
            }
            
        }
        else
        {
          return false;
        }
  
  }

    public function insert($table,$data = array()){
    $this->db->insert($table, $data);
        if ($this->db->affected_rows() >0) {
        # code...
          return $this->db->insert_id();
        }
        else{

         return false;

        }

  }


  public function update($table,$data = array(),$params = array()){
   

     if(array_key_exists("conditions",$params)){
          foreach($params['conditions'] as $key => $value){
              $this->db->where($key,$value);
          }
      }

    $this->db->update($table, $data);
    if ($this->db->affected_rows() >0) {
    # code...
      return true;
    }
    else{

     return false;

    }

  }



  public function delete($table,$params = array()){

   if(array_key_exists("conditions",$params)){
          foreach($params['conditions'] as $key => $value){
              $this->db->where($key,$value);
          }
      }
      
    $this->db->delete($table);
    if ($this->db->affected_rows() >0) {
    # code...
      return true;
    }
    else{

     return false;

    }

  }


    public function commonGet($options) {
            $select = false;
            $table = false;
            $join = false;
            $order = false;
            $limit = false;
            $offset = false;
            $where = false;
            $or_where = false;
            $single = false;
            $where_not_in = false;
            $like = false;

            extract($options);
            
            if ($select != false)
                $this->db->select($select);

            if ($table != false)
                $this->db->from($table);

            if ($where != false)
                $this->db->where($where);

            if($or_where!=false)
                $this->db->or_where($or_where);

            if ($where_not_in != false) {
                foreach ($where_not_in as $key => $value) {
                    if (count($value) > 0)
                        $this->db->where_not_in($key, $value);
                }
            }

            if ($like != false) {
                $this->db->like($like);
            }

            if ($or_where != false)
                $this->db->or_where($or_where);

            if ($limit != false) {

                if (!is_array($limit)) {
                    $this->db->limit($limit);
                } else {
                    foreach ($limit as $limitval => $offset) {
                        $this->db->limit($limitval, $offset);
                    }
                }
            }


            if ($order != false) {

                foreach ($order as $key => $value) {

                    if (is_array($value)) {
                        foreach ($order as $orderby => $orderval) {
                            $this->db->order_by($orderby, $orderval);
                        }
                    } else {
                        $this->db->order_by($key, $value);
                    }
                }
            }


            if ($join != false) {
                
                foreach($join as $key1 => $value1){
                
                    foreach ($value1 as $key => $value) {
    
                        if (is_array($value)) {
    
                            if (count($value) == 3) {
                                $this->db->join($value[0], $value[1], $value[2]);
                            } else {
                                foreach ($value as $key1 => $value1) {
                                    $this->db->join($key1, $value1);
                                }
                            }
                        } else {
                            $this->db->join($key, $value);
                        }
                    }
                }    
            }


            $query = $this->db->get();

            if ($single) {
                return $query->row();
            }


            return $query->result();

        }


        public function getUserGroupByUserId($user_id) 
            {
                $sql = "SELECT * FROM user_group 
                INNER JOIN designations ON designations.id = user_group.group_id 
                WHERE user_group.user_id = ?";
                $query = $this->db->query($sql, array($user_id));
                $result = $query->row_array();

                return $result;

            }


            public function count_all_entries($value='')
            {
                
                $sql = "SELECT COUNT(*) AS users_count FROM users 
                WHERE is_active= ? AND is_deleted=? AND is_verified=?";
                $query = $this->db->query($sql, array(1,0,1));
                $data['users_count'] = $query->row()->users_count;

                $sql = "SELECT COUNT(*) AS company_count FROM company 
                WHERE is_active= ? AND is_deleted=? AND is_verified=?";
                $query = $this->db->query($sql, array(1,0,1));
                $data['company_count'] = $query->row()->company_count;

                $sql = "SELECT COUNT(*) AS designation_count FROM designations 
                WHERE is_active= ? AND is_deleted=?";
                $query = $this->db->query($sql, array(1,0));
                $data['designation_count'] = $query->row()->designation_count;


                $sql = "SELECT COUNT(*) AS chat_groups_count FROM chat_groups    
                WHERE is_active= ? AND is_deleted=?";
                $query = $this->db->query($sql, array(1,0));
                $data['chat_groups_count'] = $query->row()->chat_groups_count;

                return $data;
            }

}
?>