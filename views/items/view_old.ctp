<?php
echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');
echo $this->Html->css('website-assets/website');
echo $this->Html->script('turn');
//echo $this->Html->script('wijmo/jquery.wijmo-open.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo-complete.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo.wijcarousel');
?>
<?php
	$centuries = array(
		'15' => 'XV', 
		'16' => 'XVI', 
		'17' => 'XVII', 
		'18' => 'XVIII', 
		'19' => 'XIX', 
		'20' => 'XX',
		'21' => 'XXI');
?>
<style type="text/css">
body{
	background:#ccc;
}
#magazine{
	width:800px;
	height:600px;
	margin-left: 70px;
}
#magazine .turn-page{
	background-color:#ccc;
	background-size:100% 100%;
}
</style>

<div <?php if ($this->Session->read('Auth.User.group_id') == 1) {echo "class='items view'";} ?>>

<div style="padding-top: 20px;">
	<div style="width: 20%; float: left; text-align: center">
		<?php if (!empty($item['ItemsPicture'])):?>
		<?php echo $this->Html->image("/webroot/attachments/files/big/" . $item['ItemsPicture'][0]['picture_file_path'], array('width' => '120px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true')); ?>
		<?php endif; ?>
		<br />
		<?php if (!empty($item['Item']['item_file_path'])) { ?>
			<?php //debug($_SERVER);//echo $this->Html->link('', '/attachments/files/' . $item['Item']['item_file_path'], array('class' => 'button')); ?>
			<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>" target="_blank"><i class='icon-download-alt'></i> Descargar Archivo</a>
			&nbsp;
		<?php } ?>
	</div>
	<div style="width: 40%; float: left;">
		<dl class="dl-horizontal">
			<dt><?php __('Title'); ?>:</dt>
			<dd>
				<?php echo $item['Item']['title']; ?>
			</dd>
			<dt><?php __('Topic'); ?>:</dt>
			<dd>
				<?php echo $this->Html->link($item['Topic']['name'], array('controller' => 'topics', 'action' => 'view', $item['Topic']['id'])); ?>
			</dd>
			<dt><?php __('Year'); ?>:</dt>
			<dd>
				<?php echo $item['Item']['year']; ?>
			</dd>
			<dt><?php __('Created'); ?>:</dt>
			<dd>
				<?php echo $time->format('d-m-Y', $item['Item']['created']); ?>
			</dd>
			<?php if (!empty($item['Item']['description'])) { ?>
			<dt><?php __('Description'); ?>:</dt>
			<dd>
				<?php echo $item['Item']['description']; ?>
			</dd>
			<?php } ?>
		</dl>
	</div>
	<div style="width: 40%; float: left;">
		<dl class="dl-horizontal">
			<dt><?php __('Author'); ?>:</dt>
			<dd>
				<?php echo $this->Html->link($item['Author']['fullname'], array('controller' => 'authors', 'action' => 'view', $item['Author']['id'])); ?>
			</dd>
			<dt><?php __('Type'); ?>:</dt>
			<dd>
				<?php echo $this->Html->link($item['Type']['name'], array('controller' => 'types', 'action' => 'view', $item['Type']['id'])); ?>
			</dd>
			<dt><?php __('Century'); ?>:</dt>
			<dd>
				<?php if ($item['Item']['year']) {
					// Cálculo de siglo de acuerdo al año.
					if (substr($item['Item']['year'], 2, 2) != "00"){
						//echo $this->Html->link((substr($item['Item']['year'], 0, 2) + 1), array('action' => 'view', $item['Item']['year']));
						echo $centuries[substr($item['Item']['year'], 0, 2) + 1];
					} else {
						//echo $this->Html->link((substr($item['Item']['year'], 0, 2)), array('action' => 'view', $item['Item']['year']));
						echo $centuries[substr($item['Item']['year'], 0, 2)];
					}
				} ?>
			</dd>
			<dt><?php __('Modified'); ?>:</dt>
			<dd>
				<?php echo $time->format('d-m-Y', $item['Item']['modified']); ?>
			</dd>
			<?php if (!empty($item['Item']['dedicatory'])) { ?>
			<dt><?php __('Dedicatory'); ?>:</dt>
			<dd>
				<?php echo $item['Item']['dedicatory']; ?>
			</dd>
			<?php } ?>
		</dl>
	</div>
