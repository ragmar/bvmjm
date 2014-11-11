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
echo $this->Html->script('jquery.printPage.js');
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
<style type="text/css">
	#bljaIMGte{
		float:left;position:relative;
		}
	#bljaIMGte .bljaIMGtex
	{width:320px;position:absolute;top:540px;left:14px;
	}
	
</style>
<style type="text/css">
#caja{
   color: #fff;
   background-color: #fff;
   margin-top:-97px;
   width: 480px;
   margin-left: 10px;
   position: relative;
   opacity: 0.7;
   height: '90px;
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

<style>
img.expando{
margin:10px;
vertical-align: top; 
}
</style>

<script type='text/javascript'>
//<![CDATA[

/* Expando Image Script 2008 John Davenport Scheuer
as first seen in http://www.dynamicdrive.com/forums/
username: jscheuer1 - This Notice Must Remain for Legal Use
*/

if (document.images){
(function(){
var cos, a = /Apple/.test(navigator.vendor), times = a? 20 : 40, speed = a? 40 : 20;
var expConIm = function(im){
im = im || window.event;
if (!expConIm.r.test (im.className))
im = im.target || im.srcElement || null;
if (!im || !expConIm.r.test (im.className))
return;
var e = expConIm,
widthHeight = function(dim){
return dim[0] * cos + dim[1] + 'px';
},
resize = function(){
cos = (1 - Math.cos((e.ims[i].jump / times) * Math.PI)) / 2;
im.style.width = widthHeight (e.ims[i].w);
im.style.height = widthHeight (e.ims[i].h);
if (e.ims[i].d && times > e.ims[i].jump){
++e.ims[i].jump;
e.ims[i].timer = setTimeout(resize, speed);
} else if (!e.ims[i].d && e.ims[i].jump > 0){
--e.ims[i].jump;
e.ims[i].timer = setTimeout(resize, speed);
}
}, d = document.images, i = d.length - 1;
for (i; i > -1; --i)
if(d[i] == im) break;
i = i + im.src;
if (!e.ims[i]){
im.title = '';
e.ims[i] = {im : new Image(), jump : 0};
e.ims[i].im.onload = function(){
e.ims[i].w = [e.ims[i].im.width - im.width, im.width];
e.ims[i].h = [e.ims[i].im.height - im.height, im.height];
e (im);
};
e.ims[i].im.src = im.src;
return;
}
if (e.ims[i].timer) clearTimeout(e.ims[i].timer);
e.ims[i].d = !e.ims[i].d;
resize ();
};

expConIm.ims = {};

expConIm.r = new RegExp('\\bexpando\\b');

if (document.addEventListener){
document.addEventListener('mouseover', expConIm, false);
document.addEventListener('mouseout', expConIm, false);
}
else if (document.attachEvent){
document.attachEvent('onmouseover', expConIm);
document.attachEvent('onmouseout', expConIm);
}
})();
}
//]]>
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  
  
  
 function imprimir()
     {
     	
     	var html = '';
     	var pwin;
     	<?php
     	$title = marc21_decode($item['Item']['245']); ?>;
     	html =  '<html><head>';
     	html += '<style type="text/css">img { float: left; margin: 0; padding: 0;}</style>';
     	html += '<style type="text/css">#bljaIMGte{float:left;position:relative}</style>';
		html += '<style type="text/css">#bljaIMGte .bljaIMGtex{width:320px;position:absolute;top:540px;left:14px;}</style>';
     //	html += '<style type="text/css">#caja{color: #fff;background-color: #fff;width: 480px;margin-left: 10px;margin-top:550px;position: absolute;opacity: 0.7;height:90px}</style>';
     	//html += '<link rel="stylesheet" type="text/css" href="/webroot/css/abyayala/abyayala.css" />';
     	html += '<link rel="stylesheet" type="text/css" href="/webroot/css/nuevo/bootstrap.min.css" /></head><body>';
     	html += '<div class="row">';
     	html += '<div class="container">';
     	html += '<h1> <?php echo $title['a'] ?></h1>';
     	html += '<hr>';
     	html += '<div id="bljaIMGte" >';
        html += '<?php echo $this->Html->image('/webroot/covers/' . $item['Item']['cover_path'], array('width' => '500px', 'height'=>'600px', 'margin-left'=>'900px'))?>' ;
        html += '<div id="caja" style= "color: #fff;background-color: #fff;width: 502px;margin-left: -1px;margin-top:508px;position: absolute;opacity: 0.7;height:132px"><p style="text-align:center;color: #6C3F30;margin-top:-2px" ><b>Universidad Central de Venezuela </br>Biblioteca Virtual Musicológica "Juan Meserón"</b></p>';	
        html += '<div id="img" style="margin-left: 130px;width:100px; height: 40px;margin-top:-20px;"> <?php echo $this->Html->image('/webroot/img/iconografia/logo5.png', array('display'=>'block','margin-right'=>'auto','margin-left'=>'auto','width'=> '175px', 'height'=>'46px', 'margin-top'=>'-20px'))?>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '<br clear="both">';
        html += '</body></html>';
        pwin = window.open(html, "_blank", "width=1000, height=1000, scrollbars=yes");
        pwin.document.write(html);
        pwin.onload = pwin.print;
	    pwin.document.close();
     }
     
  

