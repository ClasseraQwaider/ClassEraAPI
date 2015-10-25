<?php
App::uses('AppController','Controller'); 
//App::uses('HttpSocket','Network/Http');

class LicensesController extends AppController {


	public $commponents= array('Security','RequestHandler');
	public $helpers= array('Html','Form');

	public function Index(){

  
   }
 
      

public function Check(){

  
  $this->render(false);
 
 
  $device_id = $this->request->data['device_id']; 

  $user_name = $this->request->data['user_name'];
  
  $email = $this->request->data['email'];
  
    if($device_id == '' || $user_name == '' || $email == ''){ 

        $message = "device  is not defined!";
    
     } 

   $count = $this->License->GetLicense($device_id,$user_name,$email);

  if($count['License']['count'] == 0)
  {
    $message = "user is not defined!";
    $code = '400';
    

  }else
  {
    $message = "user is licensed";
    $code = "202";
  }


  $this->response->type('json');
      $json_body = json_encode(array(
                'message'=>$message,
                'code'=>$code,
                'status'=> $count['License']['count'] != 0 ? "true" : "false")
               
          );
  $this->response->body($json_body);

  }



  public function GenerateLicense(){

    $this->render(false);
   
   $time=localtime(time(),true);
  

    $randString=$this->request->data['device_id'].
    $this->request->data['user_name'].
    $this->request->data['email'];
    
    
 return $this->License->GenerateLicense($randString,$time);

   
  }

}