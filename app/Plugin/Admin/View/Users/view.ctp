<?php
//echo "<pre>";print_r($users);
?>
<h1>Blog posts</h1>
<?php echo $this->Html->link('Add User',array('action'=>'add'));?>
<table>
	<tr>
		<th>Id</th>
		<th>UserName</th>
		<th>Role</th>
		<th>Actions</th>
		<th>Created</th>
	</tr>
<!-- Here is where we loop through our $users array, printing out post info -->
<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['id']; ?></td>
		<td>
		<?php echo $this->Html->link($user['User']['username'],
		array('controller' => 'posts', 'action' => 'view', $user['User']['id'])); ?>
		</td>
		<td>
		  <?php echo $user['User']['role'];?>
		</td>
		<td>
		<?php echo $this->Html->link('Edit',
		array('controller' => 'posts', 'action' => 'edit', $user['User']['id'])); ?>
		<?php
			echo $this->Form->postLink(
				'Delete',
				array('action'=>"delete",$user['User']['id']),
				array('confirm'=>'Are you sure?')
				
			);
		?>
		</td>
		<td><?php echo $user['User']['created']; ?></td>
	</tr>
<?php endforeach; ?>
<?php unset($user); ?>
</table>