</script>


  
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a></li>
  <li><a href="<?php echo $this->base; ?>/printeds">Música Impresa</a></li>
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
				if (($item['Item']['cover_name']) && (file_exists($_SERVER['DOCUMENT_ROOT'] . "/".$this->base."/webroot/covers/" . $item['Item']['cover_path']))){
					echo $this->Html->image("/webroot/covers/" . $item['Item']['cover_path'], array('width' => '90%','height' => '183px', 'class'=>'expando', 'title' => $item['Item']['cover_name']));
				} else {
					echo $this->Html->image("/webroot/img/sin_portada.jpg", array('width' => '90%'));
				}
			?>
		</div>
	</div>
	<div class="col-md-7 column">
		<h2>Detalles de la obra</h2>
				
		<div>
			<dl class="dl-horizontal">
				<dt><?php __('Título'); ?>:</dt>
				<dd>
				<?php
					if (!empty($item['Item']['245'])) {
						$title = marc21_decode($item['Item']['245']);
						if ($title) {
							echo $title['a'] . '.';
							if (isset($title['b'])) {echo '<br />' . $title['b']. '.';}
							if (isset($title['c'])) {echo '<br />' . $title['c']. '.';}
							if (isset($title['h'])) {echo '<br />' . $title['h']. '.';}
						}
					}
				?>
				</dd>
				<dt><?php __('Publicación'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['260'])) {
							$year_century = marc21_decode($item['Item']['260']);
							echo $year_century['a'] . '.';
							if (isset($year_century['b'])) {echo '<br />' . $year_century['b']. '.';}
							if (isset($year_century['c'])) {echo '<br />' . $year_century['c']. '.';}
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
				
				<?php if (!empty($item['Item']['650'])) { ?>
				<dt><?php __('Temas'); ?>:</dt>
				<dd>
					<?php
						if (!empty($item['Item']['650'])) {
							$mattername = marc21_decode($item['Item']['650']);
							echo $mattername['a'];
						}
					?>
				</dd>
				<?php } ?>
				
				<?php if (!empty($item['Item']['031'] )){ ?>
					<dt><?php __('Íncipit Literario:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['031'])) {
							$literary = marc21_decode($item['Item']['031']);
							echo $literary['t'];
						}
					?>
					<?php } ?>
					
					<?php if (!empty($item['Item']['5922'] )){ ?>
					<dt><?php __('Medio Sonoro:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['5922'])) {
							$sound = marc21_decode($item['Item']['5922']);
							echo $sound['b'];
						}
						?>
					<?php } ?>
					
					<?php if (!empty($item['Item']['5922'] )){ ?>
					<dt><?php __('Género:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['5922'])) {
								$gender = marc21_decode($item['Item']['5922']);
							echo $gender ['c'];
						}
						?>
					<?php } ?>
					
					<?php if (!empty($item['Item']['5922'] )){ ?>
					<dt><?php __('Tonalidad:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['5922'])) {
							$hue = marc21_decode($item['Item']['5922']);
							echo $hue ['f'];
						}
						?>
					<?php } ?>
					
					<?php if (!empty($item['Item']['700'] )){ ?>
					<dt><?php __('Mención de </br> Responsabilidad:');?></dt>
					<dd>
					<?php
						if (!empty($item['Item']['700'])) {
							$responsability = marc21_decode($item['Item']['700']);
							echo "</br>", $responsability ['a'];
						}
						?>
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
					echo $this->Html->link('Agregar Obra', array('action' => '/add'), array('class' => 'btn-primary', 'title' => 'Agregar Obra'));
					echo $this->Html->link('Modificar Obra', array('action' => '/edit/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Modificar Obra'));
				}
			?>
			<?php
				echo $this->Form->hidden('user_id', array('type' => 'text', 'value' => $this->Session->read('Auth.User.id')));
				echo $this->Form->hidden('item_id', array('type' => 'text', 'value' => $item['Item']['id']));
				echo $this->Html->link('Agregar a Mi Biblioteca', array('action' => '#'), array('id' => 'biblioteca', 'class' => 'btn-primary', 'title' => 'Agregar a Mi Biblioteca', 'onclick' => 'return false;'));
				echo $this->Html->link('Ver Formato MARC21', array('action' => 'marc21/'.$item['Item']['id']), array('class' => 'btn-primary', 'title' => 'Formato MARC21'));
			?>
			<?php if (!empty($item['Item']['cover_path'])) { ?>
				<a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/webroot/covers/' . $item['Item']['cover_path']; ?>" class="btn-primary" target="_blank" title="Descargue el documento en su computadora.">Descargar Imagen</a>
			<?php } ?>
			
			<?php if (!empty($item['Item']['cover_path'])) { ?>
				<a href="#" onclick="return imprimir();" class="btn-primary" target="_blank" title="Imprimir Imagen.">Imprimir Imagen</a>
			<?php } ?>	
		</form>
	</div>
	
	<div style="clear: both;"><br /></div>
	
	<?php if ($item['Item']['item_content_type'] == "application/pdf") { ?>
		<?php if ($item['Item']['item_file_path']) { ?>
			<!-- <iframe src="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <iframe src="http://docs.google.com/viewer?url=<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" width="99%" height="600px"></iframe> -->
			<!-- <object width="99%" height="600" type="application/pdf" data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>">
			<param name="src" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" />
			<p>N o PDF available</p>
			</object> -->
			
			<object data="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" type="application/pdf" width="100%" height="600px">
			<br /><br />
			<div style="text-align: center;">
				Lamentablemente este navegador no posee un plugin para visualizar PDF's.
			
</div>
			<br />
				Instale un plugin para visualizar el PDF o descargue el archivo <a href="http://<?php echo $_SERVER['HTTP_HOST'] . $this->base . '/webroot/files/' . $item['Item']['item_file_path']; ?>" target="_blank" title="Descargue el documento en su computadora.">aquí</a>. 
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