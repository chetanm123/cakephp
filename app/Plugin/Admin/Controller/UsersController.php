<?php
	class UsersController extends AdminAppController{
	
	public function index(){
		$this->User->recursive=0;
		$this->set('users',$this->paginate());
	}
	public function view(){		
		$this->User->recursive=0;
		$this->set('users',$this->paginate());
	}
}
?>