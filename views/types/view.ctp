<?php
echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');
//echo $this->Html->css('website-assets/website');
?>&nbsp;
<div style="padding-left: 50px; padding-right: 50px;">
<div class="types view">
<h2><?php  __('Type');?></h2>
	<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $type['Type']['id']; ?>
			&nbsp;
		</dd> -->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $type['Type']['name']; ?>
			&nbsp;
		</dd>
		<!--
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $type['Type']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $type['Type']['modified']); ?>
			&nbsp;
		</dd>
		-->
	</dl>
</div>
<div class="actions">
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<br />
	<ul>
		<!-- <li><?php //echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li> -->
		<li><?php echo $this->Html->link(__('List Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Type', true), array('action' => 'edit', $type['Type']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Type', true), array('action' => 'delete', $type['Type']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $type['Type']['name'])); ?> </li>
		<!-- <li><?php echo $this->Html->link(__('List Items', true), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
<div class="related">
	<h3 style="text-align: center"><?php __('Works');?></h3>
	<?php if (!empty($type['Item'])):?>
	<table>
	<tr>
		<!-- <th><?php __('Id'); ?></th>
		<th><?php __('User Id'); ?></th> -->
		<th><?php __('Cover'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Author'); ?></th>
		<!-- <th><?php __('Type'); ?></th> -->
		<th><?php __('Topic'); ?></th>
		<!-- <th><?php __('Titleunif'); ?></th>
		<th><?php __('Publisher'); ?></th>
		<th><?php __('Place'); ?></th> -->
		<th><?php __('Year'); ?></th>
		<!-- <th><?php __('Description'); ?></th>
		<th><?php __('Dedicatory'); ?></th>
		<th><?php __('File'); ?></th> -->
		<!--
		<th><?php __('Published'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th><?php __('Number Editor 028'); ?></th>
		<th><?php __('028 A'); ?></th>
		<th><?php __('040 A'); ?></th>
		<th><?php __('041 A'); ?></th>
		<th><?php __('041 B'); ?></th>
		<th><?php __('041 H'); ?></th>
		<th><?php __('044 A'); ?></th>
		<th><?php __('082 A'); ?></th>
		<th><?php __('082 B'); ?></th>
		<th><?php __('092 A'); ?></th>
		<th><?php __('100 A'); ?></th>
		<th><?php __('100 B'); ?></th>
		<th><?php __('100 C'); ?></th>
		<th><?php __('100 D'); ?></th>
		<th><?php __('110 A'); ?></th>
		<th><?php __('110 B'); ?></th>
		<th><?php __('110 C'); ?></th>
		<th><?php __('130 A'); ?></th>
		<th><?php __('240 A'); ?></th>
		<th><?php __('245 A'); ?></th>
		<th><?php __('245 B'); ?></th>
		<th><?php __('245 C'); ?></th>
		<th><?php __('245 H'); ?></th>
		<th><?php __('246 A'); ?></th>
		<th><?php __('246 I'); ?></th>
		<th><?php __('250 A'); ?></th>
		<th><?php __('260 A'); ?></th>
		<th><?php __('260 B'); ?></th>
		<th><?php __('260 C'); ?></th>
		<th><?php __('300 A'); ?></th>
		<th><?php __('300 B'); ?></th>
		<th><?php __('300 C'); ?></th>
		<th><?php __('300 E'); ?></th>
		<th><?php __('490 A'); ?></th>
		<th><?php __('490 V'); ?></th>
		<th><?php __('490 X'); ?></th>
		<th><?php __('500 A 1'); ?></th>
		<th><?php __('501 A'); ?></th>
		<th><?php __('504 A'); ?></th>
		<th><?php __('504 B'); ?></th>
		<th><?php __('505 A'); ?></th>
		<th><?php __('510 A'); ?></th>
		<th><?php __('510 C'); ?></th>
		<th><?php __('518 A'); ?></th>
		<th><?php __('520 A'); ?></th>
		<th><?php __('534 A'); ?></th>
		<th><?php __('534 C'); ?></th>
		<th><?php __('534 L'); ?></th>
		<th><?php __('534 P'); ?></th>
		<th><?php __('546 A'); ?></th>
		<th><?php __('561 A'); ?></th>
		<th><?php __('600 A'); ?></th>
		<th><?php __('600 D'); ?></th>
		<th><?php __('610 A'); ?></th>
		<th><?php __('610 B'); ?></th>
		<th><?php __('650 A'); ?></th>
		<th><?php __('650 X'); ?></th>
		<th><?php __('651 A'); ?></th>
		<th><?php __('651 X'); ?></th>
		<th><?php __('653 A'); ?></th>
		<th><?php __('700 A'); ?></th>
		<th><?php __('700 D'); ?></th>
		<th><?php __('700 E'); ?></th>
		<th><?php __('710 A'); ?></th>
		<th><?php __('710 B'); ?></th>
		<th><?php __('740 A'); ?></th>
		<th><?php __('800 A'); ?></th>
		<th><?php __('800 D'); ?></th>
		<th><?php __('800 T'); ?></th>
		<th><?php __('850 A'); ?></th>
		<th><?php __('852 A'); ?></th>
		<th><?php __('852 C'); ?></th>
		<th><?php __('856 A'); ?></th>
		<th><?php __('856 U'); ?></th>
		<th><?php __('020 A'); ?></th>
		<th><?php __('500 A 2'); ?></th>
		<th><?php __('773 A'); ?></th>
		<th><?php __('773 B'); ?></th>
		<th><?php __('773 D'); ?></th>
		<th><?php __('773 G'); ?></th>
		<th><?php __('773 H'); ?></th>
		<th><?php __('773 K'); ?></th>
		<th><?php __('773 N'); ?></th>
		<th><?php __('773 Q'); ?></th>
		<th><?php __('773 T'); ?></th>
		<th><?php __('773 Z'); ?></th>
		<th><?php __('773 7'); ?></th>
		<th><?php __('650 Y'); ?></th>
		-->
		<th class="actions"><?php //__('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($type['Item'] as $item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!--<td><?php echo $item['id'];?></td>
			<td><?php echo $item['user_id'];?></td>-->
			<td>
				<?php
					if (!empty($item['cover_path'])) {
						echo $this->Html->image("/webroot/files/covers/" . $item['cover_path'], array('width' => '50px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true'));
					}
				?>
			</td>
			<td><?php echo $item['title'];?></td>
			<td><?php echo $item['Author']['fullname'];?></td>
			<!-- <td><?php echo $item['Type']['name'];?></td> -->
			<td><?php echo $item['Topic']['name'];?></td>
			<!-- <td><?php echo $item['titleunif'];?></td>
			<td><?php echo $item['publisher'];?></td>
			<td><?php echo $item['place'];?></td> -->
			<td><?php echo $item['year'];?></td>
			<!-- <td><?php echo $item['description'];?></td>
			<td><?php echo $item['dedicatory'];?></td>
			<td><?php echo $item['file'];?></td> -->
			<!--
			<td><?php echo $item['published'];?></td>
			<td><?php echo $item['created'];?></td>
			<td><?php echo $item['modified'];?></td>
			<td><?php echo $item['number_editor_028'];?></td>
			<td><?php echo $item['028_a'];?></td>
			<td><?php echo $item['040_a'];?></td>
			<td><?php echo $item['041_a'];?></td>
			<td><?php echo $item['041_b'];?></td>
			<td><?php echo $item['041_h'];?></td>
			<td><?php echo $item['044_a'];?></td>
			<td><?php echo $item['082_a'];?></td>
			<td><?php echo $item['082_b'];?></td>
			<td><?php echo $item['092_a'];?></td>
			<td><?php echo $item['100_a'];?></td>
			<td><?php echo $item['100_b'];?></td>
			<td><?php echo $item['100_c'];?></td>
			<td><?php echo $item['100_d'];?></td>
			<td><?php echo $item['110_a'];?></td>
			<td><?php echo $item['110_b'];?></td>
			<td><?php echo $item['110_c'];?></td>
			<td><?php echo $item['130_a'];?></td>
			<td><?php echo $item['240_a'];?></td>
			<td><?php echo $item['245_a'];?></td>
			<td><?php echo $item['245_b'];?></td>
			<td><?php echo $item['245_c'];?></td>
			<td><?php echo $item['245_h'];?></td>
			<td><?php echo $item['246_a'];?></td>
			<td><?php echo $item['246_i'];?></td>
			<td><?php echo $item['250_a'];?></td>
			<td><?php echo $item['260_a'];?></td>
			<td><?php echo $item['260_b'];?></td>
			<td><?php echo $item['260_c'];?></td>
			<td><?php echo $item['300_a'];?></td>
			<td><?php echo $item['300_b'];?></td>
			<td><?php echo $item['300_c'];?></td>
			<td><?php echo $item['300_e'];?></td>
			<td><?php echo $item['490_a'];?></td>
			<td><?php echo $item['490_v'];?></td>
			<td><?php echo $item['490_x'];?></td>
			<td><?php echo $item['500_a_1'];?></td>
			<td><?php echo $item['501_a'];?></td>
			<td><?php echo $item['504_a'];?></td>
			<td><?php echo $item['504_b'];?></td>
			<td><?php echo $item['505_a'];?></td>
			<td><?php echo $item['510_a'];?></td>
			<td><?php echo $item['510_c'];?></td>
			<td><?php echo $item['518_a'];?></td>
			<td><?php echo $item['520_a'];?></td>
			<td><?php echo $item['534_a'];?></td>
			<td><?php echo $item['534_c'];?></td>
			<td><?php echo $item['534_l'];?></td>
			<td><?php echo $item['534_p'];?></td>
			<td><?php echo $item['546_a'];?></td>
			<td><?php echo $item['561_a'];?></td>
			<td><?php echo $item['600_a'];?></td>
			<td><?php echo $item['600_d'];?></td>
			<td><?php echo $item['610_a'];?></td>
			<td><?php echo $item['610_b'];?></td>
			<td><?php echo $item['650_a'];?></td>
			<td><?php echo $item['650_x'];?></td>
			<td><?php echo $item['651_a'];?></td>
			<td><?php echo $item['651_x'];?></td>
			<td><?php echo $item['653_a'];?></td>
			<td><?php echo $item['700_a'];?></td>
			<td><?php echo $item['700_d'];?></td>
			<td><?php echo $item['700_e'];?></td>
			<td><?php echo $item['710_a'];?></td>
			<td><?php echo $item['710_b'];?></td>
			<td><?php echo $item['740_a'];?></td>
			<td><?php echo $item['800_a'];?></td>
			<td><?php echo $item['800_d'];?></td>
			<td><?php echo $item['800_t'];?></td>
			<td><?php echo $item['850_a'];?></td>
			<td><?php echo $item['852_a'];?></td>
			<td><?php echo $item['852_c'];?></td>
			<td><?php echo $item['856_a'];?></td>
			<td><?php echo $item['856_u'];?></td>
			<td><?php echo $item['020_a'];?></td>
			<td><?php echo $item['500_a_2'];?></td>
			<td><?php echo $item['773_a'];?></td>
			<td><?php echo $item['773_b'];?></td>
			<td><?php echo $item['773_d'];?></td>
			<td><?php echo $item['773_g'];?></td>
			<td><?php echo $item['773_h'];?></td>
			<td><?php echo $item['773_k'];?></td>
			<td><?php echo $item['773_n'];?></td>
			<td><?php echo $item['773_q'];?></td>
			<td><?php echo $item['773_t'];?></td>
			<td><?php echo $item['773_z'];?></td>
			<td><?php echo $item['773_7'];?></td>
			<td><?php echo $item['650_y'];?></td>
			-->
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'items', 'action' => 'view', $item['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'items', 'action' => 'edit', $item['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'items', 'action' => 'delete', $item['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['title'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<br />
		<ul>
			<li><?php echo $this->Html->link(__('New Item', true), array('controller' => 'items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>