<div class="itemsAuthors index">
	<h2><?php __('Items Authors');?></h2>
	<table>
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('item_id');?></th>
		<th><?php echo $this->Paginator->sort('author_id');?></th>
		<th><?php echo $this->Paginator->sort('principal');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($itemsAuthors as $itemsAuthor):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $itemsAuthor['ItemsAuthor']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($itemsAuthor['Item']['title'], array('controller' => 'items', 'action' => 'view', $itemsAuthor['Item']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($itemsAuthor['Author']['name'], array('controller' => 'authors', 'action' => 'view', $itemsAuthor['Author']['id'])); ?>
		</td>
		<td><?php echo $itemsAuthor['ItemsAuthor']['principal']; ?>&nbsp;</td>
		<td><?php echo $itemsAuthor['ItemsAuthor']['created']; ?>&nbsp;</td>
		<td><?php echo $itemsAuthor['ItemsAuthor']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $itemsAuthor['ItemsAuthor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $itemsAuthor['ItemsAuthor']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $itemsAuthor['ItemsAuthor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $itemsAuthor['ItemsAuthor']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Items Author', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
	</ul>
</div>