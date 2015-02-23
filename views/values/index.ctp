<div class="values index">
	<h2><?php __('Values');?></h2>
	<table>
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('value');?></th>
		<th><?php echo $this->Paginator->sort('subfield_id');?></th>
		<th><?php echo $this->Paginator->sort('item_id');?></th>
		<!-- <th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th> -->
		<th class="actions"><?php //__('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($values as $value):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $value['Value']['id']; ?>&nbsp;</td> -->
		<td><?php echo $value['Value']['value']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($value['Subfield']['name'], array('controller' => 'subfields', 'action' => 'view', $value['Subfield']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($value['Item']['title'], array('controller' => 'items', 'action' => 'view', $value['Item']['id'])); ?>
		</td>
		<!-- <td><?php echo $value['Value']['created']; ?>&nbsp;</td>
		<td><?php echo $value['Value']['modified']; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $value['Value']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $value['Value']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $value['Value']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $value['Value']['id'])); ?>
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
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<ul>
		<li><?php echo $this->Html->link(__('New Value', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Subfields', true), array('controller' => 'subfields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subfield', true), array('controller' => 'subfields', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>