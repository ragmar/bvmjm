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
	
	.table {
		border: solid 1px #6c3f30;
	}
	
	th {
		color: #FFF;
		background-color: #6c3f30;
		border: solid 1px #E8DED4;
		width: 50%;
	}
	
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
  <li><a href="<?php echo $this->base; ?>/books">Libros</a></li>
  <li>
  	<?php
		if (!empty($item['Item']['245'])) {
			$title = marc21_decode($item['Item']['245']);
			if ($title) {
				echo $title['a'];
				//if (isset($title['b'])) {echo ' ' . $title['b'];}
				//if (isset($title['c'])) {echo ' ' . $title['c'];}
				//if (isset($title['h'])) {echo ' ' . $title['h'];}
			}
		}
	?>
  	</li>
</ul>

<div class='book view'>
	<div class="row">
		<div class="col-md-2 column">
		<br />
			<div style="width: 100%; text-align: center;">
				<?php
					if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){
						if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
							echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%', 'title' => $item['Item']['cover_name']));
						} else {
							echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '90%'));
						}
					} else {
						if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/html/app/webroot/covers/" . $item['Item']['cover_path']))){
							echo $this->Html->image("/app/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%', 'title' => $item['Item']['cover_name']));
						} else {
							echo $this->Html->image("/app/webroot/img/sin_portada.jpg", array('width' => '90%'));
						}
					}
					
					if ($item['Item']['item_file_size']) {
						echo "<br />" . $item['Item']['item_file_size'] . " Bytes.";
					} else {
						echo "<br />0 Bytes.";
					}
				?>
			</div>
		</div>
		<div class="col-md-7 column">
			<h2>Detalles del Libro</h2>
					
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
								echo $author['a'] . '. ';
								if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
							}
						?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['260'])) { ?>
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
					<?php } ?>
					<?php if (!empty($item['Item']['690'])) { ?>
					<dt><?php __('Siglo'); ?>:</dt>
					<dd>
						<?php
							$century = marc21_decode($item['Item']['690']);
							echo $century['a'] . '. ';
						?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['653'])) { ?>
					<dt><?php __('Materia'); ?>:</dt>
					<dd>
						<?php
							if (!empty($item['Item']['653'])) {
								$materia = marc21_decode($item['Item']['653']);
								echo $materia['a'] . '. ';
							}
						?>
					</dd>
					<?php } ?>
					<dt><?php __('Created'); ?>:</dt>
					<dd>
						<?php echo $time->format('d-m-Y', $item['Item']['created']); ?>
					</dd>
					<dt><?php __('Modified'); ?>:</dt>
					<dd>
						<?php echo $time->format('d-m-Y', $item['Item']['modified']); ?>
					</dd>
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
						echo $this->Html->link('Agregar Libro', array('action' => '/add'), array('class' => 'btn-primary', 'title' => 'Agregar Libro'));
						echo $this->Html->link('Modificar Libro', array('action' => '/edit/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Modificar Libro'));
						echo $this->Html->link('Eliminar Libro', array('action' => 'delete', $item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Eliminar Libro'), sprintf(__('¿Realmente desea eliminar el libro "%s"?', true), $title['a']));
					}
				?>
				<?php
					echo $this->Form->hidden('user_id', array('type' => 'text', 'value' => $this->Session->read('Auth.User.id')));
					echo $this->Form->hidden('item_id', array('type' => 'text', 'value' => $item['Item']['id']));
					echo $this->Html->link('Agregar a Mi Biblioteca', array('action' => '#'), array('id' => 'biblioteca', 'class' => 'btn-primary', 'title' => 'Agregar a Mi Biblioteca', 'onclick' => 'return false;'));
					echo $this->Html->link('Ver Formato MARC21', array('action' => 'marc21/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Formato MARC21'));
				?>
				<?php if (!empty($item['Item']['item_file_path'])) { ?>
					<?php if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){ ?>
						<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargar Documento</a>
					<?php } else { ?>
						<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/files/' . $item['Item']['item_file_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargar Documento</a>
					<?php } ?>
				<?php } ?>
				<?php echo $this->Html->link('Ver Más Detalles', array('action' => ''), array('id' => 'mas', 'class' => 'btn-primary', 'title' => 'Ver Más Detalles', 'onclick' => 'return false;', 'style' => 'display: none;')); ?>
			</form>
		</div>
	</div>
	
	<?php $masdetalles = 0; ?>
	<div class="row">
		<table id="more" style="display: none; width: 100%;">
			<?php if (!empty($item['Item']['017'])) { ?>
			<tr>
				<td style="text-align: right; width: 50%;"><b><?php __('Número de copyright o de depósito legal'); ?>:</b></td>
				<td style="padding-left: 1%; width: 50%;">
					<?php
						$copyright = marc21_decode($item['Item']['017']);
						if (isset($copyright['a'])) {echo $copyright['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['020'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Número Internacional Normalizado para Libros (ISBN)'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$isbn = marc21_decode($item['Item']['020']);
						if (isset($isbn['a'])) {echo $isbn['a']; $masdetalles++;}
						if (isset($isbn['c'])) {echo " " . $isbn['c']; $masdetalles++;}
						if (isset($isbn['z'])) {echo " " . $isbn['z']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['022'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Número Internacional Normalizado para Publicaciones Seriadas (ISSN)'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$issn = marc21_decode($item['Item']['022']);
						if (isset($issn['a'])) {echo $issn['a']; $masdetalles++;}
						if (isset($issn['y'])) {echo " " . $issn['y']; $masdetalles++;}
						if (isset($issn['z'])) {echo " " . $issn['z']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['028'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Número de plancha'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$plancha = marc21_decode($item['Item']['028']);
						if (isset($plancha['a'])) {echo $plancha['a']; $masdetalles++;}
						if (isset($plancha['b'])) {echo " " . $plancha['b']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['040'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Fuente de la catalogación'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$fuente = marc21_decode($item['Item']['040']);
						if (isset($fuente['a'])) {echo $fuente['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['041'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Código de lengua'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$lengua = marc21_decode($item['Item']['041']);
						if (isset($lengua['a'])) {echo $lengua['a']; $masdetalles++;}
						if (isset($lengua['b'])) {echo " " . $lengua['b']; $masdetalles++;}
						if (isset($lengua['h'])) {echo " " . $lengua['h']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['044'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Código del país de la entidad editora/productora'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$paisep = marc21_decode($item['Item']['044']);
						if (isset($paisep['a'])) {echo $paisep['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['082'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Número de la Clasificación Decimal Dewey'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$dewey = marc21_decode($item['Item']['082']);
						if (isset($dewey['a'])) {echo $dewey['a']; $masdetalles++;}
						if (isset($dewey['b'])) {echo " " . $dewey['b']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['092'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Clasificación local (COTA)'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$cota = marc21_decode($item['Item']['092']);
						if (isset($cota['a'])) {echo $cota['a']; $masdetalles++;}
						if (isset($cota['b'])) {echo " " . $cota['b']; $masdetalles++;}
						if (isset($cota['c'])) {echo " " . $cota['c']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['110'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Autor corporativo'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$autorc = marc21_decode($item['Item']['110']);
						if (isset($autorc['a'])) {echo $autorc['a']; $masdetalles++;}
						if (isset($autorc['b'])) {echo " " . $autorc['b']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['130'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Título uniforme (Punto de acceso)'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$titulou = marc21_decode($item['Item']['130']);
						if (isset($titulou['a'])) {echo $titulou['a']; $masdetalles++;}
						if (isset($titulou['n'])) {echo " " . $titulou['n']; $masdetalles++;}
						if (isset($titulou['p'])) {echo " " . $titulou['p']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['222'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Título clave'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$tituloc = marc21_decode($item['Item']['222']);
						if (isset($tituloc['a'])) {echo $tituloc['a']; $masdetalles++;}
						if (isset($tituloc['b'])) {echo " " . $tituloc['b']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['240'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Título uniforme'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$titulou = marc21_decode($item['Item']['240']);
						if (isset($titulou['a'])) {echo $titulou['a']; $masdetalles++;}
						if (isset($titulou['n'])) {echo " " . $titulou['n']; $masdetalles++;}
						if (isset($titulou['p'])) {echo " " . $titulou['p']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['246'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Variante de título'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$titulov = marc21_decode($item['Item']['246']);
						if (isset($titulov['a'])) {echo $titulov['a']; $masdetalles++;}
						if (isset($titulov['b'])) {echo " " . $titulov['b']; $masdetalles++;}
						if (isset($titulov['i'])) {echo " " . $titulov['i']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['247'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Título anterior'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$tituloa = marc21_decode($item['Item']['247']);
						if (isset($tituloa['a'])) {echo $tituloa['a']; $masdetalles++;}
						if (isset($tituloa['b'])) {echo " " . $tituloa['b']; $masdetalles++;}
						if (isset($tituloa['f'])) {echo " " . $tituloa['f']; $masdetalles++;}
						if (isset($tituloa['g'])) {echo " " . $tituloa['g']; $masdetalles++;}
						if (isset($tituloa['n'])) {echo " " . $tituloa['n']; $masdetalles++;}
						if (isset($tituloa['p'])) {echo " " . $tituloa['p']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['250'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Mención de edición'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$titulom = marc21_decode($item['Item']['250']);
						if (isset($titulom['a'])) {echo $titulom['a']; $masdetalles++;}
						if (isset($titulom['b'])) {echo " " . $titulom['b']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['300'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Descripción física'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$descripcionf = marc21_decode($item['Item']['300']);
						if (isset($descripcionf['a'])) {echo $descripcionf['a']; $masdetalles++;}
						if (isset($descripcionf['b'])) {echo " " . $descripcionf['b']; $masdetalles++;}
						if (isset($descripcionf['c'])) {echo " " . $descripcionf['c']; $masdetalles++;}
						if (isset($descripcionf['e'])) {echo " " . $descripcionf['e']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['310'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Periodicidad actual'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$periodicidadac = marc21_decode($item['Item']['310']);
						if (isset($periodicidadac['a'])) {echo $periodicidadac['a']; $masdetalles++;}
						if (isset($periodicidadac['b'])) {echo " " . $periodicidadac['b']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['321'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Periodicidad anterior'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$periodicidadan = marc21_decode($item['Item']['321']);
						if (isset($periodicidadan['a'])) {echo $periodicidadan['a']; $masdetalles++;}
						if (isset($periodicidadan['b'])) {echo " " . $periodicidadan['b']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['362'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Fechas de publicación y/o designación secuencial'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$publicacionds = marc21_decode($item['Item']['362']);
						if (isset($publicacionds['a'])) {echo $publicacionds['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['380'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Forma de la obra'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$forma = marc21_decode($item['Item']['380']);
						if (isset($forma['a'])) {echo $forma['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['500'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota general'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notag = marc21_decode($item['Item']['500']);
						if (isset($notag['a'])) {echo $notag['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['501'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de “Con”'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notac = marc21_decode($item['Item']['501']);
						if (isset($notac['a'])) {echo $notac['a'];}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['505'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de contenido con formato'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notacf = marc21_decode($item['Item']['505']);
						if (isset($notacf['a'])) {echo $notacf['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['510'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de citas o referencias bibliográficas'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notacrb = marc21_decode($item['Item']['510']);
						if (isset($notacrb['a'])) {echo $notacrb['a']; $masdetalles++;}
						if (isset($notacrb['c'])) {echo " " . $notacrb['c']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['515'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de peculiaridades de la numeración'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notacrb = marc21_decode($item['Item']['515']);
						if (isset($notacrb['a'])) {echo $notacrb['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['520'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de sumario, etc'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notasum = marc21_decode($item['Item']['520']);
						if (isset($notasum['a'])) {echo $notasum['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['530'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de formato físico adicional disponible'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notaffad = marc21_decode($item['Item']['530']);
						if (isset($notaffad['a'])) {echo $notaffad['a']; $masdetalles++;}
						if (isset($notaffad['c'])) {echo " " . $notaffad['c']; $masdetalles++;}
						if (isset($notaffad['u'])) {echo " " . $notaffad['u']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['534'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota sobre la versión original'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notavo = marc21_decode($item['Item']['534']);
						if (isset($notavo['a'])) {echo $notavo['a']; $masdetalles++;}
						if (isset($notavo['c'])) {echo " " . $notavo['c']; $masdetalles++;}
						if (isset($notavo['l'])) {echo " " . $notavo['l']; $masdetalles++;}
						if (isset($notavo['p'])) {echo " " . $notavo['p']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['546'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de lengua'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notal = marc21_decode($item['Item']['546']);
						if (isset($notal['a'])) {echo $notal['a']; $masdetalles++;}
						if (isset($notal['c'])) {echo " " . $notal['c']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['555'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de índice acumulativo u otros instrumentos bibliográficos'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notaiaoib = marc21_decode($item['Item']['555']);
						if (isset($notaiaoib['a'])) {echo $notaiaoib['a']; $masdetalles++;}
						if (isset($notaiaoib['b'])) {echo " " . $notaiaoib['b']; $masdetalles++;}
						if (isset($notaiaoib['d'])) {echo " " . $notaiaoib['d']; $masdetalles++;}
						if (isset($notaiaoib['u'])) {echo " " . $notaiaoib['u']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['588'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Nota de fuente de la descripción'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$notafd = marc21_decode($item['Item']['588']);
						if (isset($notafd['a'])) {echo $notafd['a']; $masdetalles++;}
						if (isset($notafd['b'])) {echo " " . $notafd['b']; $masdetalles++;}
						if (isset($notafd['d'])) {echo " " . $notafd['d']; $masdetalles++;}
						if (isset($notafd['u'])) {echo " " . $notafd['u']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['600'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Punto de acceso adicional de materia - Nombre de persona'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$puntoaccesoamnp = marc21_decode($item['Item']['600']);
						if (isset($puntoaccesoamnp['a'])) {echo $puntoaccesoamnp['a']; $masdetalles++;}
						if (isset($puntoaccesoamnp['d'])) {echo " " . $puntoaccesoamnp['d']; $masdetalles++;}
						if (isset($puntoaccesoamnp['c'])) {echo " " . $puntoaccesoamnp['c']; $masdetalles++;}
						if (isset($puntoaccesoamnp['e'])) {echo " " . $puntoaccesoamnp['e']; $masdetalles++;}
						if (isset($puntoaccesoamnp['v'])) {echo " " . $puntoaccesoamnp['v']; $masdetalles++;}
						if (isset($puntoaccesoamnp['x'])) {echo " " . $puntoaccesoamnp['x']; $masdetalles++;}
						if (isset($puntoaccesoamnp['y'])) {echo " " . $puntoaccesoamnp['y']; $masdetalles++;}
						if (isset($puntoaccesoamnp['z'])) {echo " " . $puntoaccesoamnp['z']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['610'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Punto de acceso adicional de materia - Nombre de entidad corporativa'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$puntoaccesoamnec = marc21_decode($item['Item']['610']);
						if (isset($puntoaccesoamnec['a'])) {echo $puntoaccesoamnec['a']; $masdetalles++;}
						if (isset($puntoaccesoamnec['b'])) {echo " " . $puntoaccesoamnec['b']; $masdetalles++;}
						if (isset($puntoaccesoamnec['e'])) {echo " " . $puntoaccesoamnec['e']; $masdetalles++;}
						if (isset($puntoaccesoamnec['v'])) {echo " " . $puntoaccesoamnec['v']; $masdetalles++;}
						if (isset($puntoaccesoamnec['x'])) {echo " " . $puntoaccesoamnec['x']; $masdetalles++;}
						if (isset($puntoaccesoamnec['y'])) {echo " " . $puntoaccesoamnec['y']; $masdetalles++;}
						if (isset($puntoaccesoamnec['z'])) {echo " " . $puntoaccesoamnec['z']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['650'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Punto de acceso adicional de materia - Término de materia'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$puntoaccesoamtm = marc21_decode($item['Item']['650']);
						if (isset($puntoaccesoamtm['a'])) {echo $puntoaccesoamtm['a']; $masdetalles++;}
						if (isset($puntoaccesoamtm['v'])) {echo " " . $puntoaccesoamtm['v']; $masdetalles++;}
						if (isset($puntoaccesoamtm['x'])) {echo " " . $puntoaccesoamtm['x']; $masdetalles++;}
						if (isset($puntoaccesoamtm['y'])) {echo " " . $puntoaccesoamtm['y']; $masdetalles++;}
						if (isset($puntoaccesoamtm['z'])) {echo " " . $puntoaccesoamtm['z']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['651'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Punto de acceso adicional de materia - Nombre geográfico'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$puntoaccesoamng = marc21_decode($item['Item']['651']);
						if (isset($puntoaccesoamng['a'])) {echo $puntoaccesoamng['a']; $masdetalles++;}
						if (isset($puntoaccesoamng['v'])) {echo " " . $puntoaccesoamng['v']; $masdetalles++;}
						if (isset($puntoaccesoamng['x'])) {echo " " . $puntoaccesoamng['x']; $masdetalles++;}
						if (isset($puntoaccesoamng['y'])) {echo " " . $puntoaccesoamng['y']; $masdetalles++;}
						if (isset($puntoaccesoamng['z'])) {echo " " . $puntoaccesoamng['z']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['700'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Punto de acceso adicional - Nombre personal'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$puntoaccesoanp = marc21_decode($item['Item']['700']);
						if (isset($puntoaccesoanp['a'])) {echo $puntoaccesoanp['a']; $masdetalles++;}
						if (isset($puntoaccesoanp['b'])) {echo " " . $puntoaccesoanp['b']; $masdetalles++;}
						if (isset($puntoaccesoanp['c'])) {echo " " . $puntoaccesoanp['c']; $masdetalles++;}
						if (isset($puntoaccesoanp['d'])) {echo " " . $puntoaccesoanp['d']; $masdetalles++;}
						if (isset($puntoaccesoanp['e'])) {echo " " . $puntoaccesoanp['e']; $masdetalles++;}
						if (isset($puntoaccesoanp['q'])) {echo " " . $puntoaccesoanp['q']; $masdetalles++;}
						if (isset($puntoaccesoanp['t'])) {echo " " . $puntoaccesoanp['t']; $masdetalles++;}
						if (isset($puntoaccesoanp['4'])) {echo " " . $puntoaccesoanp['4']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['710'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Punto de acceso adicional - Nombre corporativo'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$puntoaccesoanc = marc21_decode($item['Item']['710']);
						if (isset($puntoaccesoanc['a'])) {echo $puntoaccesoanc['a']; $masdetalles++;}
						if (isset($puntoaccesoanc['b'])) {echo " " . $puntoaccesoanc['b']; $masdetalles++;}
						if (isset($puntoaccesoanc['e'])) {echo " " . $puntoaccesoanc['e']; $masdetalles++;}
						if (isset($puntoaccesoanc['t'])) {echo " " . $puntoaccesoanc['t']; $masdetalles++;}
						if (isset($puntoaccesoanc['4'])) {echo " " . $puntoaccesoanc['4']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['740'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Punto de acceso adicional - Título relacionado o analítico no controlado'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$puntoaccesoatranc = marc21_decode($item['Item']['740']);
						if (isset($puntoaccesoatranc['a'])) {echo $puntoaccesoatranc['a']; $masdetalles++;}
						if (isset($puntoaccesoatranc['n'])) {echo " " . $puntoaccesoatranc['n']; $masdetalles++;}
						if (isset($puntoaccesoatranc['p'])) {echo " " . $puntoaccesoatranc['p']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['773'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Enlace al documento fuente'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$enlacedf = marc21_decode($item['Item']['773']);
						if (isset($enlacedf['a'])) {echo $enlacedf['a']; $masdetalles++;}
						if (isset($enlacedf['b'])) {echo " " . $enlacedf['b']; $masdetalles++;}
						if (isset($enlacedf['d'])) {echo " " . $enlacedf['d']; $masdetalles++;}
						if (isset($enlacedf['g'])) {echo " " . $enlacedf['g']; $masdetalles++;}
						if (isset($enlacedf['h'])) {echo " " . $enlacedf['h']; $masdetalles++;}
						if (isset($enlacedf['k'])) {echo " " . $enlacedf['k']; $masdetalles++;}
						if (isset($enlacedf['n'])) {echo " " . $enlacedf['n']; $masdetalles++;}
						if (isset($enlacedf['q'])) {echo " " . $enlacedf['q']; $masdetalles++;}
						if (isset($enlacedf['t'])) {echo " " . $enlacedf['t']; $masdetalles++;}
						if (isset($enlacedf['z'])) {echo " " . $enlacedf['z']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['850'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Institución que posee los fondos'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$fondos = marc21_decode($item['Item']['850']);
						if (isset($fondos['a'])) {echo $fondos['a']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['852'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Localización'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$localizacion = marc21_decode($item['Item']['852']);
						if (isset($localizacion['a'])) {echo $localizacion['a']; $masdetalles++;}
						if (isset($localizacion['b'])) {echo " " . $localizacion['b']; $masdetalles++;}
						if (isset($localizacion['c'])) {echo " " . $localizacion['c']; $masdetalles++;}
						if (isset($localizacion['h'])) {echo " " . $localizacion['h']; $masdetalles++;}
						if (isset($localizacion['i'])) {echo " " . $localizacion['i']; $masdetalles++;}
						if (isset($localizacion['j'])) {echo " " . $localizacion['j']; $masdetalles++;}
						if (isset($localizacion['k'])) {echo " " . $localizacion['k']; $masdetalles++;}
						if (isset($localizacion['m'])) {echo " " . $localizacion['m']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
			
			<?php if (!empty($item['Item']['856'])) { ?>
			<tr>
				<td style="text-align: right;"><b><?php __('Localización y acceso electrónicos'); ?>:</b></td>
				<td style="padding-left: 1%;">
					<?php
						$localizacionae = marc21_decode($item['Item']['856']);
						if (isset($localizacionae['a'])) {echo $localizacionae['a']; $masdetalles++;}
						if (isset($localizacionae['d'])) {echo " " . $localizacionae['d']; $masdetalles++;}
						if (isset($localizacionae['u'])) {echo " " . $localizacionae['u']; $masdetalles++;}
					?>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
	
	<br />
	
	<div class="row">
	<?php if ($item['Item']['item_content_type'] == "application/pdf") { ?>
		<?php if ($item['Item']['item_file_path']) { ?>
			<!-- <iframe src="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <iframe src="http://docs.google.com/viewer?url=<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <object width="99%" height="600" type="application/pdf" data="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>">
			<param name="src" value="<?php //echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" />
			<p>N o PDF available</p>
			</object> -->
			
			<?php if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){ ?>
				<object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px">
			<?php } else { ?>
				<object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px">
			<?php } ?>
			
			<br /><br />
			
			<div style="text-align: center;">
				Lamentablemente este navegador no posee un plugin para visualizar PDF's.
			<br />
				Instale un plugin para visualizar el PDF. 
			<br /><br /><br /><br />
			</div>
			
				</object>
		<?php } ?>
	<?php } ?>
	
	<?php $tipo = explode('/', $item['Item']['item_content_type']); ?>
	<?php if ($tipo[0] == "image") { ?>
		<?php if ($_SERVER['HTTP_HOST'] != "orpheus.human.ucv.ve"){ ?>
				<img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="100%">
			<?php } else { ?>
				<img src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/app/webroot/files/' . $item['Item']['item_file_path']; ?>" width="100%">
			<?php } ?>
	<?php } ?>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#biblioteca').click(function (e) {
		e.preventDefault();
		$('#UserItemAddForm').submit();
	});

	var mas = '<?php echo $masdetalles; ?>';
	if (mas != '0') {
		$('#mas').show();
	}
	
	$('#mas').click(function (e) {
		$("#more").toggle('fast');
		
		if ($('#mas').html() == "Ver Más Detalles") {
			$('#mas').html("Ver Menos Detalles");
		} else {
			$('#mas').html("Ver Más Detalles");
		}
	});
});
</script>	