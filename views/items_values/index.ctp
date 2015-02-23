<div class="itemsValues index">
	<h2><?php __('Items Values');?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('item_id');?></th>
			<th><?php echo $this->Paginator->sort('value_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($itemsValues as $itemsValue):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $itemsValue['ItemsValue']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($itemsValue['Item']['title'], array('controller' => 'items', 'action' => 'view', $itemsValue['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($itemsValue['Value']['id'], array('controller' => 'values', 'action' => 'view', $itemsValue['Value']['id'])); ?>
		</td>
		<td><?php echo $itemsValue['ItemsValue']['created']; ?>&nbsp;</td>
		<td><?php echo $itemsValue['ItemsValue']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $itemsValue['ItemsValue']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $itemsValue['ItemsValue']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $itemsValue['ItemsValue']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsValue['ItemsValue']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Items Value', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
	</ul>
</div>