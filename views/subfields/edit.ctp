<div class="subfields form">
<?php echo $this->Form->create('Subfield');?>
	<fieldset>
		<legend><?php __('Edit Subfield'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('field_id');
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('repeatable');
		echo $this->Form->input('mandatory');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Subfield.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Subfield.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Subfields', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Fields', true), array('controller' => 'fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field', true), array('controller' => 'fields', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
	</ul>
</div>