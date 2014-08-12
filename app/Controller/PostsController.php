<?php
class PostsController extends AppController{
	public $helpers = array('HTML','Form','Session');
	public $component=array(
		'Session',
		'Auth'=>array('className'=>'MyAuth');
		);

	public function index(){
		$this->set('posts',$this->Post->find('all'));
	}

	public function view($id=null){
		if(!$id){
			throw new NotFoundException(__('Invalid Post'));
		}
		$post = $this->Post->findById($id);

		if(!$post){
			throw new NotFoundException(__('Invalid Post')); 
		}
		
		$this->set('post',$post);
	}

	public function add(){
		
		if($this->request->is('post')){
			$this->Post->create();
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash(__('Your post has been saved'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to add your post'));
		}
	}

	public function edit($id=null){
		if(!$id){
			throw new NotFoundException(__('Invalid Post'));
		}
		$post=$this->Post->findById($id);
		if(!$post){
			throw new NotFoundException(__('Invalid Post'));
		}
		if($this->request->is(array("post","put"))){
			$this->Post->id=$id;
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash(__("Your post has been updated"));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__("Unable to update your post"));
		}
		if(!$this->request->data){
			$this->request->data=$post;
		}
	}

	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();
		}
		if($this->Post->delete($id)){
			$this->Session->setFlash(__("The post with id : %s has been deleted.",h($id)));
		}
		return $this->redirect(array('action'=>'index'));
	}

	public function beforeFilter() {
		$this->Auth->authorize = array('controller');
		$this->Auth->loginAction = array(
		'controller' => 'users',
		'action' => 'login'
		);
		$this->Cookie->name = 'CookieMonster';
	}
}
?>