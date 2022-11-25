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

                $sql_sender_row = $this->db->query("SELECT id,username,firstname,lastname,is_online FROM users WHERE id=$value->sender_message_id");
                $sender_info=$sql_sender_row->row();
                
                $sql_receiver_row = $this->db->query("SELECT id,username,firstname,lastname,is_online FROM users WHERE id=$value->receiver_message_id");
                $receiver_info=$sql_receiver_row->row();

                if($value->sender_message_id!=$user_id){

                    $value->id=$value->sender_message_id;
                    $value->firstname=$sender_info->firstname;
                    $value->lastname=$sender_info->lastname;
                    $value->is_online=$sender_info->is_online;

                }
                else{

                    $value->id=$value->receiver_message_id;
                    $value->firstname=$receiver_info->firstname;
                    $value->lastname=$receiver_info->lastname;
                    $value->is_online=$receiver_info->is_online;
                }

                if(!in_array($value->id,$ids)){
                    $outPutArray[]=$value;
                    array_push($ids,$value->id);

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

}
?>