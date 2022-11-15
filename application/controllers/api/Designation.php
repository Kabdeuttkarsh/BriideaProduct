<?php
require APPPATH.'libraries/REST_Controller.php';


class Designation extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='designations';
    }

    public function index_get($value='')
    {
        // code...

           $con['conditions'] = array(
                          'is_active' => 1,
                          'is_deleted' => 0
                      );

           if($groups_row=$this->Crud_model->getRows($this->table,$con,'result')){

              $this->response([
                              "status" => TRUE,
                              "message" => "Designations Loaded Successfully.",
                              "data"=>$groups_row
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Designations Not Found.Please add some groups."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
    }

    public function row_get($value='')
    {
        // code...
         $id = $this->security->xss_clean($this->get("id"));
         if(!empty($id)){
            $conGroup['conditions'] = array(
                          'id' => $id,
                          'is_active' => 1,
                          'is_deleted' => 0
            ); 

            if($groups_row=$this->Crud_model->getRows($this->table,$conGroup,'row')){

              $this->response([
                              "status" => TRUE,
                              "message" => "Designation Loaded Successfully.",
                              "data"=>$groups_row,
                              "permissions"=>unserialize($groups_row->permission)
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Designation Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }



         }
         else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Designation Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }
       
    }


      public function insert_post($value='')
    {
        # code...
        $designation_name = $this->security->xss_clean($this->post("designation_name"));
        $permission = $this->security->xss_clean($this->post("permission"));
        

        if (!empty($permission) && !empty($designation_name))  {
 
                 $data = array(
                  'designation_name' => $designation_name,
                  'permission' => serialize($permission),
              );
             
             if($branches_row=$this->Crud_model->insert($this->table,$data)){
                                  // Set the response and exit
                        $this->response([
                              "status" => TRUE,
                              "message" => "Designation Added successfully.",
                              "data"=>$branches_row
                          ], REST_Controller::HTTP_OK);
                
                      }
                      else{
                          // Set the response and exit
                        $this->response([
                              'status' => FALSE,
                              "message" => "Designation not Added ."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          
                      }

         }
         else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "Please Fill Complete Information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }

    }

    public function update_post($value='')
    {
         $id = $this->security->xss_clean($this->post("id"));
         $designation_name = $this->security->xss_clean($this->post("designation_name"));
         $permission = $this->security->xss_clean($this->post("permission"));
         if (!empty($id) && !empty($designation_name))  {

             $conGroup['conditions'] = array(
                          'id' => $id,
                          'is_active' => 1,
                          'is_deleted' => 0
            ); 

            if($groups_row=$this->Crud_model->getRows($this->table,$conGroup,'row')){
                
                 $data = array(
                  'designation_name' => $designation_name,
                  'permission' => serialize($permission),
              );
             
             if($branches_row=$this->Crud_model->update($this->table,$data,$conGroup)){
                                  // Set the response and exit
                        $this->response([
                              "status" => TRUE,
                              "message" => "Designation updated successfully.",
                              "data"=>$branches_row
                          ], REST_Controller::HTTP_OK);
                
                      }
                      else{
                          // Set the response and exit
                        $this->response([
                              'status' => FALSE,
                              "message" => "Designation not updated ."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          
                      }

            }
           
            else{
                        $this->response([
                          'status' => FALSE,
                          "message" => "Previous Designation Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }


         }
         else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "Please Fill Complete Information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }
    }



     public function delete_post($value='')
    {
        # code...
     $id = $this->security->xss_clean($this->post("id"));
 
        if (!empty($id) && is_numeric($id)) {
            # code...
    

          $con['conditions'] = array(
                  'id' => $id,
                  'is_active' => 1,
                  'is_deleted' => 0,
              
              );
        $data = array('is_deleted' => 1 ,'is_active'=>0);

         if($branches_row=$this->Crud_model->update($this->table,$data,$con)){
                      // Set the response and exit
            $this->response([
                  "status" => TRUE,
                  "message" => "Designation delete successfully.",
                  "data"=>$branches_row
              ], REST_Controller::HTTP_OK);
    
          }
          else{
              // Set the response and exit
            $this->response([
                  'status' => FALSE,
                  "message" => "Designation not delete ."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              
          }

      }
      else{
              // Set the response and exit
            $this->response([
                  'status' => FALSE,
                  "message" => "invalid data."
                   ], REST_Controller::HTTP_BAD_REQUEST);
              
          }
    }

}



?>