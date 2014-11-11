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
		width: 15px;
		height: 35px;
		margin: 2px 2px 0px 0px;
		padding: 8px 0px 0px 0px;
		text-align: center;
		float: left;
	}
	
	.btn-primary:hover {
		text-decoration: none;
	}
	.btn-primaryt:hover {
	border-radius: 0px;
	border: solid 1px #6C3F30;
	background: #E8DED4;
	color: #6C3F30;
}
	.btn-primaryt {
		width: 24px;
		height: 35px;
		margin: 2px 2px 0px 0px;
		padding: 8px 0px 0px 0px;
		text-align: center;
		float: left;
	}
	.btn-primaryt {
	border-radius: 0px;
	background: #6C3F30;
	border-color: #6C3F30;
	}
	.btn-primaryt {
	color: #fff;
	}
	.btn-primaryt:hover {
		text-decoration: none;
	}
</style>
<ul class="breadcrumb" style="margin: 0">
  <li>Música Manuscrita</li>
</ul>

<div class='century view'>
	<div class="col-md-9 column">
	<h2>Módulo de Música Manuscrita</h2>
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
					echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '80px','height'=>'100px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
				} else {
					echo $this->Html->image("/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'manuscripts', 'action' => 'view', $item['Item']['id'])));
				}
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
									
									if (!empty($this->data['manuscripts']['Titulo'])) {
										echo '<b>' . $title['a'] . '.</b>';
									} else {
										echo $title['a'] . '.';
									}
									
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
								if (!empty($this->data['manuscripts']['Autor'])) {
									echo '<b>' . $author['a'] . '.</b>';
								} else {
									echo $author['a'] . '.';
								}
								if (isset($author['d'])) {echo ' ' . $author['d']. '.';}
							}
						?>
					</dd>
					<?php if (!empty($item['Item']['653'])) { ?>
					<dt style="width: 120px"><?php __('Materia:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$matter = marc21_decode($item['Item']['653']);
						if (!empty($this->data['manuscripts']['Materia'])) {
							echo '<b>' . $matter['a'] . '.</b>';
						} else {
							echo $matter['a'] . '.';
						}
					?>
					</dd>
					<?php } ?>
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
					
					<?php if (!empty($item['Item']['650'])) { ?>
					<dt style="width: 120px"><?php __('Temas:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$mattername = marc21_decode($item['Item']['650']);
						if (!empty($this->data['manuscripts']['Temas'])) {
							echo '<b>' . $mattername['a'] . '.</b>';
						} else {
							echo $mattername['a'] . '.';
						}
					?>
					</dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['031'] )){ ?>
					<dt style="width: 120px"><?php __('Íncipit Literario:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$literary = marc21_decode($item['Item']['031']);
						if (!empty($this->data['manuscripts']['IncipitLiterario'])) {
							echo '<b>' . $literary['t'] . '.</b>';
						} else {
							echo $literary['t'] . '.';
						}
					?>
					</dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['5922'] )){ ?>
					<dt style="width: 120px"><?php __('Medio Sonoro:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$sound = marc21_decode($item['Item']['5922']);
						if (!empty($this->data['manuscripts']['MedioSonoro'])) {
							echo '<b>' . $sound ['b'] . '.</b>';
						} else {
							echo $sound['b'] . '.';
						}
						?>
						</dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['5922'] )){ ?>
					<dt style="width: 120px"><?php __('Género:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$gender = marc21_decode($item['Item']['5922']);
						if (!empty($this->data['manuscripts']['Genero'])) {
							echo '<b>' . $gender['c'] . '.</b>';
						} else {
							echo $gender['c'] . '.';
						}
						?>
						</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['5922'])) { ?>
						<dt style="width: 120px"><?php __('Tonalidad:');?></dt>
						<dd style="margin-left: 130px">
						<?php
						$hue = marc21_decode($item['Item']['5922']);
						if (!empty($this->data['manuscripts']['Tonalidad'])) {
							echo '<b>' . $hue['f'] . '.</b>';
						} else {
							echo $hue['f'] . '.';
						}
						?>
					</dd>
					<?php } ?>
					<?php if (!empty($item['Item']['700'] )){ ?>
					<dt style="width: 140px; margin-left: -20px;"><?php __('Mención </br> de Responsabilidad:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$responsability = marc21_decode($item['Item']['700']);
						if (!empty($this->data['manuscripts']['Responsabilidad'])) {
							echo '<b>' . $responsability ['a'] . '.</b>';
						} else {
							echo "</br>", $responsability ['a'] . '.';
						}
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
			<?php if (isset($this->data)) { ?>
				<p>No hay obra que coincidan con ese filtro.</p>
			<?php } else { ?>
				<p>No hay obras en este momento.</p>
			<?php } ?>
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
		<?php if (($this->Session->check('Auth.User') && ($this->Session->read('Auth.User.group_id') != '3'))) { ?>
			<br />
			<label><?php __('Acciones:'); ?></label>
			<br />
			<?php echo $this->Html->link(__('Agregar Obra', true), array('action' => 'add'), array('class' => 'btn btn-primary', 'style' => 'width: 100%;')); ?>
			<br /><br />
		<?php } ?>
		<br />
		<label style="border-bottom: solid 1px #6C3F30;"><?php __('Filtrar por:'); ?></label>
		<br />
		
		<?php echo $this->Form->create('manuscripts'); ?>

		<div style="clear: both;">
			<label>Título:</label><br />
			<?php echo $this->Form->hidden('Titulo', array('class' => 'form-control', 'label' => 'Título')); ?>
			<?php echo $this->Html->link('A', array('action' => 'A'), array('id' => 'titulo-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => 'B'), array('id' => 'titulo-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => 'C'), array('id' => 'titulo-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => 'D'), array('id' => 'titulo-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => 'E'), array('id' => 'titulo-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => 'F'), array('id' => 'titulo-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => 'G'), array('id' => 'titulo-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => 'H'), array('id' => 'titulo-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => 'I'), array('id' => 'titulo-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => 'J'), array('id' => 'titulo-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => 'K'), array('id' => 'titulo-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => 'L'), array('id' => 'titulo-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => 'M'), array('id' => 'titulo-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => 'N'), array('id' => 'titulo-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => 'O'), array('id' => 'titulo-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => 'P'), array('id' => 'titulo-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => 'Q'), array('id' => 'titulo-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => 'R'), array('id' => 'titulo-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => 'S'), array('id' => 'titulo-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => 'T'), array('id' => 'titulo-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => 'U'), array('id' => 'titulo-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => 'V'), array('id' => 'titulo-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => 'W'), array('id' => 'titulo-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => 'X'), array('id' => 'titulo-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => 'Y'), array('id' => 'titulo-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => 'Z'), array('id' => 'titulo-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTitulo").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => ''), array('id' => 'titulo-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsTitulo").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Titulo']; ?>" != "") {
				$("#<?php echo "titulo-".$this->data['manuscripts']['Titulo']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "titulo-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">
			<label>Autor:</label><br />
			<?php echo $this->Form->hidden('Autor', array('class' => 'form-control', 'label' => 'Autor')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'autor-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'autor-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'autor-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'autor-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'autor-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'autor-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'autor-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'autor-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'autor-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'autor-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'autor-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'autor-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'autor-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'autor-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'autor-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'autor-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'autor-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'autor-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'autor-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'autor-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'autor-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'autor-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'autor-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'autor-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'autor-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'autor-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsAutor").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'autor-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsAutor").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Autor']; ?>" != "") {
				$("#<?php echo "autor-".$this->data['manuscripts']['Autor']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "autor-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Materia:</label><br />
			<?php echo $this->Form->hidden('Materia', array('class' => 'form-control', 'label' => 'Materia')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'materia-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'materia-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'materia-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'materia-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'materia-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'materia-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'materia-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'materia-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'materia-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'materia-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'materia-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'materia-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'materia-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'materia-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'materia-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'materia-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'materia-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'materia-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'materia-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'materia-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'materia-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'materia-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'materia-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'materia-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'materia-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'materia-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMateria").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'materia-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsMateria").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Materia']; ?>" != "") {
				$("#<?php echo "materia-".$this->data['manuscripts']['Materia']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "materia-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
			<div style="clear: both;">
			<label>Íncipit Literario:</label><br />
			<?php echo $this->Form->hidden('IncipitLiterario', array('class' => 'form-control', 'label' => 'IncipitLiterario')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'incipitliterario-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'incipitliterario-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'incipitliterario-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'incipitliterario-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'incipitliterario-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'incipitliterario-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'incipitliterario-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'incipitliterario-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'incipitliterario-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'incipitliterario-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'incipitliterario-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'incipitliterario-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'incipitliterario-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'incipitliterario-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'incipitliterario-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'incipitliterario-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'incipitliterario-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'incipitliterario-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'incipitliterario-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'incipitliterario-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'incipitliterario-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'incipitliterario-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'incipitliterario-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'incipitliterario-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'incipitliterario-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'incipitliterario-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsIncipitLiterario").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'incipitliterario-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsIncipitLiterario").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['IncipitLiterario']; ?>" != "") {
				$("#<?php echo "incipitliterario-".$this->data['manuscripts']['IncipitLiterario']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "incipitliterario-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Temas:</label><br />
			<?php echo $this->Form->hidden('Temas', array('class' => 'form-control', 'label' => 'Temas')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'temas-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'temas-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'temas-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'temas-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'temas-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'temas-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'temas-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'temas-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'temas-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'temas-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'temas-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'temas-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'temas-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'temas-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'temas-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'temas-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'temas-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'temas-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'temas-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'temas-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'temas-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'temas-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'temas-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'temas-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'temas-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'temas-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsTemas").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'temas-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsTemas").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Temas']; ?>" != "") {
				$("#<?php echo "temas-".$this->data['manuscripts']['Temas']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "temas-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>

		<div style="clear: both;">		
			<label>Medio Sonoro:</label><br />
			<?php echo $this->Form->hidden('MedioSonoro', array('class' => 'form-control', 'label' => 'MedioSonoro')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'mediosonoro-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'mediosonoro-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'mediosonoro-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'mediosonoro-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'mediosonoro-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'mediosonoro-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'mediosonoro-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'mediosonoro-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'mediosonoro-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'mediosonoro-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'mediosonoro-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'mediosonoro-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'mediosonoro-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'mediosonoro-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'mediosonoro-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'mediosonoro-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'mediosonoro-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'mediosonoro-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'mediosonoro-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'mediosonoro-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'mediosonoro-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'mediosonoro-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'mediosonoro-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsmediosonoro").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'mediosonoro-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'mediosonoro-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'mediosonoro-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsMedioSonoro").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'mediosonoro-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsMedioSonoro").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['MedioSonoro']; ?>" != "") {
				$("#<?php echo "mediosonoro-".$this->data['manuscripts']['MedioSonoro']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "mediosonoro-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Género:</label><br />
			<?php echo $this->Form->hidden('Genero', array('class' => 'form-control', 'label' => 'Genero')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'Genero-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'Genero-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'Genero-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'Genero-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'Genero-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'Genero-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'Genero-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'Genero-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'Genero-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'Genero-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'Genero-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'Genero-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'Genero-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'Genero-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'Genero-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'Genero-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'Genero-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'Genero-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'Genero-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'Genero-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'Genero-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'Genero-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'Genero-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'Genero-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'Genero-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'Genero-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsGenero").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'Genero-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsGenero").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Genero']; ?>" != "") {
				$("#<?php echo "Genero-".$this->data['manuscripts']['Genero']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "Genero-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Tonalidad:</label><br />
			<?php echo $this->Form->hidden('Tonalidad', array('class' => 'form-control', 'label' => 'Tonalidad')); ?>
			<?php echo $this->Html->link('Do', array('action' => '/D'), array('id' => 'Tonalidad-D', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Re', array('action' => '/R'), array('id' => 'Tonalidad-R', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Mi', array('action' => '/M'), array('id' => 'Tonalidad-M', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Fa', array('action' => '/F'), array('id' => 'Tonalidad-F', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Sol', array('action' => '/SOL'), array('id' => 'Tonalidad-SOL', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("SOL"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('La', array('action' => '/L'), array('id' => 'Tonalidad-L', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Si', array('action' => '/SI'), array('id' => 'Tonalidad-SI', 'class' => 'btn-primaryt', 'onclick' => '$("#manuscriptsTonalidad").val("SI"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'Tonalidad-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsTonalidad").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Tonalidad']; ?>" != "") {
				$("#<?php echo "Tonalidad-".$this->data['manuscripts']['Tonalidad']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 23px;');
			} else {
				$("#<?php echo "Tonalidad-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		
		<div style="clear: both;">		
			<label>Meción de Responsabilidad:</label><br />
			<?php echo $this->Form->hidden('Responsabilidad', array('class' => 'form-control', 'label' => 'Responsabilidad')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'Responsabilidad-A', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("A"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'Responsabilidad-B', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("B"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'Responsabilidad-C', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("C"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'Responsabilidad-D', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("D"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'Responsabilidad-E', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("E"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'Responsabilidad-F', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("F"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'Responsabilidad-G', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("G"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'Responsabilidad-H', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("H"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'Responsabilidad-I', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("I"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'Responsabilidad-J', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("J"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'Responsabilidad-K', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("K"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'Responsabilidad-L', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("L"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'Responsabilidad-M', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("M"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'Responsabilidad-N', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("N"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'Responsabilidad-O', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("O"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'Responsabilidad-P', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("P"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'Responsabilidad-Q', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("Q"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'Responsabilidad-R', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("R"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'Responsabilidad-S', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("S"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'Responsabilidad-T', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("T"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'Responsabilidad-U', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("U"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'Responsabilidad-V', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("V"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'Responsabilidad-W', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("W"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'Responsabilidad-X', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("X"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'Responsabilidad-Y', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("Y"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'Responsabilidad-Z', 'class' => 'btn-primary', 'onclick' => '$("#manuscriptsResponsabilidad").val("Z"); $("#manuscriptsIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'Responsabilidad-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#manuscriptsResponsabilidad").val(""); $("#manuscriptsIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Responsabilidad']; ?>" != "") {
				$("#<?php echo "Responsabilidad-".$this->data['manuscripts']['Responsabilidad']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "Responsabilidad-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		

		<div style="clear: both;">		
			<label>Año:</label><br />
			<?php echo $this->Form->hidden('Año', array('class' => 'form-control', 'label' => 'Año')); ?>

		<?php echo $this->Html->link(__('Ver Lista de Años', true), array('action' => 'year/'), array('class' => 'btn-primary', 'style' => 'width: 125px;'));?>
		</div>
		
		<script type="text/javascript">
			if ("<?php echo $this->data['manuscripts']['Año']; ?>" != "") {
				$("#<?php echo "año-".$this->data['manuscripts']['Año']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "año-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<br />
		<?php //echo $this->Form->submit('Buscar', array('class' => 'btn btn-primary', 'div' => false)); ?>
		<?php echo $this->Form->end(); ?>
		
		<!--
		<label><?php __('Buscar por:'); ?></label>
		<br />
		<?php echo $this->Html->link(__('Siglo', true), array('action' => 'century'), array('class' => 'btn-primary', 'title' => 'Siglo')); ?>
		<?php echo $this->Html->link(__('Autor', true), array('action' => 'author'), array('class' => 'btn-primary', 'title' => 'Autor')); ?>
		<?php echo $this->Html->link(__('Título', true), array('action' => 'title'), array('class' => 'btn-primary', 'title' => 'Título')); ?>
		<?php echo $this->Html->link(__('Año', true), array('action' => 'year'), array('class' => 'btn-primary', 'title' => 'Año')); ?>
		<?php echo $this->Html->link(__('Materia', true), array('action' => 'matter'), array('class' => 'btn-primary', 'title' => 'Materia')); ?>
		-->
	</div>
</div>