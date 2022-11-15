<?php
class Crud_model extends CI_Model
{
	 
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