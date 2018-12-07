<?php echo $this->Html->script('tinymce/tiny_mce_popup.js'); ?>
<script type="text/javascript">
	var win = window.dialogArguments || opener || parent || top;
	win.setContentMCE('<?php echo $html; ?>');
	tinyMCEPopup.close();
</script>