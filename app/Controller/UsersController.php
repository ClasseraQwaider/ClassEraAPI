<?php

// Controller/UsersController.php
//App::import('Sanitize');

class UsersController extends AppController {
    public $components = array('RequestHandler');
    public $uses = array('Licenses','Users');


    public function add()
    {
        $this->render(false);

        $message=$status=$code=$user_id='';

        if ($this->request->is('post')) {

            $user = $this->Licenses->find('all');
            //pr($this->data);//pr($this->request->data);

           
            $UsersData = $LicensesData = $this->data;
            unset($UsersData['license_id']);
             /*check if all data are sent*/
            if(!isset($LicensesData['device_id']) || !isset($LicensesData['user_name']) || !isset($LicensesData['email'])){
                $message='Data Missing';
                $status='false';
                $code='404';
            }
            else{
                //check existance
                $exist = $this->Licenses->find('count',array('conditions' => $LicensesData) );

                if($exist){//already exist
                    $message='already exist';
                    $status='false';
                    $code='404';
                }
                else {
                    if ($this->Users->save($UsersData)){
                        $usersRes = $this->Users->find('first',array('fields' => 'user_id','conditions' => $UsersData))['Users'];
                        //pr($usersRes);echo "*****";

                        $LicensesData['user_id']=$usersRes['user_id'];
                        $this->Licenses->save($LicensesData);
                        $message='Inserted Successfully';
                        $status='true';
                        $code='200';
                        $user_id=$LicensesData['user_id'];
                    }
                }
            //$log = $this->Licenses->getDataSource()->getLog(false, false);debug($log); //die;
            }
        }

        //$this->set('user', $user);

        $this->response->type('json');
        $json_body = json_encode(array( 
                        "message"=>$message, 
                        "status"=>$status, 
                        "code"=>$code,
                        'user_id'=>$user_id
                       ));
        $this->response->body($json_body);

    }//FUNCTION

    

       

}
