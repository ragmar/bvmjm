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
	<li>
    	<?php echo $this->Html->link(__('Inicio', true), array('controller' => 'pages')); ?>
    </li>
	<li>Hemerografías</li>
</ul>

<div class="books index" style="text-align: justify; float: ">
	<div class="col-md-12 column">
		<h2>Módulo de Hemerografía Musical</h2>
		<hr style="border-color: black; margin: 10px;">
		
		<p style="text-align: justify;">El m&oacute;dulo Hemerograf&iacute;a Musical, contiene las principales publicaciones seriadas venezolanas vinculadas de alguna manera con la m&uacute;sica.
		Se han digitalizado peri&oacute;dicos y revistas que pueden ser consultados por el usuario, siempre y cuando disponga de conexi&oacute;n a la red, a trav&eacute;s de motores de b&uacute;squeda especializados y herramientas musicol&oacute;gicas de alt&iacute;sima calidad, en un portal amigable de f&aacute;cil navegaci&oacute;n.</p><br />
		
		<p style="text-align: justify;">Esta hemerograf&iacute;a vinculada con la m&uacute;sica, de formato y periodicidad diversa, puede clasificarse en tres grandes renglones:</p><br />
		
		<ol style="color: #6c3f30;">
		<li>Aquella de tipo informativo general que, entre otros temas, ofrece comentarios sobre distintos aspectos de la vida musical.</li>
		<li>Aquella de corte cultural donde la m&uacute;sica, las artes pl&aacute;sticas, la literatura, el cine y el teatro son los t&oacute;picos centrales.</li>
		<li>Y aquella especializada en la m&uacute;sica propiamente.</li>
		</ol>
		
		<br />
		
		<p style="text-align: justify;">Estas publicaciones contienen centenares de datos sobre compositores y su entorno, obras, int&eacute;rpretes, eventos, conciertos, rese&ntilde;as cr&iacute;ticas, noticias de la visita de artistas extranjeros al pa&iacute;s, noticias del quehacer de los nacionales fuera de las fronteras, comentarios sobre la actuaci&oacute;n de las bandas, informaci&oacute;n sobre la educación musical, acotaciones sobre est&eacute;tica, datos sobre folclor, y un largo etc&eacute;tera. En algunos casos, adem&aacute;s de las noticias, cr&oacute;nicas y/o rese&ntilde;as, se publicaban partituras, bien como encartados externos (&aacute;lbumes o separatas), o bien dentro del formato propio del peri&oacute;dico o revista. Este conjunto de partituras constituye, tanto por su cantidad como por su calidad, una de las colecciones de m&uacute;sica m&aacute;s importantes decimon&oacute;nicas.</p><br />
		<p style="text-align: justify;">A pesar de sus limitaciones e inexactitudes, las publicaciones seriadas son el testimonio directo y cotidiano del acontecer de una &eacute;poca. De all&iacute; la importancia de su estudio para la reconstrucci&oacute;n de la vida cultural del pa&iacute;s.</p>
		
		<div style="text-align: center;">
			<?php echo $this->Html->link('Ver Hemerografías', '/magazines', array('class' => 'btn btn-primary', 'style' => 'float: none')); ?>
		</div>

	</div>
	
	<!--
	<div class="col-md-3 column">
		<br />
		<label><?php __('Ver Libros por:'); ?></label>
		<br />
		<?php echo $this->Html->link('Siglo', array('action' => 'century'), array('class' => 'btn-primary', 'title' => 'Siglo')); ?>
		<?php echo $this->Html->link('Autor', array('action' => 'author'), array('class' => 'btn-primary', 'title' => 'Autor')); ?>
		<?php echo $this->Html->link('Título', array('action' => 'title'), array('class' => 'btn-primary', 'title' => 'Título')); ?>
		<?php echo $this->Html->link('Año', array('action' => 'year'), array('class' => 'btn-primary', 'title' => 'Año')); ?>
		<?php echo $this->Html->link('Materia', array('action' => 'matter'), array('class' => 'btn-primary', 'title' => 'Materia')); ?>
	</div>
	-->
</div>