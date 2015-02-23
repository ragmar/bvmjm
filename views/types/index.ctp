<div style="padding-left: 50px; padding-right: 50px;">

<div class="types index">
	<h2><?php __('Types');?></h2>
	<table>
	<tr>
		<!-- <th><?php echo $this->Paginator->sort('id');?></th> -->
		<th><?php echo $this->Paginator->sort('name');?></th>
		<!-- <th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th> -->
		<th class="actions"><?php //__('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($types as $type):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<!-- <td><?php echo $type['Type']['id']; ?>&nbsp;</td> -->
		<td><?php echo $type['Type']['name']; ?>&nbsp;</td>
		<!-- <td><?php echo $type['Type']['created']; ?>&nbsp;</td>
		<td><?php echo $type['Type']['modified']; ?>&nbsp;</td> -->
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $type['Type']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $type['Type']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $type['Type']['id']), null, sprintf(__('Desea eliminar el tipo %s?', true), $type['Type']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<!-- <p style="text-align: center;">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p> -->

	<?php if ($this->Paginator->params['paging']['Type']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<div class="actions" style="height: 350px;">
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<br />
	<ul>
		<!-- <li><?php //echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li> -->
		<li><?php echo $this->Html->link(__('New Type', true), array('action' => 'add')); ?></li>
		<!-- <li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>