<?php $this->set('title_for_layout',$post['Post']['name']); ?>

<div class="row">
	<div class="span12">
		<div class="page-header">
			<h1><?php echo $post['Post']['name']; ?> <small><?php echo $post['Category']['name']; ?></small></h1>
		</div>

		<?php echo $post['Post']['content']; ?>	

		<p><em>Publié le <?php echo $this->Date->french($post['Post']['created']); ?></em></p>

	</div>
		
	
	<?php echo $this->element('sidebar'); ?>
</div>
