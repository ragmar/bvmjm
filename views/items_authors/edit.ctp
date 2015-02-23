<div class="itemsAuthors form">
<?php echo $this->Form->create('ItemsAuthor');?>
	<fieldset>
		<legend><?php __('Edit Items Author'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('author_id');
		echo $this->Form->input('principal');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ItemsAuthor.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ItemsAuthor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Items Authors', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
	</ul>
</div>