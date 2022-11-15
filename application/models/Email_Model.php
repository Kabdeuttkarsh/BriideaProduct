<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Email_Model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
        function use_mails($email = '',$subject='',$message='')
            {
               

                $config['protocol']    = 'smtp';
                $config['smtp_host']    = 'ssl://smtp.gmail.com';
                $config['smtp_port']    = '465';
                $config['smtp_timeout'] = '7';
                $config['smtp_user']    = 'uttkarshkabde81@gmail.com';
                $config['smtp_pass']    = 'shabdtrslmecblyu';
                $config['charset']    = 'utf-8';
                $config['newline']    = "\r\n";
                $config['mailtype'] = 'text'; // or html
                $config['validation'] = TRUE; // bool whether to validate email or not      

                $this->email->initialize($config);
	     

                $this->email->from('uttkarshkabde81@gmail.com', 'Briidea Slack');
                $this->email->to($email); 

                $this->email->subject($subject);
                $this->email->message($message);  

    // $this->email->send();
            
                  if($result = $this->email->send()){
                       return $result;
                  }
                  else{
                    return false;
                   
                  }
        
    }
    
    
    
}