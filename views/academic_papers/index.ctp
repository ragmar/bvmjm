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
</style>
<ul class="breadcrumb" style="margin: 0">
  <li>Trabajos Acad&eacute;micos</li>
</ul>

<div class='century view'>
	<div class="col-md-9 column">
	<h2>Módulo de Trabajos Acad&eacute;micos</h2>
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
					echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('title' => 'Haga click para ver los detalles.', 'width' => '70px','height'=>'99px', 'url' => array('controller' => 'academic_papers', 'action' => 'view', $item['Item']['id'])));
				} else {
					echo $this->Html->image("/webroot/img/sin_portada.jpg", array('title' => 'Haga click para ver los detalles.', 'width' => '70px', 'url' => array('controller' => 'academic_papers', 'action' => 'view', $item['Item']['id'])));
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
									
									if (!empty($this->data['academic_papers']['Titulo'])) {
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
								if (!empty($this->data['academic_papers']['Autor'])) {
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
						if (!empty($this->data['academic_papers']['Materia'])) {
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
					<?php if (!empty($item['Item']['773'])) { ?>
					<dt style="width: 120px"><?php __('Fuente:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$source = marc21_decode($item['Item']['773']);
						if (!empty($this->data['academic_papers']['Fuente'])) {
							echo '<b>' . $source['t'] . '.</b>';
						} else {
							echo $source['t'] . '.';
						}
					?>
					</dd>
					<?php } ?>
					
					<?php if (!empty($item['Item']['650'])) { ?>
					<dt style="width: 120px"><?php __('Temas:');?></dt>
					<dd style="margin-left: 130px">
					<?php
						$mattername = marc21_decode($item['Item']['650']);
						if (!empty($this->data['academic_papers']['Temas'])) {
							echo '<b>' . $mattername['a'] . '.</b>';
						} else {
							echo $mattername['a'] . '.';
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
				<p>No hay trabajos que coincidan con ese filtro.</p>
			<?php } else { ?>
				<p>No hay trabajos en este momento.</p>
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
		
		<?php echo $this->Form->create('academic_papers'); ?>

		<div style="clear: both;">
			<label>Título:</label><br />
			<?php echo $this->Form->hidden('Titulo', array('class' => 'form-control', 'label' => 'Título')); ?>
			<?php echo $this->Html->link('A', array('action' => 'A'), array('id' => 'titulo-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => 'B'), array('id' => 'titulo-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => 'C'), array('id' => 'titulo-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => 'D'), array('id' => 'titulo-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => 'E'), array('id' => 'titulo-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => 'F'), array('id' => 'titulo-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => 'G'), array('id' => 'titulo-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => 'H'), array('id' => 'titulo-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => 'I'), array('id' => 'titulo-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => 'J'), array('id' => 'titulo-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => 'K'), array('id' => 'titulo-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => 'L'), array('id' => 'titulo-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => 'M'), array('id' => 'titulo-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => 'N'), array('id' => 'titulo-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => 'O'), array('id' => 'titulo-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => 'P'), array('id' => 'titulo-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => 'Q'), array('id' => 'titulo-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => 'R'), array('id' => 'titulo-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => 'S'), array('id' => 'titulo-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => 'T'), array('id' => 'titulo-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => 'U'), array('id' => 'titulo-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => 'V'), array('id' => 'titulo-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => 'W'), array('id' => 'titulo-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => 'X'), array('id' => 'titulo-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => 'Y'), array('id' => 'titulo-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => 'Z'), array('id' => 'titulo-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTitulo").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => ''), array('id' => 'titulo-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersTitulo").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academic_papers']['Titulo']; ?>" != "") {
				$("#<?php echo "titulo-".$this->data['academic_papers']['Titulo']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "titulo-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">
			<label>Autor:</label><br />
			<?php echo $this->Form->hidden('Autor', array('class' => 'form-control', 'label' => 'Autor')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'autor-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'autor-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'autor-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'autor-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'autor-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'autor-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'autor-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'autor-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'autor-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'autor-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'autor-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'autor-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'autor-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'autor-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'autor-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'autor-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'autor-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'autor-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'autor-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'autor-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'autor-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'autor-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'autor-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'autor-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'autor-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'autor-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersAutor").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'autor-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersAutor").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academic_papers']['Autor']; ?>" != "") {
				$("#<?php echo "autor-".$this->data['academic_papers']['Autor']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "autor-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Materia:</label><br />
			<?php echo $this->Form->hidden('Materia', array('class' => 'form-control', 'label' => 'Materia')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'materia-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'materia-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'materia-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'materia-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'materia-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'materia-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'materia-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'materia-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'materia-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'materia-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'materia-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'materia-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'materia-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'materia-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'materia-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'materia-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'materia-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'materia-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'materia-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'materia-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'materia-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'materia-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'materia-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'materia-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'materia-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'materia-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersMateria").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'materia-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersMateria").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academic_papers']['Materia']; ?>" != "") {
				$("#<?php echo "materia-".$this->data['academic_papers']['Materia']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "materia-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
			<div style="clear: both;">
			<label>Fuente:</label><br />
			<?php echo $this->Form->hidden('Fuente', array('class' => 'form-control', 'label' => 'Fuente')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'fuente-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'fuente-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'fuente-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'fuente-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'fuente-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'fuente-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'fuente-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'fuente-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'fuente-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'fuente-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'fuente-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'fuente-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'fuente-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'fuente-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'fuente-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'fuente-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'fuente-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'fuente-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'fuente-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'fuente-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'fuente-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'fuente-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'fuente-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'fuente-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'fuente-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'fuente-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersFuente").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'fuente-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersFuente").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academic_papers']['Fuente']; ?>" != "") {
				$("#<?php echo "fuente-".$this->data['academic_papers']['Fuente']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "fuente-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>
		
		<div style="clear: both;">		
			<label>Temas:</label><br />
			<?php echo $this->Form->hidden('Temas', array('class' => 'form-control', 'label' => 'Temas')); ?>
			<?php echo $this->Html->link('A', array('action' => '/A'), array('id' => 'temas-A', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("A"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('B', array('action' => '/B'), array('id' => 'temas-B', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("B"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('C', array('action' => '/C'), array('id' => 'temas-C', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("C"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('D', array('action' => '/D'), array('id' => 'temas-D', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("D"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('E', array('action' => '/E'), array('id' => 'temas-E', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("E"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('F', array('action' => '/F'), array('id' => 'temas-F', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("F"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('G', array('action' => '/G'), array('id' => 'temas-G', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("G"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('H', array('action' => '/H'), array('id' => 'temas-H', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("H"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('I', array('action' => '/I'), array('id' => 'temas-I', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("I"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('J', array('action' => '/J'), array('id' => 'temas-J', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("J"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('K', array('action' => '/K'), array('id' => 'temas-K', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("K"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('L', array('action' => '/L'), array('id' => 'temas-L', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("L"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('M', array('action' => '/M'), array('id' => 'temas-M', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("M"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('N', array('action' => '/N'), array('id' => 'temas-N', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("N"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('O', array('action' => '/O'), array('id' => 'temas-O', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("O"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('P', array('action' => '/P'), array('id' => 'temas-P', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("P"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Q', array('action' => '/Q'), array('id' => 'temas-Q', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("Q"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('R', array('action' => '/R'), array('id' => 'temas-R', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("R"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('S', array('action' => '/S'), array('id' => 'temas-S', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("S"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('T', array('action' => '/T'), array('id' => 'temas-T', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("T"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('U', array('action' => '/U'), array('id' => 'temas-U', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("U"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('V', array('action' => '/V'), array('id' => 'temas-V', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("V"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('W', array('action' => '/W'), array('id' => 'temas-W', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("W"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('X', array('action' => '/X'), array('id' => 'temas-X', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("X"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Y', array('action' => '/Y'), array('id' => 'temas-Y', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("Y"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Z', array('action' => '/Z'), array('id' => 'temas-Z', 'class' => 'btn-primary', 'onclick' => '$("#academicPapersTemas").val("Z"); $("#academicPapersIndexForm").submit(); return false;')); ?>
			<?php echo $this->Html->link('Todos', array('action' => '/'), array('id' => 'temas-todos', 'class' => 'btn-primary', 'style' => 'width: 66px;', 'onclick' => '$("#academicPapersTemas").val(""); $("#academicPapersIndexForm").submit(); return false;')); ?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academic_papers']['Temas']; ?>" != "") {
				$("#<?php echo "temas-".$this->data['academic_papers']['Temas']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "temas-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
			}
		</script>

		<div style="clear: both;">		
			<label>Año:</label><br />
			<?php echo $this->Form->hidden('Año', array('class' => 'form-control', 'label' => 'Año')); ?>

		<?php echo $this->Html->link(__('Ver Lista de Años', true), array('action' => 'year/'), array('class' => 'btn-primary', 'style' => 'width: 125px;'));?>
		</div>
		<script type="text/javascript">
			if ("<?php echo $this->data['academic_papers']['Temas']; ?>" != "") {
				$("#<?php echo "temas-".$this->data['academic_papers']['Temas']; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 15px;');
			} else {
				$("#<?php echo "temas-todos"; ?>").attr('style', 'background-color: #e8ded4; border: solid 1px #6c3f30; color: #6c3f30; width: 66px;');
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