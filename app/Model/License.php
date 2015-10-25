<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class License extends AppModel {

  public $name = 'License';
		// call db to check the data exist
		// return true OR false
public function GetLicense($device_id,$user_name,$email)
{
      
     return $this->set('count',$this->find('count', array('conditions'=>  array('License.device_id'=>$device_id,'License.user_name'=>$user_name,'License.email'=>$email))));
     
}

public function GenerateLicense($string_rand){
//create function generate Licenes id{ salt-> ra7 ya5od device_id,$user_name,$email bl 2dafa la 2she 2smo time stamp=>"be36e al cureent time ll request"}

    return md5 ( $string_rand,true );
}


}