<?php
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
} else {
	$busqueda = 0;
}
?>
<style>
	.btn-primary {
		width: 200px;
		height: 35px;
		margin: 2px 2px 0px 0px;
		padding: 8px 0px 0px 0px;
		text-align: center;
		float: left;
	}
	
	.btn-primary:hover {
		text-decoration: none;
	}
</style>


<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
   <li><a href="<?php echo $this->base; ?>/books">Libros</a></li>
  <?php if (!isset($this->passedArgs[0])) { ?>
  	<li>Siglo</li>
  <?php } else { ?>
  	<li><a href="<?php echo $this->base; ?>/books/century">Siglo</a></li>
  	<li class="active"><?php echo $this->passedArgs[0]; ?></li>
  <?php } ?>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
   <li><a href="<?php echo $this->base; ?>/books">Libros</a></li>
  <?php if (!isset($this->passedArgs[0])) { ?>
  	<li>Siglo</li>
  <?php } else { ?>
  	<li><a href="<?php echo $this->base; ?>/books/century">Siglo</a></li>
  	<li class="active"><?php echo $this->passedArgs[0]; ?></li>
  <?php } ?>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
 <li><a href="<?php echo $this->base; ?>/iconographies">Iconografía Musical en Venezuela</a></li>
 <li><a href="<?php echo $this->base; ?>/books">Libros</a></li>
  <?php if (!isset($this->passedArgs[0])) { ?>
  	<li>Siglo</li>
  <?php } else { ?>
  	<li><a href="<?php echo $this->base; ?>/books/century">Siglo</a></li>
  	<li class="active"><?php echo $this->passedArgs[0]; ?></li>
  <?php } ?>
</ul>
<?php } ?>





<div class='century view'>
	<div class="col-md-9 column">
	<h2>Módulo de Libros</h2>
		<?php if (count($items) > 0) { ?>
		<table class="table">
		<tr>
			<th><?php __('Cover');?></th>
			<th><?php __('Detalles de la Obra');?></th>
		</tr>
		<?php foreach ($items as $item): ?>
		<?php //$color = "#b3bbce"; ?>
		<?php $color = ""; ?>
		<tr>
			<td style="background-color: <?php echo $color; ?>; text-align: center; width: 80px;">
			<?php
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
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
					<dt style="width: 120px"><?php __('Título:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							if (!empty($item['Item']['245'])) {
								$title = marc21_decode($item['Item']['245']);
								if ($title) {
									foreach ($item['UserItems'] as $ui):
										if($ui['user_id'] == $this->Session->read('Auth.User.id') && ($ui['item_id'] == $item['Item']['id'])) {
											echo $html->image('/img/ts/bookmark.png', array('alt' => 'Mi Biblioteca', 'title' => 'Obra agregada a la biblioteca.', 'style' => 'width: 20px;'));
											echo "&nbsp;";
										}
									endforeach;
									
									echo $this->Html->link($title['a'] . '.', 'view/'.$item['Item']['id'], array('title' => 'Haga click para ver los detalles.'));
									if (isset($title['b'])) {echo ' <i>' . $title['b'] . '.</i>';}
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
								echo $author['a'] . '.';
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
					<dt style="width: 120px"><?php __('Tipo: ');?></dt>
					<dd style="margin-left: 130px">
						<?php
							$t1 = $item['Item']['h-006'];
							$t2 = $item['Item']['h-007'];
							
							// Tipo libro.
							if (($t1 == 'a') && ($t2 == 'm')) {
								//echo "Libro";
							}
							
							// Tipo revista.
							if (($t1 == 'a') && ($t2 == 's')) {
								//echo "Revista";
							}
		
							// Música impresa.
							if (($t1 == 'c') && ($t2 == 'm')) {
								//echo "Música Impresa";
							}
							
							// Música manuscrita.
							if (($t1 == 'd') && ($t2 == 'm')) {
								//echo "Música Manuscrita";
							}
						?>
					</dd>
					-->
					<?php if (!empty($item['Item']['690'])) { ?>
					<dt style="width: 120px"><?php __('Siglo:');?></dt>
					<dd style="margin-left: 130px">
						<?php
							$century = marc21_decode($item['Item']['690']);
							echo '<b>' . $century['a'] . '</b>';
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
				</dl>
			</td>
		</tr>
		<?php endforeach; ?>
		</table>
		<?php } else { ?>
			<br />
			<p>No hay libros de este siglo.</p>
			<br /><br /><br /><br /><br />
		<?php } ?>
		
		<?php if ($this->Paginator->params['paging']['Item']['pageCount'] > 1) { ?>
		<div class="pagination" align="center">
			<ul>
				<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
				<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
				<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
			</ul>
		</div>
		<?php } ?>
	</div>
	<div class="col-md-3 column">
		<br />
		<label><?php __('Siglos:'); ?></label>
		<br />
		<?php echo $this->Html->link(__('XVII', true), array('action' => 'century/XVII'), array('class' => 'btn-primary', 'title' => 'Siglo 17')); ?>
		<?php echo $this->Html->link(__('XVIII', true), array('action' => 'century/XVIII'), array('class' => 'btn-primary', 'title' => 'Siglo 18')); ?>
		<?php echo $this->Html->link(__('XIX', true), array('action' => 'century/XIX'), array('class' => 'btn-primary', 'title' => 'Siglo 19')); ?>
		<?php echo $this->Html->link(__('XX', true), array('action' => 'century/XX'), array('class' => 'btn-primary', 'title' => 'Siglo 20')); ?>
		<?php echo $this->Html->link(__('Todos', true), array('action' => 'century/'), array('class' => 'btn-primary', 'title' => 'Todos los siglos')); ?>
	</div>
</div>