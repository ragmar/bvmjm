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
<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '2'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li>Resultados de la búsqueda</li>
</ul>
<?php } else if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') == '1'))) { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/configurations">Inicio</a></li>
<li>Resultados de la búsqueda</li>
</ul>
<?php } else { ?>
<ul class="breadcrumb" style="margin: 0">	
<li><font size="1.5" color="gray">Ir a</font></li>
<li><a href="<?php echo $this->base; ?>/pages">Inicio</a></li>
<li>Resultados de la búsqueda</li>
</ul>
<?php } ?>

<div class='items view'>

<div class="col-md-9 column">

	<h2><?php __('Resultados de la Búsqueda');?></h2>
	<?php if (count($items) > 0) { ?>
	<table class="table">
	
	<tr>
		<th><?php __('Portada');?></th>
		<th><?php __('Detalles de la Obra');?></th>
	</tr>
	<?php foreach ($items as $item): ?>
	<?php if (empty($search)){
		echo " " ;	
	 }else {?>
	<?php
		$t1 = $item['Item']['h-006'];
		$t2 = $item['Item']['h-007'];
		$controller = "/";
		
		// Tipo libro.
		if (($t1 == 'a') && ($t2 == 'm')) {
			$color = "#9dae8a";
			$controller = "books";
		}
		
		// Tipo revista.
		if (($t1 == 'a') && ($t2 == 's')) {
			$color = "#b3bbce";
			$controller = "magazines";
		}

		// Música impresa.
		if (($t1 == 'c') && ($t2 == 'm')) {
			$color = "#d5b59e";
			$controller = "";
		}
		
		// Música manuscrita.
		if (($t1 == 'd') && ($t2 == 'm')) {
			$color = "#aea16c";
			$controller = "";
		}
		
		// Iconografía musical.
		if (($t1 == 'k') && ($t2 == 'b')) {
			$color = "#ba938e";
			$controller = "iconographies";
		}
		
		// Trabajos académicos.
		if (($t1 == 't') && ($t2 == 'm')) {
			$color = "#d1c7be";
			$controller = "academic_papers";
		}
	?>
	<tr>
		<td style="text-align: center; width: 100px;">
			<?php
				if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
						echo "<a href='".$this->base.'/'.$controller.'/view/'.$item['Item']['id']."'>".$this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%', 'title' => $item['Item']['cover_name']))."</a>";
					} else {
						echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '90%'));
					}
				} else {
					if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
					if (($t1 == 'a') && ($t2 == 'm')){	
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'books', 'action' => 'view', $item['Item']['id'])));
				}else if (($t1=='k' && $t2=='b') or ($t1=='k' && $t2=='a') or ($t1=='k' && $t2=='m')){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'iconographies', 'action' => 'view', $item['Item']['id'])));
				}else if (($t1==='d' && $t2='c') or ($t1=='d' && $t2=='a') or ($t1=='d' && $t2=='m')){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
				}else if (($t1=='c' && $t2=='c') or ($t1=='c' && $t2=='a') or ($t1=='c' && $t2=='m') or ($t1=='c' && $t2=='b')){
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.',  'width' => '80px','height'=>'100px', 'url' => array('controller' => 'printeds', 'action' => 'view', $item['Item']['id'])));
				
				}else{echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '90%'));
				}
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
								echo $title['a'];
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
				<?php if (!empty($item['Item']['690'])) { ?>
				<dt style="width: 120px"><?php __('Siglo:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$century = marc21_decode($item['Item']['690']);
					echo $century['a'] . '.';
				?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['653'])) { ?>
				<dt style="width: 120px"><?php __('Materia:');?></dt>
				<dd style="margin-left: 130px">
				<?php
					$matter = marc21_decode($item['Item']['653']);
					echo $matter['a'] . '.';
				?>
				</dd>
				<?php } ?>
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

					// Música impresa.
					if (($t1 == 'c') && ($t2 == 'm')) {
						echo "Música Impresa";
					}
					
					// Música manuscrita.
					if (($t1 == 'd') && ($t2 == 'm')) {
						echo "Música Manuscrita";
					}
					
					// Iconógrafía Musical.
					if (($t1 == 'k') && ($t2 == 'b')) {
						echo "Iconografía Musical";
					}
					
					// Trabajos Académicos.
					if (($t1 == 't') && ($t2 == 'm')) {
						echo "Trabajos Académicos";
					}
				?>
				</dd>
			</dl>
		</td>
	</tr>
	<?php } ?>
	<?php endforeach; ?>
	</table>
	<?php } else { ?>
			<br />
			<?php if (isset($this->data)) { ?>
				<p>No hay obra que coincidan con ese filtro.</p>
			<?php } else { ?>
				<p>No hay obras en este momento.</p>
			<?php } ?>
			<br /><br /><br /><br /><br />
		<?php } ?>
		<?php if (empty($search)){
		echo " " ;	
	 }else {?>
	<?php if ($this->Paginator->params['paging']['Item']['pageCount'] > 1) { ?>
	<div class="pagination" align="center">
		<ul>
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array('tag'=>'li', 'separator' => ''), null, array('class'=>'disabled', 'tag'=>'li', 'separator' => ''));?>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li'));?>
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array('tag'=>'li', 'separator' => ''), null, array('class' => 'disabled', 'tag'=>'li', 'separator' => ''));?>
		</ul>
	</div><br />
	<?php } ?>
	<?php } ?>
</div>

<div class="col-md-3 column">
		<br />
		<label><?php __('Búsqueda Avanzada para:'); ?></label>
		<div style="margin-top: 20px">
		<?php echo $this->Html->link(__('Iconografía Musical', true),'/iconographies/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Música Impresa', true),'/printeds/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Música Manuscrita', true),'/manuscripts/advanced_search', array('class' => 'btn btn-primary')); ?>
		<?php echo $this->Html->link(__('Trabajos Académicos', true),'/academic_papers/advanced_search', array('class' => 'btn btn-primary')); ?>
		<br />
		</div>

	<?php //echo $this->Html->link(__('Búsqueda Avanzada', true), array('action' => 'advanced_search'), array('class' => 'btn btn-primary')); ?>
</div>

</div>
<style type="text/css">
	.search {
		font-style: oblique;
	/*	text-decoration: underline;*/
		color: red;
	}
</style>
<script type="text/javascript">
$(document).ready(function() {
	// Sobreescribo el selector para que no discrimine entre mayúsculas y minúsculas.
	jQuery.expr[':'].contains = function(a, i, m) {
	  return jQuery(a).text().toUpperCase()
	      .indexOf(m[3].toUpperCase()) >= 0;
	};
	
	$(".dl-horizontal dd:contains('<?php echo $search; ?>')").addClass('search');

	if ('<?php echo isset($search); ?>') {
		$("input").val('<?php echo $search; ?>');
	}
});
</script>