<div class="alert <?php echo isset($type)?$type:'alert-success'; ?>">
	<a href="#" class="close" onclick="$(this).parent().slideUp()">x</a>
	<span><?php echo $message; ?></span>
</div>