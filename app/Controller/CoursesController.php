<?php

// Controller/CoursesController.php
class CoursesController extends AppController {
    public $components = array('RequestHandler');

    public function Index() {//get All Courses
        $Courses = $this->Course->find('all');

        if (!$Courses) {
            $message = "No Subjects were found!";
            $this->set("message",$message); 
            $this->set("_serialize", array('message'));
            return false;
        }

        foreach($Courses as $data)
            $Courses_Json[]=$data['Course'];//['Courses']:Model Name

        $this->set(array(
            'Courses_Json' => $Courses_Json,
            '_serialize' => array('Courses_Json')
        ));
    }

}