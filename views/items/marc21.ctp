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
?>
<ul class="breadcrumb" style="margin: 0">
  <li><a href="<?php echo $this->base; ?>">Inicio</a> <span class="divider">/</span><a href="<?php echo $this->base; ?>/configurations">Configuración</a> <span class="divider">/</span><a href="<?php echo $this->base; ?>/items">Obras</a> <span class="divider">/</span></li>
  <li>
  <a href="<?php echo $this->base; ?>/items/view/<?php echo $item['Item']['id']; ?>">
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
	</a>
  	<span class="divider">/</span> Formato MARC21</li>
</ul>

<br />

<div style="margin-left: 20px;">
<?php
	//debug($item['Item']);
	
	unset($item['Item']['id']);
	unset($item['Item']['user_id']);
	unset($item['Item']['item_file_path']);
	unset($item['Item']['item_file_name']);
	unset($item['Item']['item_file_size']);
	unset($item['Item']['item_content_type']);
	unset($item['Item']['cover_name']);
	unset($item['Item']['cover_path']);
	unset($item['Item']['cover_type']);
	unset($item['Item']['cover_size']);
	unset($item['Item']['published']);
	unset($item['Item']['created']);
	unset($item['Item']['modified']);
	
	foreach ($item['Item'] as $i => $j):
		if ($j != ""){
			echo '=' . $i . '&nbsp;&nbsp;' . str_replace('^', '$', $j) . '<br>';
		}
	endforeach;
?>
</div>