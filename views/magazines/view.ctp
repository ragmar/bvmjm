<?php
// El zoom daña la revista.
/*echo $this->Html->script('zoomooz/jquery.zoomooz-helpers');
echo $this->Html->script('zoomooz/jquery.zoomooz-anim');
echo $this->Html->script('zoomooz/jquery.zoomooz-core');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomTarget');
echo $this->Html->script('zoomooz/jquery.zoomooz-zoomContainer');
echo $this->Html->script('zoomooz/purecssmatrix');
echo $this->Html->script('zoomooz/sylvester.src.stripped');
echo $this->Html->css('website-assets/website');*/
echo $this->Html->script('jquery.easing.1.3.js');
echo $this->Html->script('turn');
//echo $this->Html->script('wijmo/jquery.wijmo-open.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo-complete.all.2.2.1.min');
//echo $this->Html->script('wijmo/jquery.wijmo.wijcarousel');
echo $this->Html->script('bootstrap/bootstrap-tab');
//echo $this->Html->script('pdfobject_source');

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
?>
<style type="text/css">
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
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li><a href="<?php echo $this->base; ?>/magazines">Hemerografías</a></li>
  <li>
  	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				if (isset($title['b'])) {echo ' ' . $title['b'];}
				if (isset($title['c'])) {echo ' ' . $title['c'];}
				if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?>
  	</li>
</ul>

<div class='book view'>
	<div class="col-md-2 column">
	<br />
		<div style="width: 100%; text-align: center;">
			<?php
				//if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
					//echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%', 'title' => $item['Item']['cover_name']));
					echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%', 'title' => $item['Item']['cover_name']));
				} else {
					//echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '90%'));
					echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '90%'));
				}
			?>
		</div>
	</div>
	<div class="col-md-7 column">
		<h2>Detalles de la Hemerografía</h2>
				
		<div>
			<dl class="dl-horizontal">
				<dt><?php __('Título'); ?>:</dt>
				<dd>
				<?php
					if (!empty($item['Item']['245'])) {
						$title = marc21_decode($item['Item']['245']);
						if ($title) {
							echo $title['a'] . '. ';
							if (isset($title['b'])) {echo $title['b']. '. ';}
							if (isset($title['c'])) {echo $title['c']. '. ';}
							if (isset($title['h'])) {echo $title['h']. '. ';}
						}
					}
				?>
				</dd>
				<?php if (!empty($item['Item']['100'])) { ?>
				<dt><?php __('Author'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['100'])) {
							$author = marc21_decode($item['Item']['100']);
							echo $author['a'];
							if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
						}
					?>
				</dd>
				<?php } ?>
				<dt><?php __('Publicación'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['260'])) {
							$year_century = marc21_decode($item['Item']['260']);
							echo $year_century['a'] . '. ';
							if (isset($year_century['b'])) {echo " : " . $year_century['b']. ', ';}
							if (isset($year_century['c'])) {echo $year_century['c']. '. ';}
						}
					?>
				</dd>
				<?php if (!empty($item['Item']['690'])) { ?>
				<dt><?php __('Siglo'); ?>:</dt>
				<dd>
					<?php
						$century = marc21_decode($item['Item']['690']);
						echo $century['a'];
					?>
				</dd>
				<?php } ?>
				<?php if (!empty($item['Item']['653'])) { ?>
				<dt><?php __('Materia'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['653'])) {
							$materia = marc21_decode($item['Item']['653']);
							echo $materia['a'];
						}
					?>
				</dd>
				<?php } ?>
				<!--
				<dt><?php __('Created'); ?>:</dt>
				<dd>
					<?php echo $time->format('d-m-Y', $item['Item']['created']); ?>
				</dd>
				<dt><?php __('Modified'); ?>:</dt>
				<dd>
					<?php echo $time->format('d-m-Y', $item['Item']['modified']); ?>
				</dd>
				-->
			</dl>
		</div>
	</div>
	<div class="col-md-3 column">
		<br />
		<label><?php __('Acciones:'); ?></label>
		<br />

		<form id="UserItemAddForm" name="UserItemAddForm" accept-charset="utf-8" method="post" action="<?php echo $this->base; ?>/user_items/add">
			<?php
				if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) {
					echo $this->Html->link('Agregar Hemerografía', array('action' => '/add'), array('class' => 'btn-primary', 'title' => 'Agregar Libro'));
					echo $this->Html->link('Modificar Hemerografía', array('action' => '/edit/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Modificar Libro'));
				}
			?>
			<?php
				echo $this->Form->hidden('user_id', array('type' => 'text', 'value' => $this->Session->read('Auth.User.id')));
				echo $this->Form->hidden('item_id', array('type' => 'text', 'value' => $item['Item']['id']));
				echo $this->Html->link('Agregar a Mi Biblioteca', array('action' => '#'), array('id' => 'biblioteca', 'class' => 'btn-primary', 'title' => 'Agregar a Mi Biblioteca', 'onclick' => 'return false;'));
				echo $this->Html->link('Ver Formato MARC21', array('action' => 'marc21/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Formato MARC21'));
			?>
			<?php if (!empty($item['Item']['item_file_path'])) { ?>
				<!-- <a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargar Documento</a> -->
				<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/files/' . $item['Item']['item_file_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargar Documento</a>
			<?php } ?>
		</form>
	</div>
	
	<div style="clear: both;"><br /></div>
	
	<?php if ($item['Item']['item_content_type'] == "application/pdf") { ?>
		<?php if ($item['Item']['item_file_path']) { ?>
			<!-- <iframe src="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <iframe src="http://docs.google.com/viewer?url=<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <object width="99%" height="600" type="application/pdf" data="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>">
			<param name="src" value="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" />
			<p>N o PDF available</p>
			</object> -->
			
			<!-- <object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px"> -->
			<object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px">
			<br /><br />
			<div style="text-align: center;">
				Lamentablemente este navegador no posee un plugin para visualizar PDF's.
			<br />
				Instale un plugin para visualizar el PDF. 
			<br /><br /><br /><br />
			</div>
			</object>
			
		<?php } ?>
	<?php } else {echo "<div style='text-align: center'>El archivo no tiene formato pdf.</div><br />";} ?>
</div>

<script type="text/javascript">
$('#biblioteca').click(function (e) {
	e.preventDefault();
	$('#UserItemAddForm').submit();
});
</script>	