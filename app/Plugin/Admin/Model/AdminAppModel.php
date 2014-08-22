<?php
class AdminAppModel extends AppModel{

	App::uses('AppModel','Model');
	App::uses('BlowfishPasswordHasher','Controller/Component/Auth');

	class User extends AppModel{
		 public $validate = array(
			'username' => array(
				'rule' => 'notEmpty',
				'message'=>'Username is required'
			),
			'password' => array(
					'rule' => 'notEmpty'
			),
			'role' => array(
				'valid' => array(
					'rule' => array('inList', array('admin', 'author')),
					'message' => 'Please enter a valid role',
					'allowEmpty' => false
				)
			)
		);

		public function beforeSave($options=array()){
			if(isset($this->data[$this->alias]['password'])){
				$passwordHasher= new BlowfishPasswordHasher();
				$this->data[$this->alias]['password']= $passwordHasher->hash($this->data[$this->alias]['password']);
			}
			return true;
		}
	}

}
?>