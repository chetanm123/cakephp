<?php
class AdminAppController extends Controller
{
	public $components = array(
		'Session',
		'Auth'=>array(
				'loginRedirect'=>array(
					'controller'=>'posts',
					'action'=>'index'
				),
				'logoutRedirect'=>array(
					'controller'=>'pages',
					'action'=>'display',
					'home'
				),
				'authorize'=>array('Controller'),
				'authenticate'=>array(
					'Form'=>array(
						'passwordHasher'=>'Blowfish'
					)
				)
			),
		'Cookie'
		);

	

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view');
		$this->set('logged_in',$this->Auth->login());
		$this->set('current_user',$this->Auth->user());
	}

	public function isAuthorized($user){
		//Admin can access every action
		if(isset($user['role']) && $user['role']==='admin'){
			return true;
		}
		return false;
	}
}
?>