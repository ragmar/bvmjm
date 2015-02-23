<div class="subfields index">
	<h2><?php __('Subfields');?></h2>
	<table>
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('field_id');?></th>
		<th><?php echo $this->Paginator->sort('code');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<th><?php echo $this->Paginator->sort('description');?></th>
		<th><?php echo $this->Paginator->sort('repeatable');?></th>
		<th><?php echo $this->Paginator->sort('mandatory');?></th>
		<!-- <th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th> -->
		<th class="actions"><?php //__('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($subfields as $subfield):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $subfield['Subfield']['id']; ?>&nbsp;</td> -->
		<td>
			<?php echo $this->Html->link($subfield['Field']['name'], array('controller' => 'fields', 'action' => 'view', $subfield['Field']['id'])); ?>
		</td>
		<td><?php echo $subfield['Subfield']['code']; ?>&nbsp;</td>
		<td><?php echo $subfield['Subfield']['name']; ?>&nbsp;</td>
		<td><?php echo $subfield['Subfield']['description']; ?>&nbsp;</td>
		<td><?php echo $subfield['Subfield']['repeatable']; ?>&nbsp;</td>
		<td><?php echo $subfield['Subfield']['mandatory']; ?>&nbsp;</td>
		<!-- <td><?php echo $subfield['Subfield']['created']; ?>&nbsp;</td>
		<td><?php echo $subfield['Subfield']['modified']; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $subfield['Subfield']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $subfield['Subfield']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $subfield['Subfield']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subfield['Subfield']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Subfield', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Fields', true), array('controller' => 'fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field', true), array('controller' => 'fields', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
	</ul>
</div>