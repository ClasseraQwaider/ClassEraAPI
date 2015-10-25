<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    private $returned_messages = array(
        '200' => 'your Operation Has Been Done Successfully', 
        '201' => '', 
        '202' => '', 
        '203' => 'Your Data has been saved Successfully', 
        '204' => 'Your Data has been Deleted Successfully', 
        '205' => '', 
        
        '404' => 'Lesson Is Not Defined', 
        '405' => 'No comments Are Added On This Lesson!', 
        '406' => 'Unable To Save Your Data', 
        '407' => 'Unable to Complete Delete Operation', 
        '408' => 'You Do Not Have Permission to Complete This Operation', 
        '409' => 'Unable to Update Your Data', 
        '410' => '' 
    );

	
	

    public function beforeFilter() {
      //  $this->request->addDetector('json', ['callback' => [$this, 'isJson']] );

    }

    public function getReturnedMessage($code) {

        return (empty($code))?'':Set::enum($code, $this->returned_messages);

    }


}
