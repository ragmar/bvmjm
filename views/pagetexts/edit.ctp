<?php echo $this->Html->script('tiny_mce/tiny_mce'); ?>
<script type="text/javascript">
tinyMCE.init({
        mode : "textareas",
        theme : "advanced",
        language : "es"
});
</script>
<div class="pagetexts form">
<?php echo $this->Form->create('Pagetext');?>
	<legend><?php __('Edit Pagetext'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('class' => 'form-control'));
		echo $this->Form->input('description', array('class' => 'form-control'));
		echo $this->Form->input('enabled', array('label' => 'Activa'));
	?>
	<br />
	<?php echo $this->Form->submit('Guardar', array('class' => 'btn btn-primary', 'div' => false)); ?>
	<?php echo $this->Html->link(__('Volver', true), array('action' => 'index'), array('class' => 'btn btn-primary')); ?>
<?php echo $this->Form->end();?>