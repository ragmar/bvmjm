<div class="indicators form">
<?php echo $this->Form->create('Indicator');?>
	<fieldset>
		<legend><?php __('Edit Indicator'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('value');
		echo $this->Form->input('description');
		echo $this->Form->input('type');
		echo $this->Form->input('field_id');
		echo $this->Form->input('Item');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Indicator.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Indicator.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Fields', true), array('controller' => 'fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field', true), array('controller' => 'fields', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>