<?php
require APPPATH.'libraries/REST_Controller.php';


class UserChat extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='messages';
    }

    public function showUserListforChat_get($value='')
    {
        
        if($this->session->userdata('email')){

                 $conUser['conditions']=array(
                            'id!='=> $this->session->userdata('id'),
                            'is_active' => 1,
                            'is_deleted' => 0,
                            'is_verified' => 1,
                            'company_id'=>$this->session->userdata('company_id'),
                        );
                 if($UserList=$this->Crud_model->getRows('users',$conUser,'result')){

                     if(!empty($us=$this->Crud_model->loadUsersForChat())) {
                        

                        $this->response([
                              "status" => TRUE,
                              "message" => "Users Found for chatting.",
                              "data"=>$us,
                              "new_chat"=>$UserList,

                          ], REST_Controller::HTTP_OK);
                   

                    }

                    else{
                     
                        $this->response([
                              "status" => TRUE,
                              "message" => "Users Found for chatting.",
                              "data"=>NULL,
                              "new_chat"=>$UserList,

                          ], REST_Controller::HTTP_OK);
                     
                    }

                 }
                  else{
                     
                        $this->response([
                          'status' => FALSE,
                          "data"=>NULL,
                          "new_chat"=>NULL,
                          "message" => "Company User Not Found for chat."
                           ], REST_Controller::HTTP_BAD_REQUEST);
                    }

                   

        }

        else{

            $this->response([
                  'status' => FALSE,
                  "message" => "Session Not Found. Please Login Again"
                   ], REST_Controller::HTTP_BAD_REQUEST);
              
        }
       
    }


    public function row_get($value='')
    {
        // code...
         $receiver_id = $this->security->xss_clean($this->get("id"));

         $sender_id =  $this->session->userdata('id');
        
         if(!empty($sender_id)){

            if(!empty($receiver_id)){
                 
                    $option = array(
                        'select' => 'messages.*',
                        'table' =>'messages',
                     
                        'where' =>array(
                                        'sender_message_id'     => $sender_id,
                                        'receiver_message_id'   => $receiver_id,
                                        'is_deleted'=>0
                                        ),   

                    );


                 $sent_row=$this->Crud_model->commonGet($option);

                  $option = array(
                        'select' => 'messages.*',
                        'table' =>'messages',
                     
                        'where' =>array(
                                        'sender_message_id'     => $receiver_id,
                                        'receiver_message_id'   => $sender_id
                                        ),   

                    );

                 $receive_row=$this->Crud_model->commonGet($option);
                 
                 $conSender['conditions'] = array(
                          'id' => $sender_id ,
                 ); 

                 $sender_data_row = $this->Crud_model->getRows('users',$conSender,'row'); 

                 $conReceiver['conditions'] = array(
                          'id' => $receiver_id,
                ); 

                 $receiver_data_row = $this->Crud_model->getRows('users',$conReceiver,'row'); 

                 if($sent_row || $receive_row){
                          

                          $messages= array_merge($sent_row,$receive_row);
                         
                          $messgaes_1 = array_column($messages, 'message_id');
                          
                          array_multisort($messgaes_1, SORT_ASC, $messages);

                            $this->response([
                                              "status" => TRUE,
                                              "message" => "Old Chat Found.",
                                              "data"=> $messages,
                                              "sender_data_row"=> $sender_data_row,
                                              "receiver_data_row"=> $receiver_data_row,
                                          ], REST_Controller::HTTP_OK); 
                           }

                           else{

                              $this->response([
                                              "status" => FALSE,
                                              "message" => "Start New Chat.",
                                              "data"=>NULL,
                                              "sender_data_row"=> $sender_data_row,
                                              "receiver_data_row"=> $receiver_data_row,
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



    public function sendUserMessage_post($value='')
    {
        $typed_message = $this->security->xss_clean($this->post("typed_message"));
        $receiver_id = $this->security->xss_clean($this->post("receiver_id"));
        

        if (!empty($typed_message) && !empty($receiver_id))  {
 
              $data = array(
                  'message' => $typed_message,
                  'receiver_message_id' => $receiver_id,
                  'sender_message_id' => $this->session->userdata('id'),
                  'is_sent' => 1
              );

             
             if($branches_row=$this->Crud_model->insert($this->table,$data)){

                $conNew['conditions'] = array(
                    'message_id' => $branches_row,
                ); 

                // $datasd = array('is_sent' => 1);
                                 
                // $u_row=$this->Crud_model->update($this->table,$datasd,$conNew);

                $new_message_row=$this->Crud_model->getRows($this->table,$conNew,'row');   

                $conEmail['conditions'] = array(
                          'id' => $receiver_id,
                ); 

                $receiver_row=$this->Crud_model->getRows('users',$conEmail,'row');   
                
                $conSender['conditions'] = array(
                          'id' => $this->session->userdata('id'),
                );

                 $sender_row=$this->Crud_model->getRows('users',$conSender,'row');   
                 
                 $new_message_row->sender_first_name=$sender_row->firstname;
                 $new_message_row->sender_last_name=$sender_row->lastname;
                                  // Set the response and exit
                        $this->response([
                              "status" => TRUE,
                              "message" => "Message Sent Successfully.",
                              "data"=>$new_message_row,
                              "is_receiver_online" => $receiver_row->is_online
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

    public function sendSeenReceiptToSenderForUserChat_post($sender_id=''){
         $sender_id = $this->security->xss_clean($this->post("sender_id"));
         $message_id = $this->security->xss_clean($this->post("message_id"));
          if (!empty($sender_id))  {

            $con['conditions']=array(
                 'sender_message_id' =>$sender_id,
                 'receiver_message_id' =>$this->session->userdata('id'),
                 'is_seen' =>0,
                 'is_sent'=>1,
                 //'message_id'=> $message_id,
                 'is_delivered'=>1

            );

            $datasd = array('is_seen' => 1,
                            'seen_time'=>date('Y-m-d H:i:s'),
                            // 'is_delivered' => 1,
                            // 'delivery_time'=>date('Y-m-d H:i:s'),
            );
                                 
             if($u_row=$this->Crud_model->update('messages',$datasd,$con)){

                  $this->response([
                             
                              "status" => TRUE,
                              "message" => "Message seen Successfully.",
                             
                          ], REST_Controller::HTTP_OK );
             }else{

                      // $this->response([
                      //     'status' => FALSE,
                      //     "message" => "Seen Receipt not updated."],
                      //     REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
             }

          }
    }

    public function sendDeliveryReceiptToSenderForUserChat_post($message_id=''){
 
         $message_id = $this->security->xss_clean($this->post("message_id"));
          if (!empty($message_id))  {

            $con['conditions']=array(
                'receiver_message_id' =>$this->session->userdata('id'),
                 'is_seen' =>0,
                 'is_sent'=>1,
                 'message_id'=> $message_id,
                 'is_delivered'=>0
            );

            $datasd = array(
                            'is_delivered' => 1,
                            'delivery_time'=>date('Y-m-d H:i:s'),
            );
                                 
             if($u_row=$this->Crud_model->update('messages',$datasd,$con)){
                  $this->response([
                             
                              "status" => TRUE,
                              "message" => "Message Delivered Successfully.",
                             
                          ], REST_Controller::HTTP_OK );
             }
             else{
                      // $this->response([
                      //     'status' => FALSE,
                      //     "message" => "Delivery Receipt not updated."],
                      //     REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
             }

          }
    }

    public function checkForNewUserMessages_get($value='')
    {
        if($this->session->userdata('email')){

            $con['conditions']=array(
                 'receiver_message_id' =>$this->session->userdata('id'),
                 'is_seen' =>0,
                 'is_sent'=>1,
                 'is_delivered'=>0
            );

            if($new_message=$this->Crud_model->getRows($this->table,$con,'result')){

                $datasd = array(
                            'is_delivered' => 1,
                            'delivery_time'=>date('Y-m-d H:i:s'),
                );
                
                if($u_row=$this->Crud_model->update('messages',$datasd,$con)){

                  $this->response([
                             
                              "status" => TRUE,
                              "message" => "Message Delivered Successfully.",
                             
                          ], REST_Controller::HTTP_OK );
                 }
                             

            }

            else{
                $this->response([
                  'status' => FALSE,
                  "message" => "No New Messages Yet."
                   ], REST_Controller::HTTP_BAD_REQUEST);
            }


        }
        else{

             $this->response([
                  'status' => FALSE,
                  "message" => "Session Not Found. Please Login Again"
                   ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}


?>