<?php
//debug($this->Session->read('Search'));
/*echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');*/
//echo $this->Html->css('website-assets/website');

//debug($this->data);
//debug($this->passedArgs);
//debug($this->Session->read());

function marc21_decode($camp = null) {
	if (!empty($camp)) {
		$c = explode('^', $camp);
		$indicators = $c[0];
		unset($c[0]);

		$i = 0;
		foreach ($c as $v){
			$c[substr($v, 0, 1)] = substr($v, 1, strlen($v)-1);
			$i++;
			unset($c[$i]);
		}
		$c['indicators'] = $indicators;
		return $c;
	} else {
		return false;
	}
}

if (!empty($this->data)) { // Si viene de una búsqueda.
	$busqueda = 1;
	if (true) {
		
	}
} else {
	$busqueda = 0;
}

?>
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>/magazines">Revistas</a> <span class="divider">/</span></li>
  <?php if (!isset($this->passedArgs[0])) { ?>
  <li>Autor<span class="divider">/</span></li>
  <?php } else { ?>
  <li><a href="<?php echo $this->base; ?>/magazines/author">Autor</a><span class="divider">/</span></li>
  <li class="active"><?php echo $this->passedArgs[0]; ?></li>
  <?php } ?>
</ul>

<div align="center" style="padding-top: 5px; color: #828793; font-size: 18px; background: -webkit-linear-gradient(#d0d6e2, #ffffff); background: -moz-linear-gradient(#d0d6e2, #ffffff); background: -o-linear-gradient(#d0d6e2, #ffffff);"><strong>Módulo de Revistas</strong></div>

<div style="padding-left: 50px; padding-right: 50px;">

<div style="height: 46px; border-bottom-style: inset; border-bottom-color: #BBBBBB;">
<br />
<table style="font-size: smaller; width: 75%;">
	<tr>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><strong><a href="<?php echo $this->base; ?>/magazines">Presentación</a></strong></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/century">Siglo</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s2.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/author">Autor</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/title">Título</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/year">Año</a></td>
		<td width="100px" valign="middle" style="text-align:center; background-image: url('<?php echo $this->base; ?>/img/ts/fondo_boton_smrevistas_s1.jpg'); background-repeat: no-repeat;"><a href="<?php echo $this->base; ?>/magazines/matter">Materia</a></td>
	</tr>
</table>
</div>

