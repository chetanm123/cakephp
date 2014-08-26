<!--app/View/Users/login.ctp-->
<div class='users form'>
	<!--<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend>
			<?php echo __('Please enter your username and password'); ?>
		</legend>
		<?php 
			echo $this->Form->input('username');
			echo $this->Form->input('password');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Login'));?>-->
	<?php
		echo $this->Session->flash('auth');
		echo $this->Form->create('User');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->end('Submit');
		echo $this->Html->link('Don\'t have an account? Register now!',array(
			'controller'=>'users','action'=>'add'));
	?>
</div>