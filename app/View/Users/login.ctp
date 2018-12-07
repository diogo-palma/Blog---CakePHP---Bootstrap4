<div class="page-header">
	<h1>Login</h1>
</div>

<style>
   .btn-primary{
      margin-top: 10px;
   }
   input{
      width: 280px;
   }
</style>
<?php echo $this->Form->create('User'); ?>
	<?php echo $this->Form->input('username',array('label'=>"Usuário")); ?>
	<?php echo $this->Form->input('password',array('label'=>"Senha")); ?>
   <?php echo $this->Form->button("Entrar", array("id" => "createSchedule", "class" => "btn btn-primary", "type" => "submit"));
echo $this->Form->end(); ?>