<div class='author view' style="text-align: center;">
<!-- 
	<?php echo $this->Form->create('Magazine', array('action' => 'index'));?>
		<?php
		if ($this->Session->check('Search.Item.title')) {
			echo $this->Form->input('title', array('label' => 'Titulo de la Obra', 'style' => 'width: 65%', 'value' => $this->Session->read('Search.Item.title')));
		} else {
			echo $this->Form->input('title', array('label' => 'Titulo de la Obra', 'style' => 'width: 65%'));
		}
		?>

		<?php echo $this->Form->button(__('Buscar', true), array('type' => 'submit', 'class' => "btn btn-primary")); ?>&nbsp;
		<?php //echo $this->Form->button(__('Restaurar', true), array('type' => 'reset', 'class' => "btn btn-primary")); ?>
 	
	<div id="searchForm" <?php if (!isset($this->data)){ echo "style='display: none;'";} ?>>
	<br />

		<div style="float: left; width: 100%">
			<div style="float: left; width: 50%; text-align: right;">
				<?php
				if ($this->Session->check('Search.Item.author_id')) {
					echo $this->Form->input('author_id', array('div' => false, 'empty' => __('Author', true), 'label' => false, 'selected' => $this->Session->read('Search.Item.author_id')));
				} else {
					echo $this->Form->input('author_id', array('div' => false, 'empty' => __('Author', true), 'label' => false));
				}
				?>
				&nbsp;
			</div>
			<div style="float: left; width: 50%; text-align: left;">
				&nbsp;
				<?php
					if ($this->Session->check('Search.Item.type_id')) {
						echo $this->Form->input('type_id', array('div' => false, 'empty' => __('Type', true), 'label' => false, 'selected' => $this->Session->read('Search.Item.type_id')));
					} else {
						echo $this->Form->input('type_id', array('div' => false, 'empty' => __('Type', true), 'label' => false));
					}
				?>
			</div>
			<div style="float: left; width: 50%; text-align: right;">
				<?php
				if ($this->Session->read('Search.Item.topic_id')) {
					echo $this->Form->input('topic_id', array('div' => false, 'empty' => __('Topic', true), 'label' => false, 'selected' => $this->Session->read('Search.Item.topic_id')));
				} else {
					echo $this->Form->input('topic_id', array('div' => false, 'empty' => __('Topic', true), 'label' => false));
				}
				?>
				&nbsp;
			</div>
			<div style="float: left; width: 50%; text-align: left;">
				&nbsp;
				<?php
				if ($this->Session->check('Search:item.year')) {
					echo $this->Form->year('year', 1700, date('Y'), null, array('div' => false, 'label' => false, 'empty' => __('Year', true), 'value' => $this->Session->read('Search:item.year')));
				} else {
					echo $this->Form->year('year', 1700, date('Y'), null, array('div' => false, 'label' => false, 'empty' => __('Year', true)));
				}
				?>
			</div>
		</div>
		<br /><br /><br /><br />
	<?php echo $this->Form->end();?>
	</div>
	
	<div id="searchForm" style="border-top: 1px solid #ccc; text-align: right;">
		<label style="background: #cccccc; cursor: pointer; color: brown; width: 200px; float: right; text-align: center;" onclick="$('#searchForm').slideToggle('slow');"><b>B&uacute;squeda Avanzada</b></label>	
	</div>
	-->
	
	<!-- <h2><?php __('Obras');?></h2> -->
	<table>
	<tr>
		<th><?php __('Cover');?></th>
		<th><?php __('Detalles de la Obra');?></th>
	</tr>
	<?php foreach ($items as $item): ?>
	<?php
	$color = "#b3bbce";
		/*switch ($item['Type']['id']){
			case 1:
				$color = "#9dae8a";
				$controller = "books";
				break;
			case 2:
				$color = "#b3bbce";
				$controller = "magazines";
				break;
			case 3:
				$color = "#aea16c";
				$controller = "";
				break;
			case 4:
				$color = "#d5b59e";
				$controller = "";
				break;
			case 5:
				$color = "#ba938e";
				$controller = "";
				break;
			case 6:
				$color = "#d1c7be";
				$controller = "";
				break;
			default:
				$color = "white";
				$controller = "";
				break;
		}*/
	?>
	<tr>
		<td style="background-color: <?php echo $color; ?>; text-align: center; width: 80px;">
		<?php
			if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/tesis/webroot/covers/" . $item['Item']['cover_path']))){
				echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '70px'));
			} else {
				echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '70px'));
			}

			//if (!empty($item['ItemsPicture'])){
				//echo $this->Html->image("/webroot/attachments/files/big/" . $item['ItemsPicture'][0]['picture_file_path'], array('width' => '70px', 'class' => 'img-polaroid zoomTarget', 'data-closeclick' => 'true'));
			//}
		?>
		</td>
		<td>
			<dl class="dl-horizontal">
				<dt style="width: 120px"><?php __('Title:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['245'])) {
							$title = marc21_decode($item['Item']['245']);
							if ($title) {

								foreach ($item['UserItems'] as $ui):
									if($ui['user_id'] == $this->Session->read('Auth.User.id')) {
										echo $html->image('/img/ts/bookmark.png', array('alt' => 'Mi Biblioteca', 'title' => 'Obra agregada a la biblioteca.', 'style' => 'width: 20px;'));
										echo "&nbsp;";
									}
								endforeach;
									
								echo $this->Html->link($title['a'] . '.', 'view/'.$item['Item']['id'], array('title' => 'Haga click para ver los detalles.'));
								if (isset($title['b'])) {echo ' <i>' . $title['b']. '.</i>';}
								if (isset($title['c'])) {echo ' ' . $title['c']. '.';}
								if (isset($title['h'])) {echo ' ' . $title['h']. '.';}
							}
						}
					?>
				</dd>
				<dt style="width: 120px"><?php __('Autor:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['100'])) {
							$author = marc21_decode($item['Item']['100']);
							//echo $author['a'] . '.';
							echo "<b>" . substr($author['a'], 0, 1) . "</b>";
							echo substr($author['a'], 1, strlen($author['a']));
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
						}
					?>
				</dd>
				<dt style="width: 120px"><?php __('Publicación:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['260'])) {
							$publication = marc21_decode($item['Item']['260']);
							echo $publication['a'] . '.';
							if (isset($publication['b'])) {echo ' ' . $publication['b']. '.';}
							if (isset($publication['c'])) {echo ' ' . $publication['c']. '.';}
						}
					
					?>
				</dd>
				<!--
				<dt style="width: 120px"><?php __('Type:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						$t1 = $item['Item']['h-006'];
						$t2 = $item['Item']['h-007'];
						
						// Tipo libro.
						if (($t1 == 'a') && ($t2 == 'm')) {
							echo "Libro";
						}
						
						// Tipo revista.
						if (($t1 == 'a') && ($t2 == 's')) {
							echo "Revista";
						}
	
						// Música impresa.
						if (($t1 == 'c') && ($t2 == 'm')) {
							echo "Música Impresa";
						}
						
						// Música manuscrita.
						if (($t1 == 'd') && ($t2 == 'm')) {
							echo "Música Manuscrita";
						}
					?>
				</dd>
				-->
				<?php if (!empty($item['Item']['690'])) { ?>
				<dt style="width: 120px"><?php __('Siglo:');?></dt>
				<dd style="margin-left: 130px">
					<?php
						$century = marc21_decode($item['Item']['690']);
						echo $century['a'];
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['653'])) { ?>
				<dt style="width: 120px"><?php __('Materia:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$century = marc21_decode($item['Item']['653']);
					echo $century['a'];
				?>
				</dd>
				<?php } ?>
				<dt style="width: 120px">
				<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) { ?>
					<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $item['Item']['id']), null, sprintf(__("¿Desea eliminar '%s'?", true), $item['Item']['title'])); ?>
				<?php } ?>
				</dt>
				<dd style="margin-left: 130px"></dd>
				<!--
				<dt style="width: 120px"><?php __('Century:');?></dt>
				<dd style="margin-left: 130px">
					
				</dd>-->
			</dl>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	
	<!-- <p align="center">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p> -->

	<?php if ($this->Paginator->params['paging']['Item']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
</div>
<?php //if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) { ?>
<div class="actions">
	<br />
	<ul>
		<li><label><?php __('Autores por la Letra:'); ?></label></li>
		<li style="float: left;"><?php echo $this->Html->link(__('A', true), array('action' => 'author/A'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('B', true), array('action' => 'author/B'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('C', true), array('action' => 'author/C'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('D', true), array('action' => 'author/D'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('E', true), array('action' => 'author/E'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('F', true), array('action' => 'author/F'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('G', true), array('action' => 'author/G'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('H', true), array('action' => 'author/H'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('I', true), array('action' => 'author/I'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('J', true), array('action' => 'author/J'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('K', true), array('action' => 'author/K'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('L', true), array('action' => 'author/L'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('M', true), array('action' => 'author/M'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('N', true), array('action' => 'author/N'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('O', true), array('action' => 'author/O'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('P', true), array('action' => 'author/P'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('Q', true), array('action' => 'author/Q'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('R', true), array('action' => 'author/R'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('S', true), array('action' => 'author/S'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('T', true), array('action' => 'author/T'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('U', true), array('action' => 'author/U'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('V', true), array('action' => 'author/V'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('W', true), array('action' => 'author/W'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('X', true), array('action' => 'author/X'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('Y', true), array('action' => 'author/Y'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('Z', true), array('action' => 'author/Z'), array('style' => 'width: 10px; margin-right: 2px;')); ?></li>
		<li style="float: left;"><?php echo $this->Html->link(__('Todos', true), array('action' => 'author/'), array('style' => 'width: 40px; margin-right: 2px;')); ?></li>
		
		<!--
		<li><?php echo $this->Html->link(__('Configuration', true), array('controller' => 'configurations')); ?></li>
		<li><?php echo $this->Html->link(__('New Item', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors', true), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author', true), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Types', true), array('controller' => 'types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Type', true), array('controller' => 'types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Topics', true), array('controller' => 'topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Topic', true), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Values', true), array('controller' => 'values', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Value', true), array('controller' => 'values', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Indicators', true), array('controller' => 'indicators', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Indicator', true), array('controller' => 'indicators', 'action' => 'add')); ?> </li>
		-->
	</ul>
	<br />
	<div style="text-align: center;"><?php echo $this->Html->image('ts/logo_meseron_1.jpg'); ?></div>
	<br />
</div>
<?php //} ?>
<div style="clear: both;"><?php echo $this->Html->image('ts/pestana_revistas.jpg'); ?><br /><br /></div>
</div>