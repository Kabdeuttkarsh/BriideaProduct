<?php
require APPPATH.'libraries/REST_Controller.php';


class Company extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='company';
    }

    

    public function index_get($value='')
    {
        // code...

           $con['conditions'] = array(
                          'is_active' => 1,
                          'is_deleted' => 0
                      );

           if($company_row=$this->Crud_model->getRows($this->table,$con,'result')){

              $this->response([
                              "status" => TRUE,
                              "message" => "Company Loaded Successfully.",
                              "data"=>$company_row
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Company Not Found.Please add some groups."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
    }



    public function insert_post($value='')
  
    {
        # code...
        $company_name = $this->security->xss_clean($this->post("company_name"));
        $address = $this->security->xss_clean($this->post("address"));
        $company_phone = $this->security->xss_clean($this->post("company_phone"));

     

        if (!empty($company_name) && !empty($address) && !empty($company_phone))  {
 
                 $data = array(
                  'company_name' => $company_name,
                  'address' => $address,
                  'company_phone'=>$company_phone,
                 
              );
             
             if($branches_row=$this->Crud_model->insert($this->table,$data)){
                                  // Set the response and exit3
          
                         $this->response([
                              "status" => TRUE,
                              "message" => "Company Added Successfully.",
                              "data"=>$branches_row
                          ], REST_Controller::HTTP_OK); 
              }

              else{
                     $this->response([
                     'status' => FALSE,
                     "message" => "Company not Added."],
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

     public function row_get($value='')
    {
        // code...
     $id = $this->security->xss_clean($this->get("id"));
         if(!empty($id)){

            $con['conditions'] = array(
                 'is_active' => 1,
                 'is_deleted' => 0,
                 'id'=>$id
            );

               if($company_row=$this->Crud_model->getRows($this->table,$con,'row')){

                  $this->response([
                                  "status" => TRUE,
                                  "message" => "Company Loaded Successfully.",
                                  "data"=>$company_row
                              ], REST_Controller::HTTP_OK); 
               }
               else{
                 $this->response([
                              'status' => FALSE,
                              "message" => "Company Not Found.Please add some groups."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
               }


         }
          else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Invalid data."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }

  
    }

      public function update_post($value='')
  
    {
        # code...
        $id = $this->security->xss_clean($this->post("id"));
        $company_name = $this->security->xss_clean($this->post("company_name"));
        $address = $this->security->xss_clean($this->post("address"));
        $company_phone = $this->security->xss_clean($this->post("company_phone"));


        if (!empty($id) && !empty($company_name) && !empty($address) && !empty($company_phone))  {
 
              $data = array(
                  'company_name' => $company_name,
                  'address' => $address,
                  'company_phone' => $company_phone,
                
              );       
              $con['conditions']=array(
                'id'=>$id
              );
             
            if($branches_row=$this->Crud_model->update($this->table,$data,$con)){
                    $this->response([
                                          "status" => TRUE,
                                          "message" => "Branch Updated successfully.",
                                          "data"=>$branches_row,
                                      ], REST_Controller::HTTP_OK);
           }
            else{
                 $this->response([
                 'status' => FALSE,
                 "message" => "Branch Not Updated.Please change some Information."],
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
        

              $conUser['conditions'] = array(
                      'id' => $id,
                      'is_active' => 1,
                      'is_deleted' => 0,
                  
                  );
            $data = array('is_deleted' => 1 ,'is_active'=>0);

             if($user_row=$this->Crud_model->update($this->table,$data,$conUser)){
                          // Set the response and exit

                $this->response([
                      "status" => TRUE,
                      "message" => "Branch deleted successfully.",
                      "data"=>$user_row
                  ], REST_Controller::HTTP_OK);
        
              }
              else{
                  // Set the response and exit
                $this->response([
                      'status' => FALSE,
                      "message" => "Branch not deleted ."],
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