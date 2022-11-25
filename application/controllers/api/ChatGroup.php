<?php
require APPPATH.'libraries/REST_Controller.php';


class ChatGroup extends REST_Controller{
    public function __construct() {
        parent::__construct();
        $this->table ='chat_groups';
    }

    

    public function showCompanyAllChatGroup_get($value='')
    {
        // code...
        

        $option = array(
             'select' => 'users.*, chat_groups.*,company.*',
            'table' =>'chat_groups',

            'join' => array(array('company' => 'company.id = chat_groups.company_id','users' => 'users.id = chat_groups.created_by')),
            'where' =>array('chat_groups.is_active' => 1,'chat_groups.is_deleted' => 0,'chat_groups.company_id' => $this->session->userdata('company_id')),
        
        );
        $chatGroup_row=$this->Crud_model->commonGet($option);

           if($chatGroup_row){

              $this->response([
                              "status" => TRUE,
                              "message" => "Chat Groups Loaded Successfully.",
                              "data"=>$chatGroup_row
                          ], REST_Controller::HTTP_OK); 
           }
           else{
             $this->response([
                          'status' => FALSE,
                          "message" => "Chat Groups Not Found.Please add some groups."],
                          REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
           }
    }

    public function insert_post($value='')
  
    {
        # code...
        $chat_group_name = $this->security->xss_clean($this->post("chat_group_name"));
        $group_description = $this->security->xss_clean($this->post("group_description"));
        $group_members = $this->security->xss_clean($this->post("group_members"));
        

        if (!empty($chat_group_name) && !empty($group_description) && !empty($group_members))  {
 
                 $data = array(
                  'chat_group_name' => $chat_group_name,
                  'group_description' => $group_description,
                  'company_id'=>$this->session->userdata('company_id'),
                  'created_by'=>$this->session->userdata('id'),
              );
             
             if($branches_row=$this->Crud_model->insert($this->table,$data)){
                                  // Set the response and exit3
                        for ($i=0; $i < count($group_members); $i++) { 
                            // code...
                         $grop_mem_data = array(

                              'group_id' => $branches_row,
                              'user_id' => $group_members[$i],
                              'company_id'=>$this->session->userdata('company_id'),
                              'added_by'=>$this->session->userdata('id'),
                             );
                          $grop_map_row=$this->Crud_model->insert('group_user_mapping',$grop_mem_data);

                
                      }

                       $grop_mem_data = array(

                              'group_id' => $branches_row,
                              'user_id' => $this->session->userdata('id'),
                              'company_id'=>$this->session->userdata('company_id'),
                              'added_by'=>$this->session->userdata('id'),
                             );
                        
                         $grop_map_row=$this->Crud_model->insert('group_user_mapping',$grop_mem_data);

                      if($grop_map_row){
                       

                            $this->response([
                              "status" => TRUE,
                              "message" => "Group and Members Added successfully.",
                              "data"=>$branches_row
                          ], REST_Controller::HTTP_OK);
                        }

                       else{

                         $this->response([
                            "status" => TRUE,
                            "message" => "Group Added successfully But Failed Adding Member.",
                            "data"=>$branches_row
                          ], REST_Controller::HTTP_OK);
                      }

                    }

                      else{
                          // Set the response and exit
                        $this->response([
                              'status' => FALSE,
                              "message" => "Group not Added ."],
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

    public function showGroupListforChat_get($value='')
    {
        
        if($this->session->userdata('email')){

         $option = array(
            'select' => 'chat_groups.*,group_user_mapping.*',
            
            'table' =>'chat_groups',

            'join' => array( array('group_user_mapping' => 'group_user_mapping.group_id = chat_groups.group_id')
                ),
            
            'where' =>array('chat_groups.is_deleted' => 0,'chat_groups.is_active' => 1,'chat_groups.company_id' => $this->session->userdata('company_id'),'group_user_mapping.user_id' => $this->session->userdata('id')),
            );
        
            if(!empty($chatGroup_row=$this->Crud_model->commonGet($option))){
                    if(!empty($returnedArray=$this->Crud_model->loadGroupsForChat())){

               
                                  $this->response([
                                      "status" => TRUE,
                                      "message" => "Group Found for chatting.",
                                      "data"=>$returnedArray,
                                      "new_group"=>$chatGroup_row,

                                  ], REST_Controller::HTTP_OK);

                    }
                    else{
                           $this->response([
                                      "status" => TRUE,
                                      "message" => "Group Found for chatting.",
                                      "data"=>NULL,
                                      "new_group"=>$chatGroup_row,

                                  ], REST_Controller::HTTP_OK);
                    }

            }

            else{

                 $this->response([
                          'status' => FALSE,
                          "data"=>NULL,
                          "new_group"=>NULL,
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

}



?>