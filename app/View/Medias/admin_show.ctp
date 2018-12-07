<h3>Insérer l'image</h3>

<img src="<?php echo $src; ?>">


<?php echo $this->Form->create('Media'); ?>
	<?php echo $this->Form->input('alt',array('label'=>"Descrição da imagem","value"=>$alt)); ?>
	<?php echo $this->Form->input('src',array('label'=>"Caminho da imagem","value"=>$src)); ?>
	<?php echo $this->Form->input('class',array('legend'=>"Alinhamento","options"=>array(
		"alignLeft" => "Alinhar à esquerda",
		"alignCenter" => "Alinhar ao centro",
		"alignRight" => "Alinhar à direita"
	),'type'=>'radio','value'=>$class)); ?>
<?php echo $this->Form->end('Inserir na minha página'); ?>

