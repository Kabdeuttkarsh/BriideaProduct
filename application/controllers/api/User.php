<?php
require APPPATH.'libraries/REST_Controller.php';


class User extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='users';
    }

      public function insert_post($value='')
    {
       
        $username = $this->security->xss_clean($this->post("username"));
        $email = $this->security->xss_clean($this->post("email"));
        $password = $this->security->xss_clean($this->post("password"));
        $fname = $this->security->xss_clean($this->post("fname"));
        $lname = $this->security->xss_clean($this->post("lname"));
        $phone = $this->security->xss_clean($this->post("phone"));
        $gender = $this->security->xss_clean($this->post("gender"));
        $designation = $this->security->xss_clean($this->post("designation"));
        $company = $this->security->xss_clean($this->post("company"));
        $insert_type = $this->security->xss_clean($this->post("insert_type"));
      
    
        // 'designation_name' => $designation,
      
        if (!empty($fname) &&  !empty($lname) && !empty($phone) && 
            !empty($gender) && !empty($designation) &&  !empty($company) && !empty($username))  

                {

                $conPhoneCheck['conditions'] = array(
                          'phone' => $phone,
                         // 'id!='=>$user_row->id
                );

                $conUsernameCheck['conditions'] = array(
                          'username' => $username,
                         //  'id!='=>$user_row->id
                );  
               
                if($phone_row=$this->Crud_model->getRows($this->table,$conPhoneCheck,'row')){

                            $this->response([
                              'status' => FALSE,
                              "message" => "Entered Mobile no. already exist.Please change mobile no."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          
                }

                else{
                   
                    if($username_row=$this->Crud_model->getRows($this->table,$conUsernameCheck,'row')){

                          $this->response([
                              'status' => FALSE,
                              "message" => "Entered Username. already exist.Please change username."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                    }

                    else{


                    $data = array(
                          'username' => $username,
                          'email' => $email,
                          'password' =>  password_hash($phone,PASSWORD_DEFAULT),
                          'firstname' => $fname,
                          'lastname' => $lname,
                          'phone' => $phone,
                          'gender' => $gender,               
                          'company_id' => $company,
                          'is_verified'=>1,
                          'is_active'=>1,
                          'is_deleted'=>0,
                          'otp'=>NULL
                         
                      );           
               
             if($u_row=$this->Crud_model->insert($this->table,$data)){
                                  // Set the response and exit
                    $group_data = array(
                                'user_id' => $u_row,
                                'group_id' => $designation
                    );
                    
                    $group_data_row = $this->Crud_model->insert('user_group', $group_data);
                        
                  
                        $this->response([
                              "status" => TRUE,
                              "message" => "Users Added successfully.",
                              "data"=>$u_row
                          ], REST_Controller::HTTP_OK);
                
                      }
                    

                      else{
                          // Set the response and exit
                        $this->response([
                              'status' => FALSE,
                              "message" => "Users not Added."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          
                      }

                    }

                }


         }
         else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "Please Fill Complete Information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }
    }



    public function index_get($value='')
    {
        // code...

        $option = array(
             'select' => 'users.*, company.*,user_group.group_id,user_group.user_id,designations.designation_name,designations.id',
            'table' =>'users',

            'join' => array(array('company' => 'company.id = users.company_id','user_group' => 'user_group.user_id = users.id','designations' => 'designations.id = user_group.group_id')),
            'where' =>array('users.is_active' => 1,'users.is_deleted' => 0,'users.is_verified' => 1),
        
        );
        $users_row=$this->Crud_model->commonGet($option);

        if($users_row){

              $this->response([
                              "status" => TRUE,
                              "message" => "Users Loaded Successfully.",
                              "data"=>$users_row
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Users Not Found.Please add some Users."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
    }

    public function row_get($value='')
    {
        // code...
         $id = $this->security->xss_clean($this->get("id"));
         if(!empty($id)){
          
        $option = array(
             'select' => 'users.*, company.*,user_group.group_id,user_group.user_id,designations.designation_name,designations.id',
            'table' =>'users',

            'join' => array(array('company' => 'company.id = users.company_id','user_group' => 'user_group.user_id = users.id','designations' => 'designations.id = user_group.group_id')),
            
            'where' =>array('users.id' => $id,'users.is_active' => 1,'users.is_deleted' => 0),
            'single' =>TRUE,
        );
        $users_row=$this->Crud_model->commonGet($option);

        if($users_row){

              $this->response([
                              "status" => TRUE,
                              "message" => "User Loaded Successfully.",
                              "data"=>$users_row
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Users Not Found.Please add some Users."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }


         }
         else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Users Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }
       
    }

    public function sendEmail_post($value='')
    {
       
        $email = $this->security->xss_clean($this->post("email"));
        $subject="OTP Verification";
        $otp=rand(1000,9999);
        $message="Dear User, Your OTP for Mail Verification is ".$otp;


         if(!empty($email)){

              $conEmail['conditions'] = array(
                          'email' => $email,
                ); 

            if($groups_row=$this->Crud_model->getRows($this->table,$conEmail,'row')){

                    if($groups_row->is_active==1 && $groups_row->is_deleted==0 &&  $groups_row->is_verified==1){
                        $this->response([
                          'status' => FALSE,
                          "message" => "Entered Email is already registered and verified with us.Please Change Email Address"],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }
                    else {

                                                     
                            if($res=$this->Email_Model->use_mails($email ,$subject,$message)){
                                
                                  $data = array(
                                     'email' => $email,
                                      'otp'=>$otp,
                                      'is_verified'=>0,
                                      'is_active'=>0,
                                 );
                                 
                                $u_row=$this->Crud_model->update($this->table,$data,$conEmail);


                                   $this->response([
                                          "status" => TRUE,
                                          "message" => "Email Sent successfully.",
                                          "data"=>$res,
                                      ], REST_Controller::HTTP_OK);
                            }else{
                                 $this->response([
                                      'status' => FALSE,
                                      "message" => "Failed Sending Email.Please Try Again",
                                      "data"=>$res
                                  ],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                            }
                    }

            }
            else{

                if($res=$this->Email_Model->use_mails($email ,$subject,$message)){

                        $data = array(
                           'email' => $email,
                           'otp'=>$otp,
                           'is_verified'=>0,
                           'is_active'=>0,

                        );
                        $user_row=$this->Crud_model->insert($this->table,$data);
                        $this->response([
                                          "status" => TRUE,
                                          "message" => "Email Sent successfully.",
                                           "data"=>$res
                                      ], REST_Controller::HTTP_OK);
                }
                else{
                                 $this->response([
                                      'status' => FALSE,
                                      "message" => "Failed Sending Email.Please Try Again",
                                       "data"=>$res
                                  ],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                            }

            }

        }

        else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "Please Enter Email."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

    }



       public function verifyEmailOTP_post($value='')
    {
        $otp = $this->security->xss_clean($this->post("email_otp"));
        $email = $this->security->xss_clean($this->post("email_verify"));
        
        if(!empty($email) && !empty($otp)){
              
              $conEmail['conditions'] = array(
                          'email' => $email,
                ); 

            if($groups_row=$this->Crud_model->getRows($this->table,$conEmail,'row')){

                if($groups_row->otp==$otp){
                       $data = array(
                          
                           'email' => $email,
                           'otp'=>NULL,
                           'is_verified'=>1,
                           'is_active'=>1,
                           'is_deleted'=>0,
                        );

                        $u_row=$this->Crud_model->update($this->table,$data,$conEmail);

                        $this->response([
                                          "status" => TRUE,
                                          "message" => "Email Verified Successfully.",
                                           "data"=>$u_row
                                      ], REST_Controller::HTTP_OK);

                }else{
                     $this->response([
                          'status' => FALSE,
                          "message" => "Incorrect OTP."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                }

            }
            else{
                  $this->response([
                          'status' => FALSE,
                          "message" => "Email Verification Failed."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

            }
            

        }

        else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "Please Enter Email."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }

    }


    public function update_post($value='')
    {
        $id=$this->security->xss_clean($this->post("id"));
        $username = $this->security->xss_clean($this->post("username"));
        $email = $this->security->xss_clean($this->post("email"));
        // $password = $this->security->xss_clean($this->post("password"));
        $fname = $this->security->xss_clean($this->post("fname"));
        $lname = $this->security->xss_clean($this->post("lname"));
        $phone = $this->security->xss_clean($this->post("phone"));
        $gender = $this->security->xss_clean($this->post("gender"));
        $designation = $this->security->xss_clean($this->post("designation"));
        $company = $this->security->xss_clean($this->post("company"));
        $insert_type = $this->security->xss_clean($this->post("insert_type"));
      
    
        // 'designation_name' => $designation,
      
        if (!empty($fname) &&  !empty($lname) && !empty($phone) && 
            !empty($gender) && !empty($designation) &&  !empty($company) && !empty($username))  

                {

               $conUpdate['conditions'] = array(
                         'id'=>$id
               );

               $conPhoneCheck['conditions'] = array(
                          'phone' => $phone,
                          'id!='=>$id
               );

              $phone_row=$this->Crud_model->getRows($this->table,$conPhoneCheck,'row');
               
              $conUsernameCheck['conditions'] = array(
                   'username' => $username,
                   'id!='=>$id
              );  
               
                if($phone_row){

                            $this->response([
                              'status' => FALSE,
                              "message" => "Entered Mobile. already exist.Please change Email."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          
                }
                else{
                   
                    if($username_row=$this->Crud_model->getRows($this->table,$conUsernameCheck,'row')){

                          $this->response([
                              'status' => FALSE,
                              "message" => "Entered Username. already exist.Please change username."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

                    }

                    else{


                    $data = array(
                          'username' => $username,
                          'email' => $email,
                        // 'password' =>  password_hash($phone,PASSWORD_DEFAULT),
                          'firstname' => $fname,
                          'lastname' => $lname,
                          'phone' => $phone,
                          'gender' => $gender,               
                          'company_id' => $company,
                          'is_verified'=>1,
                          'is_active'=>1,
                          'is_deleted'=>0,
                          'otp'=>NULL
                         
                      );
             
             if($u_row=$this->Crud_model->update($this->table,$data,$conUpdate)){
                                  // Set the response and exit
                
                        if($insert_type==1){
                          
                            $group_data = array(
                                'user_id' => $u_row,
                                'group_id' => $designation
                            );
                        $group_data_row = $this->Crud_model->insert('user_group', $group_data);
                        
                        }

                        // if($insert_type==2){

                        //     $condition_group['conditions']  = array(
                        //         'user_id' => $u_row,
                               
                        //     );


                        //     $grp_row=$this->Crud_model->getRows('user_group',$condition_group,'row');

                        //     $group_data12 = array(
                        //         'group_id' => $designation
                        //     );
                          
                        //    $condition_group_update['conditions']  = array(
                        //         'user_id' => $u_row,
                        //         'id' => $grp_row->id,
                               
                        //     );

                        //      $u_row=$this->Crud_model->update('user_group',$group_data12,$condition_group_update);
                       
                        // }
                        
                       
                        $this->response([
                              "status" => TRUE,
                              "message" => "Users Updated successfully.",
                              "data"=>$u_row
                          ], REST_Controller::HTTP_OK);
                
                      }
                    

                      else{
                          // Set the response and exit
                        $this->response([
                              'status' => FALSE,
                              "message" => "Users not Updated ."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          
                      }

                    }

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

                $conGroupUserMap['conditions'] = array(
                  'user_id' => $id,
                  'is_active' => 1,
                  'is_deleted' => 0,
              
              );
                 $dataGroupUser = array('is_deleted' => 1 ,'is_active'=>0);
                 $user_row=$this->Crud_model->update('group_user_mapping',$dataGroupUser,$conGroupUserMap);
            $this->response([
                  "status" => TRUE,
                  "message" => "Users delete successfully.",
                  "data"=>$user_row
              ], REST_Controller::HTTP_OK);
    
          }
          else{
              // Set the response and exit
            $this->response([
                  'status' => FALSE,
                  "message" => "Users not delete ."],
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


 public function update_user_password_post($value='')
{
          $id = $this->session->userdata('id');
         $old_password = $this->security->xss_clean($this->post("old_password"));
         $new_password = $this->security->xss_clean($this->post("new_password"));
         $confirm_password = $this->security->xss_clean($this->post("confirm_password"));
         
        if(!empty($id) && is_numeric($id) && !empty($old_password) && !empty($new_password) && !empty($confirm_password)){

          if($new_password == $confirm_password){
  
              $con['conditions'] = array(
                  'id' => $id
              );
                
            $userCount = $this->Crud_model->getRows($this->table,$con,'row');
            
                if($userCount){

                    //old password verification
                    if (password_verify($old_password,$userCount->password)) {
                        # code...
                    
                  // Set the response and exit
                            $customer = array(
                          
                            "password" => password_hash($new_password,PASSWORD_DEFAULT)
                          );
                          // Check if the user data is inserted
                          if($this->Crud_model->update($this->table,$customer,$con)){
                                
                                  $this->response([
                                      "status" => TRUE,
                                      "message" => "Password Updated successfully.",
                                      "data"=>$u_row
                                  ], REST_Controller::HTTP_OK);
                          }
                    
                          else{
                              // Set the response and exit
                           $this->response([
                                  'status' => FALSE,
                                  "message" => "Failed to change Password."],
                                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              
                          }
                 }
                
                 else{
                       $this->response([
                              'status' => FALSE,
                              "message" => "Invalid Old Password."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              
                 }
              }
            
              else{
                   $this->response([
                  'status' => FALSE,
                  "message" => "Users not Found ."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                
              }

            }
          
            else{
                $this->response([
                  'status' => FALSE,
                  "message" => "New and Confirm Password doesnot match."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              
            }
        }

        else{
            $this->response([
                  'status' => FALSE,
                  "message" => "Invalid Data."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              
        }


}

public function user_reset_password_post($value='')
{
    // code...
  $user_id_reset = $this->security->xss_clean($this->post("user_id_reset"));
  $password = $this->security->xss_clean($this->post("password"));
  $cpassword = $this->security->xss_clean($this->post("cpassword"));

  if (!empty($user_id_reset) && !empty($password) && !empty($cpassword)) {
     
             $con['conditions'] = array(
                'id' => $user_id_reset
             );
                            
            $userCount = $this->Crud_model->getRows($this->table,$con,'row');
                        
            if($userCount){

                    $customer = array(
                        "password" => password_hash($password,PASSWORD_DEFAULT)
                    );
                                          // Check if the user data is inserted
                    if($this->Crud_model->update($this->table,$customer,$con)){
                        
                         $this->response([
                             "status" => TRUE,
                             "message" => "Password Updated successfully.",
                             "data"=>$u_row
                        ], REST_Controller::HTTP_OK);
                    }
                    else{
                        
                        $this->response([
                        'status' => FALSE,
                        "message" => "Failed to change Password."],
                         REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                    }
              }
              
              else{
                    $this->response([
                    'status' => FALSE,
                    "message" => "Users not Found ."],
                  REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }

      }
      else{
           $this->response([
                      'status' => FALSE,
                      "message" => "Invalid Data."],
                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
      }
    }


}



?>