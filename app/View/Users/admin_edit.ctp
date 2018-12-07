<div class="page-header">
	<h1>Cadastro usuário</h1>
</div>

<?php echo $this->Form->create('User'); ?>
        <?php echo $this->Form->input('username',array('label'=>'Login')); ?>
        <?php echo $this->Form->input('password',array('label'=>'Senha', 'required' => true,)); ?>
	<?php echo $this->Form->input('passwordconfirm',array('label'=>'Confirme a Senha','type'=>'password')); ?>
        <?php echo $this->Form->input('role',array('label'=>"Função")); ?>
        <?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->end('Enviar'); ?>
