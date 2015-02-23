<div class="indicators index">
	<h2><?php __('Indicators');?></h2>
	<table>
	<tr>
			<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
			<th><?php echo $this->Paginator->sort('value');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('field_id');?></th>
			<!-- <th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th> -->
			<th class="actions"><?php //__('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($indicators as $indicator):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $indicator['Indicator']['id']; ?>&nbsp;</td> -->
		<td><?php echo $indicator['Indicator']['value']; ?>&nbsp;</td>
		<td><?php echo $indicator['Indicator']['description']; ?>&nbsp;</td>
		<td><?php echo $indicator['Indicator']['type']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($indicator['Field']['name'], array('controller' => 'fields', 'action' => 'view', $indicator['Field']['id'])); ?>
		</td>
		<!-- <td><?php echo $indicator['Indicator']['created']; ?>&nbsp;</td>
		<td><?php echo $indicator['Indicator']['modified']; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $indicator['Indicator']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $indicator['Indicator']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $indicator['Indicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $indicator['Indicator']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Indicator', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Fields', true), array('controller' => 'fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field', true), array('controller' => 'fields', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>