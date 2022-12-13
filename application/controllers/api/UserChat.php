<?php
require APPPATH.'libraries/REST_Controller.php';


class UserChat extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='messages';

      // Start---- Code for changing last online status ////

        $conEmail['conditions'] = array(
            'id' => $this->session->userdata('id'),
        ); 
        $check=$this->Crud_model->getRows('users',$conEmail,'row');

        if($check->last_online_at!=date('Y-m-d H:i:s')) {
           
            $data = array(
                'last_online_at' => date('Y-m-d H:i:s'),
            );

            $u_row=$this->Crud_model->update('users',$data,$conEmail);
        }
      
    // End---- Code for changing last online status ////
    }

    public function showUserListforChat_get($value='')
    {
        
        if($this->session->userdata('id')){

                 $conUser['conditions']=array(
                            'id!='=> $this->session->userdata('id'),
                            'is_active' => 1,
                            'is_deleted' => 0,
                            'is_verified' => 1,
                            // 'company_id'=>$this->session->userdata('company_id'),
                        );


                   $option = array(
                        'select' => 'users.*,user_group.group_id,designations.designation_name,company.company_name,company.address',
                        'table' => 'users',

                        'join' => array(array('user_group' => 'user_group.user_id = users.id','designations'=>'designations.id =user_group.group_id','company'=>'company.id =users.company_id')),

                        'where' =>array(
                                        'users.is_active'   => 1,
                                        'users.is_deleted'=>0,
                                        'users.is_verified'=>1
                                        ),   
                   

                    );
                     $UserList=$this->Crud_model->commonGet($option);
                     // echo "<pre>";
                     // print_r($UserList);
                     // die();

                 if($UserList){

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


    public function row_get($value='',$start='',$limit='')
    {
        // code...
         $receiver_id = $this->security->xss_clean($this->get("id"));
         $start = $this->security->xss_clean($this->get("start"));
         // $limit = $this->security->xss_clean($this->get("limit"));

         $sender_id =  $this->session->userdata('id');
        
           if(!empty($sender_id)){

            if(!empty($receiver_id)){

            $sql =$this->db->query("SELECT * FROM (SELECT * FROM messages WHERE $sender_id IN (sender_message_id,receiver_message_id) AND  $receiver_id IN (sender_message_id,receiver_message_id) ORDER BY message_id DESC LIMIT $start,50) AS messages ORDER BY message_id ASC");
                $array=$sql->result();

                // if($array==NULL || empty($array)){
                   
                //     $sql =$this->db->query("SELECT * FROM (SELECT * FROM messages WHERE $sender_id IN (sender_message_id,receiver_message_id) AND  $receiver_id IN (sender_message_id,receiver_message_id) ORDER BY message_id DESC) AS messages ORDER BY message_id ASC");
                //      $array=$sql->result();

                // }
                // echo "<pre>";
                // print_r($array);
                //  die();
                 
                 //    $option = array(
                 //        'select' => 'messages.*',
                 //        'table' =>'messages',
                     
                 //        'where' =>array(
                 //                        'sender_message_id'     => $sender_id,
                 //                        'receiver_message_id'   => $receiver_id,
                 //                        'is_deleted'=>0
                 //                        ),  
                 //     //  'limit'=>array('5'=>'0'),
                 //        'order'=>array('message_id'=>'DESC')
                    

                 //    );


                 // $sent_row=$this->Crud_model->commonGet($option);

                 //  $option = array(
                 //        'select' => 'messages.*',
                 //        'table' =>'messages',
                     
                 //        'where' =>array(
                 //                        'sender_message_id'     => $receiver_id,
                 //                        'receiver_message_id'   => $sender_id
                 //                        ),   
                 //       // 'limit'=>array('5'=>'0'),
                 //        'order'=>array('message_id'=>'DESC')
                 //    );

                 // $receive_row=$this->Crud_model->commonGet($option);
                 
                 $conSender['conditions'] = array(
                          'id' => $sender_id ,
                 ); 

                 $sender_data_row = $this->Crud_model->getRows('users',$conSender,'row'); 

                 $conReceiver['conditions'] = array(
                          'id' => $receiver_id,
                ); 

                 $receiver_data_row = $this->Crud_model->getRows('users',$conReceiver,'row'); 
 
                 $now=new DateTime(date('Y-m-d H:i:s'));


                 if(date('Y-m-d')==date('Y-m-d',strtotime($receiver_data_row->last_online_at))) {

                    $interval = $now->diff(new DateTime($receiver_data_row->last_online_at));
                    if($interval->format('%i')>1){

                      $elapsed = $interval->format('%h hours %i minutes %s seconds');

                    }else{
                         $elapsed ="online";
                    }
                   
                 }
                 else{
                    
                     $elapsed = $receiver_data_row->last_online_at;

                 }
            

                $receiver_data_row->last_online_at=$elapsed;
                 // if($sent_row || $receive_row){
                 if($array ){        

                          // $messages= array_merge($sent_row,$receive_row);
                          // $messgaes_1 = array_column($messages, 'message_id');
                          
                          // array_multisort($messgaes_1, SORT_ASC, $messages);

                            $this->response([
                                              "status" => TRUE,
                                              "message" => "Old Chat Found.",
                                              "data"=> $array,
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
        if($this->session->userdata('id')){

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




public function uploadFilesUserChat_post($value='')
{

        $id = $this->session->userdata('id');
        $receiver_id = $this->security->xss_clean($this->post("receiver_id"));
      //  $new_message_with_files = $this->security->xss_clean($this->post("new_message_with_files"));
    //    $files_array=array();
        if (!empty($receiver_id))  {
 
                $config['upload_path']   = './uploads/user_chat_files/'; 
                $config['allowed_types'] = 'gif|jpg|png|mp4|xlsx|xls|csv|pdf|docx|txt'; 
                $config['max_size']      = 30000;
                $ext = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
                $new_name = time().rand(10,100).'.'.$ext;
                $new_name=str_replace(" ","_",$new_name);
                $config['file_name'] = $new_name;
                $ext = pathinfo($new_name, PATHINFO_EXTENSION);

                $this->load->library('upload', $config);
             
                if($this->upload->do_upload('file')){
                    
                    $data = array(
                         'message' => NULL,
                         'receiver_message_id' => $receiver_id,
                         'sender_message_id' => $this->session->userdata('id'),
                         'is_sent' => 1,
                         'message_file' => $new_name,
                         'message_file_extension' => $ext,
                    );

                    $branches_row=$this->Crud_model->insert($this->table,$data);
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
                              "message" => "File not sent."],
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