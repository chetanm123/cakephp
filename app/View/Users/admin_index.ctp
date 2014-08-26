<?php if (isset($users) && !empty($users)) : ?>
   <?php foreach ($users as $user) : ?>
    <div>
        <?php echo $user['User']['username']; ?>
        <?php
            echo $this->Html->link('Activate', array(
                'controller' => 'users',
                'action' => 'user_activate',
                'admin' => true,
                 $user['User']['id']
            ));
        ?>
        <?php
            echo $this->Html->link('Edit', array(
                'controller' => 'users',
                'action' => 'user_edit',
                'admin' => true,
                 $user['User']['id']
            ));
        ?>
    </div>
   <?php endforeach; ?>
<?php endif; ?>