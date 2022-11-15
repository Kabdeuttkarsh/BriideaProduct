<?php
require APPPATH.'libraries/REST_Controller.php';


class UserChat extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='messages';
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
              );
             
             if($branches_row=$this->Crud_model->insert($this->table,$data)){

                $conNew['conditions'] = array(
                          'message_id' => $branches_row,
                ); 

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
}


?>