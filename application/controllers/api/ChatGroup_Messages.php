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

            else {
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
                  
                 if($value->user_id!=$this->session->userdata('id')){

                      $datasd = array(
                        'is_delivered' => 0,
                        'delivery_time'=>NULL,
                        'user_id'=>$value->user_id,
                      );

                      $dataseen = array(
                        'is_seen' => 0,
                        'seen_time'=>NULL,
                        'user_id'=>$value->user_id,
                      );
                  
                 }
                 
                 else{

                      $datasd = array(
                        'is_delivered' => 1,
                        'delivery_time'=>date('Y-m-d H:i:s'),
                        'user_id'=>$value->user_id,
                      );

                      $dataseen = array(
                       'is_seen' => 1,
                       'seen_time'=>date('Y-m-d H:i:s'),
                        'user_id'=>$value->user_id,
                      );
            
                 }
                 
                  $delivery_to_array[]=$datasd;

             
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
                
                  //Moving Delivery Status of Message from Temporary table to Main

                    $conTemp['conditions']=array(
                        'group_id'=>$grp_id
                    );

                    if($checkOldDelivery = $this->Crud_model->getRows('delivery_temp_table',$conTemp,'result')){

                        foreach ($checkOldDelivery as $checkOldDelivery_key => $checkOldDelivery_value) {
                          
                            $conGroupMess['conditions']=array(
                               'group_messages_id'=>$checkOldDelivery_value->group_message_id
                            );

                             if($GroupTrack=$this->Crud_model->getRows('group_messages',$conGroupMess,'row')){

                                $delivered_to=json_decode($GroupTrack->delivered_to);

                                foreach ($delivered_to as $delivered_tokey => $delivered_tovalue) {

                                        if($delivered_tovalue->user_id==$checkOldDelivery_value->user_id && $delivered_tovalue->is_delivered==0){
                                              
                                            $delivered_tovalue->is_delivered=1;
                                            $delivered_tovalue->delivery_time=$checkOldDelivery_value->time;
                                                       
                                        }

                                }

                                $dataToUpdate=array(
                                    'delivered_to'=>json_encode($delivered_to)
                                );

                               if($this->Crud_model->update('group_messages',$dataToUpdate,$conGroupMess)){

                                     $conDelete['conditions']=array(
                                      'temp_table_id'=>$checkOldDelivery_value->temp_table_id,
                                    
                                  );
                                     $this->Crud_model->delete('delivery_temp_table',$conDelete);

                               }

                             }

                        }

                    }
                        

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

      $conGroupMess['conditions']=array(
        'group_id'=>$group_id,
        'is_active'=>1,
        'is_deleted'=>0,
        'is_sent'=>1,

      );
       
        if($GroupTrack=$this->Crud_model->getRows('group_messages',$conGroupMess,'result')){

            foreach ($GroupTrack as $key => $value) {

                $seen_by=json_decode($value->seen_by);
                
                foreach ($seen_by as $seen_by_key => $seen_by_value) {
                   if($seen_by_value->is_seen==0 && $seen_by_value->user_id==$this->session->userdata('id')){
                        $seen_by_value->is_seen=1;
                        $seen_by_value->seen_time=date('Y-m-d H:i:s');
                   }
                }

             
                $conUpdate['conditions']=array(
                        'group_id'=>$group_id,
                        'is_active'=>1,
                        'is_deleted'=>0,
                        'is_sent'=>1,
                        'group_messages_id'=>$value->group_messages_id,
                );
                $data=array('seen_by'=>json_encode($seen_by));
                $update_status=$this->Crud_model->update('group_messages',$data,$conUpdate);  
            }


        }

        if($update_status){

                        $this->response([
                              "status" => TRUE,
                              "message" => "Message Seen Successfully.",
                              "data"=>$update_status,
                          
                          ], REST_Controller::HTTP_OK );
                
                      }
                      else{
                          // Set the response and exit
                        $this->response([
                              'status' => FALSE,
                              "message" => "Message not Seen."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                          
                      }
              
    }



    public function sendDeliveryReceiptToSenderForGroup_post($message_id=''){

      $group_message_id = $this->security->xss_clean($this->post("group_message_id"));
      $grp_id = $this->security->xss_clean($this->post("grp_id"));
      $user_id = $this->security->xss_clean($this->post("user_id"));
      
      $dataas = array(
                    'group_message_id' => $group_message_id,
                    'user_id' => $user_id,
                    'group_id' => $grp_id,
                    'time'=>date('Y-m-d H:i:s')
                    );
          if($u_row=$this->Crud_model->insert('delivery_temp_table',$dataas)){

                 $this->response([
                            "status" => TRUE,
                            "message" => "Message Delivered Successfully.",
                            "data"=>$u_row,
                        ], REST_Controller::HTTP_OK );
          }

          else{
                $this->response([
                              'status' => FALSE,
                              "message" => "Please Fill Complete Information."],
                              REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           
          }

     
      }

   public function checkForNewGroupMessages_get($value='')
   
    {  
        
       if($this->session->userdata('email')){
   
        $option = array(
            'select' => 'users.*, chat_groups.*,company.*',
            'table' =>'chat_groups',

            'join' => array(array('company' => 'company.id = chat_groups.company_id','users' => 'users.id = chat_groups.created_by')),
            'where' =>array('chat_groups.is_active' => 1,'chat_groups.is_deleted' => 0,'chat_groups.company_id' => $this->session->userdata('company_id')),
        
        );


        if($chatGroup_row=$this->Crud_model->commonGet($option)){
           
            foreach ($chatGroup_row as $chatGroup_row_key => $chatGroup_row_value) {
              $option1 = array(
                
                'select' => 'group_messages.*',
                'table' =>'group_messages',
                'where' =>array('group_messages.is_active' => 1,'group_messages.is_deleted' => 0,'group_messages.group_id' => $chatGroup_row_value->group_id),
                'single'=>TRUE,
                'order'=>array('group_messages_id'=>'DESC')
            
            );

            if($chatGroup_row1=$this->Crud_model->commonGet($option1)){

                   $chatGroup_row_value->group_messages_id=$chatGroup_row1->group_messages_id;

                $con['conditions']=array(
                    'group_message_id'=>$chatGroup_row_value->group_messages_id,
                    'user_id'=>$this->session->userdata('id'),
                    'group_id'=>$chatGroup_row_value->group_id
                );

                if($groups_recent_msg=$this->Crud_model->getRows('delivery_temp_table',$con,'row')){

                }

            else{

                 $dataas = array(
                    'group_message_id' =>  $chatGroup_row1->group_messages_id,
                    'user_id' => $this->session->userdata('id'),
                    'group_id' => $chatGroup_row_value->group_id,
                    'time'=>date('Y-m-d H:i:s')
                  );

                  $u_row=$this->Crud_model->insert('delivery_temp_table',$dataas);

                 }
                }
        

            }
          
             if($u_row){

                         $this->response([
                                    "status" => TRUE,
                                    "message" => "Message Delivered Successfully.",
                                    "data"=>$u_row,
                                ], REST_Controller::HTTP_OK );
                  }

                  else{
                        $this->response([
                                      'status' => FALSE,
                                      "message" => "No New Messages."],
                                      REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
                   
                  }

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