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

//debug($items);
//debug($this->data);
//debug($this->passedArgs);
//debug($this->Session->read());
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
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>/manuscripts">Libros</a></li>
  <li>Buscar</li>
  <li><?php echo $search; ?></li>
</ul>

<div class='items view'>

<div class="col-md-9 column">

	<h2><?php __('Resultados de la Búsqueda');?></h2>
	<table class="table">
	<tr>
		<th><?php __('Portada');?></th>
		<th><?php __('Detalles de la Obra');?></th>
	</tr>
	<?php foreach ($items as $item): ?>
	<?php
		$t1 = $item['Item']['h-006'];
		$t2 = $item['Item']['h-007'];
		$controller = "/";
		
		// Tipo libro.
		if (($t1 == 'a') && ($t2 == 'm')) {
		//	$color = "#9dae8a";
			$controller = "books";
		}
		
		// Tipo revista.
		if (($t1 == 'a') && ($t2 == 's')) {
		//	$color = "#b3bbce";
			$controller = "magazines";
		}

		// Música impresa.
		if (($t1 == 'c') && ($t2 == 'm')) {
		//	$color = "#d5b59e";
			$controller = "printeds";
		}
		if (($t1 == 'c') && ($t2 == 'c')) {
		//	$color = "#d5b59e";
			$controller = "printeds";
		}
		if (($t1 == 'c') && ($t2 == 'a')) {
		//	$color = "#d5b59e";
			$controller = "printeds";
		}
		if (($t1 == 'c') && ($t2 == 'b')) {
		//	$color = "#d5b59e";
			$controller = "printeds";
		}
		
		// Música manuscrita.
		if (($t1 == 'd') && ($t2 == 'm')) {
		//	$color = "#aea16c";
			$controller = "manuscripts";
		}
		if (($t1 == 'd') && ($t2 == 'a')) {
			//$color = "#aea16c";
			$controller = "manuscripts";
		}
		if (($t1 == 'd') && ($t2 == 'c')) {
		//	$color = "#aea16c";
			$controller = "manuscripts";
		}
		
		// Iconografía musical.
		if (($t1 == 'k') && ($t2 == 'b')) {
			//$color = "#ba938e";
			$controller = "iconoraphies";
		}
		
		// Iconografía musical.
		if (($t1 == 'k') && ($t2 == 'm')) {
		//	$color = "#ba938e";
			$controller = "iconographies";
		}
			// Iconografía musical.
		if (($t1 == 'k') && ($t2 == 'a')) {
		//	$color = "#ba938e";
			$controller = "iconographies";
		}
		
		// Trabajos académicos.
		if (($t1 == 'a') && ($t2 == 'a')) {
		//	$color = "#d1c7be";
		}
	?>
	<tr>
		<td  text-align: center; width: 80px;">
				<?php
					$t1 = $item['Item']['h-006'];
					$t2 = $item['Item']['h-007'];
				if (($item['Item']['cover_name']) &&  (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
				if (($t1 == 'a') && ($t2 == 'm')){	
					echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
				}else
				if (($t1=='k' && $t2=='b') or ($t1=='k' && $t2=='a') or ($t1=='k' && $t2=='m')){
				echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'iconographies', 'action' => 'view', $item['Item']['id'])));
				}else
				if (($t1==='d' && $t2='c') or ($t1=='d' && $t2=='a') or ($t1=='d' && $t2=='m')){
				echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
				}else
				if (($t1=='c' && $t2=='c') or ($t1=='c' && $t2=='a') or ($t1=='c' && $t2=='m') or ($t1=='c' && $t2=='b')){
				echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'printeds', 'action' => 'view', $item['Item']['id'])));
				}
				else{
				echo $this->Html->image("/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
				}
				}
			?>
		</td>
		<td>
			<dl class="dl-horizontal">
				<dt style="width: 120px">
					<?php __('Title:');?>
				</dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['245'])) {
							$title = marc21_decode($item['Item']['245']);
							if ($title) {
								echo $title['a'] . '.';

								if (isset($title['b'])) {echo ' <i>' . $title['b'] . '.</i>';}
								if (isset($title['c'])) {echo ' ' . $title['c']. '.';}
								if (isset($title['h'])) {echo ' ' . $title['h']. '.';}
							}
						}
					?>
				</dd>
				<dt style="width: 120px">
					<?php __('Author:');?>
				</dt>
				<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['100'])) {
							$author = marc21_decode($item['Item']['100']);
							echo $author['a']. '.';
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
						}
					?>
				</dd>
				<?php if (!empty($item['Item']['653'])) { ?>
				<dt style="width: 120px"><?php __('Materia:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$matter = marc21_decode($item['Item']['653']);
					echo $matter['a'] . '.';
				?>
				</dd>
				<?php } ?>
				<?php if ($t1=='a' && $t2=='m'){?>
				<?php if (!empty($item['Item']['690'])) { ?>
				<dt style="width: 120px"><?php __('Siglo:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$century = marc21_decode($item['Item']['690']);
					echo $century['a'] . '.';
				?>
				</dd>
				<?php } }?>
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
				
				<?php if (($t1=='d' && $t2=='c') || ($t1=='d' && $t2=='a') ||($t1=='d' && $t2=='m')||($t1=='c' && $t2=='c') || ($t1=='c' && $t2=='a') ||($t1=='c' && $t2=='m')||($t1=='c' && $t2=='b')){?>
				<?php if (!empty($item['Item']['031'] )){ ?>
					<dt style="width: 120px"><?php __('Íncipit Literario:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['031'])) {
							$literary = marc21_decode($item['Item']['031']);
							echo $literary['t'];
						}
					?>
					</dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['5922'] )){ ?>
					<dt style="width: 120px"><?php __('Medio Sonoro:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['5922'])) {
							$sound = marc21_decode($item['Item']['5922']);
							echo $sound['b'];
						}
						?>
						</dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['5922'] )){ ?>
					<dt style="width: 120px"><?php __('Género:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['5922'])) {
								$gender = marc21_decode($item['Item']['5922']);
							echo $gender ['c'];
						}
						?>
						</dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['5922'] )){ ?>
					<dt style="width: 120px"><?php __('Tonalidad:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['5922'])) {
							$hue = marc21_decode($item['Item']['5922']);
							echo $hue ['f'];
						}
						?> </dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['700'] )){ ?>
					<dt style="width: 120px"><?php __('Mención de </br> Responsabilidad:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['700'])) {
							$responsability = marc21_decode($item['Item']['700']);
							echo "</br>", $responsability ['a'];
						}
						?>
						</dd>
					<?php } }?>
					<?php if (($t1=='k' && $t2=='b') || ($t1=='k' && $t2=='a') ||($t1=='k' && $t2=='m')){?>
					
					<?php if (!empty($item['Item']['650'])) { ?>
					<dt style="width: 120px"><?php __('Temas'); ?>:</dt>
					<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['650'])) {
							$mattername = marc21_decode($item['Item']['650']);
							echo $mattername['a'];
						}
					?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['773'])) { ?>
					<dt style="width: 120px"><?php __('Fuente'); ?>:</dt>
					<dd style="margin-left: 130px">
					<?php
						if (!empty($item['Item']['773'])) {
							$source = marc21_decode($item['Item']['773']);
							echo $source['t'];
						}
					?>
				</dd>
				<?php }} ?> 
				
				<dt style="width: 120px"><?php __('Tipo:');?></dt>
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
						// Tipo Iconografia.
					if (($t1 == 'k') && ($t2 == 'a')) {
						echo "Iconografía Musical Venezolana.";
					}
						// Tipo Iconografia.
					if (($t1 == 'k') && ($t2 == 'b')) {
						echo "Iconografía Musical Venezolana.";
					}
					
						// Tipo Iconografia.
					if (($t1 == 'k') && ($t2 == 'm')) {
						echo "Iconografía Musical Venezolana.";
					}

					// Música impresa.
					if (($t1 == 'c') && ($t2 == 'm')) {
						echo "Música Impresa";
					}
					if (($t1 == 'c') && ($t2 == 'c')) {
						echo "Música Impresa";
					}
					if (($t1 == 'c') && ($t2 == 'a')) {
						echo "Música Impresa";
					}
					if (($t1 == 'c') && ($t2 == 'b')) {
						echo "Música Impresa";
					}
					// Música manuscrita.
					if (($t1 == 'd') && ($t2 == 'm')) {
						echo "Música Manuscrita";
					}
					if (($t1 == 'd') && ($t2 == 'a')) {
						echo "Música Manuscrita";
					}
					if (($t1 == 'd') && ($t2 == 'c')) {
						echo "Música Manuscrita";
					}
				?>
				</dd>
			</dl>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>

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
<?php if (($this->Session->check('Auth.User')) && ($this->Session->read('Auth.User.group_id') != 3)) { ?>
<div class="col-md-3 column">
	<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) { ?>
			<br />
			<label><?php __('Acciones:'); ?></label>
			<br />
			<?php echo $this->Html->link(__('Agregar Libro', true), array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
			<br /><br />
		<?php } ?>
</div>
<?php } ?>
</div>