<?php
class AdminAppController extends AppController
{
	public $components=array(
		'Session',
		'Auth'=>array(
				'authorize'=>array('Plugin')
			)
		);
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
}
?>