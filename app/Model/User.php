<?php
	App::uses('AppModel','Model');
	//App::uses('BlowfishPasswordHasher','Controller/Component/Auth');

	class User extends AppModel{
		 /*public $validate = array(
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
		);*/
		public $validate= array(
				'username'=>array(
					array(
						'rule'=>'notEmpty',
						'message'=>'Username cannot be emptys'
					),
					array(
						'rule'=>'isUnique',
						'message'=>'This username already taken'
					)
				),
				'password'=>array(
					array(
						'rule'=>'notEmpty',
						'message'=>"password cannot be empty"
					),
					array(
						'rule'=>array('minLength',4),
						'message'=>'Must be atleast 4 charachters'
					),
					array(
						'rule'=>array('passCompare'),
						'message'=>'The passwords dont match'
					)
				)
			);

		/*public function beforeSave($options=array()){
			if(isset($this->data[$this->alias]['password'])){
				$passwordHasher= new BlowfishPasswordHasher();
				$this->data[$this->alias]['password']= $passwordHasher->hash($this->data[$this->alias]['password']);
			}
			return true;
		}*/
		public function passCompare(){
			return ($this->data[$this->alias]['password']===$this->data[$this->alias]['password_confirm']);
		}

		public function beforeSave(){
			$this->data['User']['password']=AuthComponent::password($this->data['User']['password']);
			return true;
		}
	}
?>