<?php
class Comment extends AppModel {


	public function getCommentsOnSubject($params){

		$conditions = array();
		if (!empty($params['subject_id'])) $conditions['subject_id'] = $params['subject_id'];
		if (!empty($params['user_id'])) $conditions['user_id'] = $params['user_id'];
		
		return $this->find('all', array(
                                        'conditions' => $conditions,
                                        'fields' => array('id', 'subject_id', 'user_id', 'body' ),
                                        'order' => array('id', 'user_id' )
                                       ));
	}


	public function isOwendBy($id, $user_id) {

		return $this->field('id', array('user_id' => $user_id)) !== false;

	}
}