</div>

<!-- <h2><?php  __('Item');?></h2> -->
	<dl class="dl-horizontal"><?php $i = 0; $class = ' class="altrow"';?>
		<!-- <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['id']; ?>
			&nbsp;
		</dd>
		<?php if (!empty($item['Item']['cover'])) { ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><br /><?php __('Cover'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php //echo $item['Item']['cover']; ?>
			<?php echo $this->Html->image("/webroot/files/covers/" . $item['Item']['cover_path'], array('width' => '80px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true')); ?>
			&nbsp;
		</dd>
		<?php } ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><br /><?php __('Title'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>><br />
			<?php echo $item['Item']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Author'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($item['Author']['fullname'], array('controller' => 'authors', 'action' => 'view', $item['Author']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($item['User']['fullname'], array('controller' => 'users', 'action' => 'view', $item['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Topic'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($item['Topic']['name'], array('controller' => 'topics', 'action' => 'view', $item['Topic']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($item['Type']['name'], array('controller' => 'types', 'action' => 'view', $item['Type']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Titleunif'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['titleunif']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Publisher'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['publisher']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Place'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['place']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Year'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['year']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Century'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if ($item['Item']['year']) {
				// Cálculo de siglo de acuerdo al año.
				if (substr($item['Item']['year'], 2, 2) != "00"){
					//echo $this->Html->link((substr($item['Item']['year'], 0, 2) + 1), array('action' => 'view', $item['Item']['year']));
					echo $centuries[substr($item['Item']['year'], 0, 2) + 1];
				} else {
					//echo $this->Html->link((substr($item['Item']['year'], 0, 2)), array('action' => 'view', $item['Item']['year']));
					echo $centuries[substr($item['Item']['year'], 0, 2)];
				}
			} ?>
			&nbsp;
		</dd>
		<?php if (!empty($item['Item']['description'])) { ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['description']; ?>
			&nbsp;
		</dd>
		<?php } ?>
		<?php if (!empty($item['Item']['dedicatory'])) { ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dedicatory'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['dedicatory']; ?>
			&nbsp;
		</dd>
		<?php } ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Published'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if ($item['Item']['published']){__('Yes');} else {__('No');} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $item['Item']['created']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?>:</dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->format('d-m-Y', $item['Item']['modified']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Number Editor 028'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['number_editor_028']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('028 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['028_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('040 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['040_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('041 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['041_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('041 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['041_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('041 H'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['041_h']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('044 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['044_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('082 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['082_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('082 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['082_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('092 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['092_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('100 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['100_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('100 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['100_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('100 C'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['100_c']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('100 D'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['100_d']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('110 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['110_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('110 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['110_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('110 C'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['110_c']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('130 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['130_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('240 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['240_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('245 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['245_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('245 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['245_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('245 C'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['245_c']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('245 H'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['245_h']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('246 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['246_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('246 I'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['246_i']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('250 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['250_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('260 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['260_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('260 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['260_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('260 C'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['260_c']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('300 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['300_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('300 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['300_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('300 C'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['300_c']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('300 E'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['300_e']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('490 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['490_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('490 V'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['490_v']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('490 X'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['490_x']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('500 A 1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['500_a_1']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('501 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['501_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('504 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['504_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('504 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['504_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('505 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['505_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('510 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['510_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('510 C'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['510_c']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('518 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['518_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('520 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['520_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('534 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['534_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('534 C'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['534_c']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('534 L'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['534_l']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('534 P'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['534_p']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('546 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['546_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('561 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['561_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('600 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['600_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('600 D'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['600_d']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('610 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['610_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('610 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['610_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('650 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['650_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('650 X'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['650_x']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('651 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['651_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('651 X'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['651_x']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('653 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['653_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('700 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['700_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('700 D'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['700_d']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('700 E'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['700_e']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('710 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['710_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('710 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['710_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('740 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['740_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('800 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['800_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('800 D'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['800_d']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('800 T'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['800_t']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('850 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['850_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('852 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['852_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('852 C'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['852_c']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('856 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['856_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('856 U'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['856_u']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('020 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['020_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('500 A 2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['500_a_2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 A'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_a']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 B'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_b']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 D'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_d']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 G'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_g']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 H'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_h']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 K'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_k']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 N'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_n']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 Q'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_q']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 T'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_t']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 Z'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_z']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('773 7'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['773_7']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('650 Y'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $item['Item']['650_y']; ?>
			&nbsp;
		</dd>
		-->
	</dl>
	<?php //debug($this->Session->read('Auth')); ?>
</div>

<?php //echo $this->Html->link(__('Subir Imágenes de la Obra.', true), array('controller' => 'items_pictures', 'action' => 'images', $item['Item']['id'])); ?>
<!--
<div id="magazine">
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/1.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/2.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/3.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/4.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/5.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/6.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/7.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/8.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/9.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
	<div style="background-image:url(/tesis/webroot/files/magazines/mag1/10.jpg);" class="img-polaroid zoomTarget zt2" data-closeclick="true"></div>
</div>
-->

<script type="text/javascript">
	$(window).ready(function() {
		/*$('#magazine').turn({
							display: 'double',
							acceleration: true,
							gradients: !$.isTouch,
							elevation:50,
							when: {
								turned: function(e, page) {
									//console.log('Current view: ', $(this).turn('view'));
								}
							}
		});*/

		/*$(".zt2").zoomTarget({
			targetsize: 2,
			duration: 600
		});*/

		/*$(".zt2").click(function(evt) {
			$(this).zoomTo({
				targetsize: 2,
				duration: 600
			});
			evt.stopPropagation();
			//$('.zoomTarget').attr('style', 'top: 140px');
		});*/
	});
	
	/*$(window).bind('keydown', function(e){
		if (e.keyCode==37)
			$('#magazine').turn('previous');
		else if (e.keyCode==39)
			$('#magazine').turn('next');
	});*/
</script>
<?php if ($this->Session->read('Auth.User.group_id') == 1) { ?>
<div class="actions">
	<!-- <h3><?php __('Actions'); ?></h3> -->
	<ul>
		<li><?php echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li>
		<li><?php echo $this->Html->link(__('List Items', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Item', true), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('New Item', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Item', true), array('action' => 'delete', $item['Item']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $item['Item']['id'])); ?> </li>
		<!-- <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic', true), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
<?php } ?>

<?php if ($item['Item']['item_content_type'] == "application/pdf") { ?>
<div id="up" style="display: none;" onclick="$(this).hide('fast'); $('#ebook').hide('fast'); $('#down').show('fast');"><a href="" onclick="return false;"><i class="icon-chevron-up"></i> Ocultar el PDF</a></div>
<div id="down" onclick="$(this).hide('fast'); $('#ebook').show('fast'); $('#up').show('fast');"><a href="" onclick="return false;"><i class="icon-chevron-down"></i> Ver el PDF</a></div>
<?php if ($item['Item']['item_file_path']) { ?>
	<iframe name="ebook" id="ebook" style="display: none;" src='<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/attachments/files/' . $item['Item']['item_file_path']; ?>' width='100%' height="600px"></iframe>
<?php } ?>
<?php } ?>

<div class="related">
	<h3><?php __('Fotos');?></h3>
	<?php if (!empty($item['ItemsPicture'])):?>
	<table>
	<tr>
		<!-- <th><?php __('Id'); ?></th> -->
		<th><?php __('Name'); ?></th>
		<th><?php __('Size'); ?></th>
		<th><?php __('Created'); ?></th>
		<!-- <th><?php __('Modified'); ?></th> -->
		<th class="actions"><?php //__('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($item['ItemsPicture'] as $picture):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<!-- <td><?php echo $picture['id'];?></td> -->
			<td><?php echo $picture['picture_file_name'];?></td>
			<td><?php echo $picture['picture_file_size'];?></td>
			<td><?php echo $time->format('d-m-Y', $picture['created']);?></td>
			<!-- <td><?php echo $time->format('d-m-Y', $picture['modified']);?></td> -->
			<td class="actions">
				<?php //echo $this->Html->link(__('View', true), array('controller' => 'items_pictures', 'action' => 'view', $picture['id'])); ?>
				<?php //echo $this->Html->link(__('Edit', true), array('controller' => 'items_pictures', 'action' => 'edit', $picture['id'])); ?>
				<?php echo $this->Html->link(__('Eliminar', true), array('controller' => 'items_pictures', 'action' => 'delete', $picture['id'], $item['Item']['id']), null, sprintf(__('Desea eliminar el archivo %s?', true), $picture['picture_file_name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Agregar Fotos', true), array('controller' => 'items_pictures', 'action' => 'images', $item['Item']['id']));?> </li>
		</ul>
	</div>
<!--
	<br /><br /><br />
	<div id="wijcarousel">
		<ul>
			<?php foreach ($item['ItemsPicture'] as $picture): ?>
			<li>
				<?php echo $this->Html->image("/attachments/files/med/" . $picture['picture_file_path'], array('alt' => $picture['picture_file_name'], 'title' => $picture['picture_file_name'])); ?>
				<span>Caption</span>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
-->
	<script id="scriptInit" type="text/javascript">
	/*$(document).ready(function () {
            $("#wijcarousel").wijcarousel({
                display: 3,
                step: 2,
                orientation: "horizontal"
            });
        });*/
    </script>
    	
	<!-- Button to trigger modal -->
<!-- <a href="#myModal" role="button" class="btn" data-toggle="modal">Subir páginas de la obra</a> -->

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
    <h3 id="myModalLabel">Modal header</h3>
  </div>
  <div class="modal-body">

  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save changes</button>
  </div>
</div>

</div>
<br /><br /><br />
	<!--
<div class="related">
	<h3><?php __('Related Values');?></h3>
	<?php if (!empty($item['Value'])):?>
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
		foreach ($item['Value'] as $value):
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
-->
<!--
<div class="related">
	<h3><?php __('Related Authors');?></h3>
	<?php if (!empty($item['Author'])):?>
	<table>
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Lastname'); ?></th>
		<th><?php __('Picture'); ?></th>
		<th><?php __('Biography'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($item['Author'] as $author):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $author['id'];?></td>
			<td><?php echo $author['name'];?></td>
			<td><?php echo $author['lastname'];?></td>
			<td><?php echo $author['picture'];?></td>
			<td><?php echo $author['biography'];?></td>
			<td><?php echo $author['created'];?></td>
			<td><?php echo $author['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'authors', 'action' => 'view', $author['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'authors', 'action' => 'edit', $author['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'authors', 'action' => 'delete', $author['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $author['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
-->
<!--
<div class="related">
	<h3><?php __('Related Indicators');?></h3>
	<?php if (!empty($item['Indicator'])):?>
	<table>
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Value'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Field Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($item['Indicator'] as $indicator):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $indicator['id'];?></td>
			<td><?php echo $indicator['value'];?></td>
			<td><?php echo $indicator['description'];?></td>
			<td><?php echo $indicator['type'];?></td>
			<td><?php echo $indicator['field_id'];?></td>
			<td><?php echo $indicator['created'];?></td>
			<td><?php echo $indicator['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'indicators', 'action' => 'view', $indicator['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'indicators', 'action' => 'edit', $indicator['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'indicators', 'action' => 'delete', $indicator['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $indicator['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
-->