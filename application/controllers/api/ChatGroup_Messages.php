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
                        'select' => 'group_messages.*,users.*',
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
        $delivery_to_array=array();
        $seen_by_array=array();

        if (!empty($typed_grp_message) && !empty($grp_id))  {
            $conMap['conditions']=array(
                'group_id' =>$grp_id,
                'is_active' =>1,
                'is_deleted' =>0,
            );

            $groups_row=$this->Crud_model->getRows('group_user_mapping',$conMap,'result');
            
            $groups_row_new = array_column($groups_row, 'user_id');

            array_multisort($groups_row_new, SORT_ASC, $groups_row);

            foreach ($groups_row as $key => $value) {
                  
                  $datasd = array(
                    'is_delivered' => 0,
                    'delivery_time'=>NULL,
                    'user_id'=>$value->user_id,
                  );
                  $delivery_to_array[]=$datasd;

                  $dataseen = array(
                    'is_seen' => 0,
                    'seen_time'=>NULL,
                    'user_id'=>$value->user_id,
                  );
                  $seen_by_array[]=$dataseen;
                  
            }
 
               $data = array(
                  'group_message' => $typed_grp_message,
                  'group_id' => $grp_id,
                  'group_message_sender_id' => $this->session->userdata('id'),
                  'is_sent' => 1,
                  'delivered_to' => json_encode($delivery_to_array),
                  'seen_by' => json_encode($seen_by_array),

              );
             
             if($branches_row=$this->Crud_model->insert($this->table,$data)){
                
                $option = array(
                    'select' => 'group_messages.*,group_user_mapping.*,users.firstname,users.lastname,users.id,users.is_online,chat_groups.*',
                    'table' => 'group_messages',
                    'join' => array(array('group_user_mapping' => 'group_user_mapping.group_id = group_messages.group_id','users'=>'users.id =group_user_mapping.user_id','chat_groups' => 'chat_groups.group_id = group_messages.group_id')),
                    'where' =>array(
                                 // 'group_messages.group_id'     => $group_id,
                                    'group_messages.group_messages_id'   => $branches_row,
                                    'group_messages.is_active'   => 1,
                                    'group_messages.is_deleted'=>0,
                                    'users.is_active'=>1,
                                    'users.is_verified'=>1,
                                    'users.is_deleted'=>0,
                                    'users.is_deleted'=>0,
                                    'group_user_mapping.is_active'=>1,
                                    'group_user_mapping.is_deleted'=>0,
                                  ),   

                );

                $sent_row=$this->Crud_model->commonGet($option);
                    // Set the response and exit
                        $this->response([
                              "status" => TRUE,
                              "message" => "Message Sent Successfully.",
                              "data"=>$sent_row,
                              // "grp_members"=>$grp_members,
                         
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



    public function sendSeenReceiptToSenderForGroupChat_post($group_id=''){
         $group_id = $this->security->xss_clean($this->post("group_id"));
      
    }


    public function sendDeliveryReceiptToSenderForGroup_post($message_id=''){
      $group_message_id = $this->security->xss_clean($this->post("group_message_id")); 

      $con['conditions']=array(
        'is_sent'=>1,
        'is_active'   => 1,
        'is_deleted'=>0,
        'group_messages_id'=> $group_message_id,
      );
      if($groups_row=$this->Crud_model->getRows('group_messages',$con,'row')){
      
        $prev_delivered_to_array=json_decode($groups_row->delivered_to);
     
        foreach ($prev_delivered_to_array as $prev_delivered_to_array_key => $prev_delivered_to_array_value) {

            if ($prev_delivered_to_array_value->user_id==$this->session->userdata('id') && $prev_delivered_to_array_value->is_delivered==0) {

                    $prev_delivered_to_array_value->is_delivered = 1;
                    $prev_delivered_to_array_value->delivery_time=date('Y-m-d H:i:s');
                    $prev_delivered_to_array_value->user_id      =$value->user_id;
             
               }

        }

        $array_update=array(
            'delivered_to'=>json_encode($prev_delivered_to_array)
        );    

        if($u_row=$this->Crud_model->update($this->table,$array_update,$con)){
                 $this->response([
                              "status" => TRUE,
                              "message" => "Message Delivered Successfully.",
                              "data"=>$u_row,
                              // "grp_members"=>$grp_members,
                         
                          ], REST_Controller::HTTP_OK );
        }
        else{

            $this->response([
                          'status' => FALSE,
                          "message" => "Please Fill Complete Information."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }


      }
                  
    }   



}


?>