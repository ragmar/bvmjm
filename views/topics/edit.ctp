<div style="padding-left: 50px; padding-right: 50px;">

<div class="topics form">
<?php echo $this->Form->create('Topic');?>
	<fieldset>
		<legend><?php __('Edit Topic'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions" style="height: 350px;">
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<br />
	<ul>
		<!-- <li><?php //echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li> -->
		<li><?php echo $this->Html->link(__('List Topics', true), array('action' => 'index'));?></li>
		<!-- <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Topic.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Topic.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>