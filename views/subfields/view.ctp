<div class="subfields view">
<h2><?php  __('Subfield');?></h2>
	<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subfield['Subfield']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($subfield['Field']['name'], array('controller' => 'fields', 'action' => 'view', $subfield['Field']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subfield['Subfield']['code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subfield['Subfield']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subfield['Subfield']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Repeatable'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subfield['Subfield']['repeatable']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mandatory'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subfield['Subfield']['mandatory']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subfield['Subfield']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subfield['Subfield']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subfield', true), array('action' => 'edit', $subfield['Subfield']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Subfield', true), array('action' => 'delete', $subfield['Subfield']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subfield['Subfield']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subfields', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subfield', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Fields', true), array('controller' => 'fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field', true), array('controller' => 'fields', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Values');?></h3>
	<?php if (!empty($subfield['Value'])):?>
	<table>
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Subfield Id'); ?></th>
		<th><?php __('Item Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subfield['Value'] as $value):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $value['id'];?></td>
			<td><?php echo $value['value'];?></td>
			<td><?php echo $value['subfield_id'];?></td>
			<td><?php echo $value['item_id'];?></td>
			<td><?php echo $value['created'];?></td>
			<td><?php echo $value['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'values', 'action' => 'view', $value['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'values', 'action' => 'edit', $value['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'values', 'action' => 'delete', $value['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $value['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
