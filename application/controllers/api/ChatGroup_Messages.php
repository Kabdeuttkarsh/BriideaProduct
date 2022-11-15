<?php
require APPPATH.'libraries/REST_Controller.php';


class ChatGroup_Messages extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='group_messages';
    }

    public function row_get($value='')
    {
        // code...
         $group_id = $this->security->xss_clean($this->get("id"));

         $sender_id =  $this->session->userdata('id');
        
         if(!empty($sender_id)){

            if(!empty($group_id)){
                 
                    $option = array(
                        'select' => 'group_messages.*,users.*,',
                        'table' => 'group_messages',
                        'join' => array(array('users' => 'users.id = group_messages.group_message_sender_id')),
                        'where' =>array(
                                        'group_messages.group_id'     => $group_id,
                                        'group_messages.is_active'   => 1,
                                        'group_messages.is_deleted'=>0
                                        ),   

                    );


                $sent_row=$this->Crud_model->commonGet($option);

                $messgaes_1 = array_column($sent_row, 'group_messages_id');
                          
                 array_multisort($messgaes_1, SORT_ASC, $sent_row);

                 $conGroup['conditions'] = array(
                          'group_id' => $group_id,
                 ); 

                $groups_row=$this->Crud_model->getRows('chat_groups',$conGroup,'row');
           
                 if($sent_row){


                            $this->response([

                                              "status" => TRUE,
                                              "message" => "Old Chat Found.",
                                              "data"=> $sent_row,
                                              "group_row"=> $groups_row,
                                           
                                          ], REST_Controller::HTTP_OK); 
                           }

                           else{

                              $this->response([

                                              "status" => FALSE,
                                              "message" => "Start New Chat.",
                                              "data"=>NULL,
                                              "group_row"=> $groups_row,
                                
                                          ], REST_Controller::HTTP_OK); 
                           }

               }

            else{
                 $this->response([
                          'status' => FALSE,
                          "message" => "Users Not Found.Please try again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
     

         }
       
         else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Please Login again."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);

         }
       
    

    }


    public function sendGroupMessage_post($value='')
    {
        $typed_grp_message = $this->security->xss_clean($this->post("typed_grp_message"));
        $grp_id = $this->security->xss_clean($this->post("grp_id"));
        

        if (!empty($typed_grp_message) && !empty($grp_id))  {
 
                 $data = array(
                  'group_message' => $typed_grp_message,
                  'group_id' => $grp_id,
                  'group_message_sender_id' => $this->session->userdata('id'),
              );
             
             if($branches_row=$this->Crud_model->insert($this->table,$data)){

                $conNew['conditions'] = array(
                          'group_messages_id' => $branches_row,
                ); 

                $new_message_row=$this->Crud_model->getRows($this->table,$conNew,'row');   

                $congrp_members['conditions'] = array(
                          'group_id' => $grp_id,
                ); 

                $grp_members=$this->Crud_model->getRows('group_user_mapping',$congrp_members,'result');   


                    // Set the response and exit
                        $this->response([
                              "status" => TRUE,
                              "message" => "Message Sent Successfully.",
                              "data"=>$new_message_row,
                              "grp_members"=>$grp_members,
                         
                          ], REST_Controller::HTTP_OK );
                
                      }
                      else{
                          // Set the response and exit
                        $this->response([
                              'status' => FALSE,
                              "message" => "Message not sent."],
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


}


?>