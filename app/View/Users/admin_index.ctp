<div class="page-header">
	<h1>Usuários</h1>
</div>

<p><?php echo $this->Html->link("Adicionar",array('action'=>'edit'),array('class'=>'btn btn-primary')); ?></p>

<table class="table">
	<tr>
		<th>ID</th>
		<th>Login</th>
		<th>Função</th>
		<th>Ações</th>
	</tr>
	<?php foreach($users as $k=>$v): $v = current($v); ?>
	<tr>
		<td><?php echo $v['id']; ?></td>
		<td><?php echo $v['username']; ?></td>
		<td><?php echo $v['role']; ?></td>
		<td>
         <?php echo $this->Html->link("Editar",array('action'=>'edit',$v['id']),array('class'=>'btn btn-light btn-sm')); ?> | 
			<?php echo $this->Html->link("Apagar",array('action'=>'delete',$v['id']),array('class'=>'btn btn-danger btn-sm'),'Tem certeza que deseja apagar?'); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->Paginator->numbers(); ?>
