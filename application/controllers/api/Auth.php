<?php
require APPPATH.'libraries/REST_Controller.php';


class Auth extends REST_Controller{


    public function __construct() {
        parent::__construct();
        $this->table ='users';
    }


      /* Checking All Conditions for Login to all Stakeholders */

    public function index_get(){


          $email = $this->security->xss_clean($this->get("email"));
          $password = $this->security->xss_clean($this->get("password"));


            if (!empty($email) && !empty($password) ){
                    # code...
                   $con['conditions'] = array(
                          'email' => $email,
                          'is_active' => 1,
                          'is_deleted' => 0
                      );

                 if($users_row=$this->Crud_model->getRows($this->table,$con,'row')){
                              // Set the response and exit
                    
                   
                     if(password_verify($password,$users_row->password)){

                       $option = array(
                          'select' => 'user_group.*, designations.*',
                          'table' =>'user_group',
                          'join' => array(array('designations' => 'designations.id = user_group.group_id')),
                          'where' =>array('user_group.user_id' => $users_row->id),
                          'single' =>TRUE,
                       
                                          
                      );
                     $user_group=$this->Crud_model->commonGet($option);
                      // print_r($user_group);

                      $logged_in_sess = array(
                            'id' => $users_row->id,
                            'username'  => $users_row->username,
                            'email'     => $users_row->email,
                            'firstname' => $users_row->firstname,
                            'lastname'  => $users_row->lastname,
                            'logged_in' => TRUE,
                            'group_id' => $user_group->group_id,
                            'group_name' => $user_group->group_name,
                            'permission' => $user_group->permission,
                            'company_id' => $users_row->company_id,
                            
                      );
                      $this->session->set_userdata($logged_in_sess);
                       
                       $conUserActive['conditions'] = array(
                          'email' => $email,
                          'id'=> $users_row->id,
                          'is_active' => 1,
                          'is_deleted' => 0
                      );


                        $data = array(
                           'is_online' => 1,
                        );
                        $branches_row=$this->Crud_model->update($this->table,$data,$conUserActive);

                          $this->response([
                              "status" => TRUE,
                              "message" => "Login Successful.Redirecting to Dashboard",
                              "data"=>$users_row
                          ], REST_Controller::HTTP_OK); 

                     }
                     else{

                      $this->response([
                          'status' => FALSE,
                          "message" => "Password Incorrect.Please try again"],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                     }

            
                  }
                  else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Please Check Email or else Signup as new Account."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                      
                  }

              }
              
              else{
                      // Set the response and exit
                    $this->response([
                          'status' => FALSE,
                          "message" => "Please Enter Email and Password."
                           ], REST_Controller::HTTP_BAD_REQUEST);
                      
                  }
    }
  
} 
 ?>