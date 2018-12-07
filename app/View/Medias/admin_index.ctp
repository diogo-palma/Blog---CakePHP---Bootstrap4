
<table>
	<tr>
		<th>Imagem</th>
		<th>Nome</th>
		<th>Ação</th>
	</tr>
	
</table>


<h3>Add uma imagem</h3>

<?php echo $this->Form->create('Media',array('type'=>'file')); ?>
	<?php echo $this->Form->input('file',array('label'=>"Imagem (formato png/jpg)","type"=>"file")); ?>
	<?php echo $this->Form->input('name',array('label'=>"Nome da Imagem")); ?>
<?php echo $this->Form->end('Add'); ?>

<h3>da Web</h3>

<?php echo $this->Form->create('Media'); ?>
	<?php echo $this->Form->input('url',array('label'=>"URL da imagem")); ?>
<?php echo $this->Form->end('inserir'); ?>