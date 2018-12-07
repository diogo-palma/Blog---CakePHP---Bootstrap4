<style>
   .btn-sm{
      border: 1px solid #ccc;
   }
</style>

<div class="row">
	<h1>Gerenciar Posts</h1>
</div>

<p><?php echo $this->Html->link("Postar",array('action'=>'edit'),array('class'=>'btn btn-primary')); ?></p>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Título</th>
		<th>Ativo?</th>
		<th>Ações</th>
	</tr>
	<?php foreach($posts as $k=>$v): $v = current($v); ?>
	<tr>
		<td><?php echo $v['id']; ?></td>
		<td><?php echo $v['name']; ?></td>
		<td><?php echo $v['online']=='0'?'<span class="badge badge-danger">Off-line</span>':'<span class="badge badge-success">Online</span>'; ?></td>
		<td>
			<?php echo $this->Html->link("Editar",array('action'=>'edit',$v['id']),array('class'=>'btn btn-light btn-sm')); ?> | 
			<?php echo $this->Html->link("Apagar",array('action'=>'delete',$v['id']),array('class'=>'btn btn-danger btn-sm'),'Tem certeza que deseja apagar?'); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->Paginator->numbers(); ?>