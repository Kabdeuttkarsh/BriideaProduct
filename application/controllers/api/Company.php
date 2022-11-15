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

}



?>