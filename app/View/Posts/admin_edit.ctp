<div class="page-header">
	<h1>Artigo</h1>
</div>

<?php echo $this->Form->create('Post'); ?>
	<?php echo $this->Form->input('name',array('label'=>'Título')); ?>
        <?php echo $this->Form->input('slug',array('label'=>"URL amigável")); ?>
        <?php echo $this->Form->input('tags',array('label'=>"Tags (separado por virgula)",'type'=>'text')); ?>
        <p>
        <?php foreach($tags as $k=>$v): ?>
        <span class="label notice tag"><?php echo $v['Tag']['name']; ?> [<?php echo $this->Html->link("x",array('action'=>'delTag',$v['PostTag']['id'])); ?>]</span>
        <?php endforeach; ?>
        </p>


	<?php echo $this->Form->input('id'); ?>
	<?php echo $this->Form->input('content',array('label'=>"Conteúdo")); ?>
	<?php echo $this->Form->input('online',array('label'=>"Ativo ?",'type'=>'checkbox')); ?>
<?php echo $this->Form->end('Enviar'); ?>







<?php $this->Html->script('tiny_mce/tiny_mce.js',array('inline'=>false)); ?>
<?php $this->Html->scriptStart(array('inline'=>false)); ?>
        tinyMCE.init({
                mode : 'textareas',
                theme: 'advanced',
                plugins: 'inlinepopups,paste,image',
                  language: 'pt',
                theme_advanced_buttons1 : 'bold,italic,underline,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,image,|,formatselect,code',
                theme_advanced_buttons2 : '',
                theme_advanced_buttons3 : '',
                theme_advanced_buttons4 : '',
                theme_advanced_toolbar_location:'top',
                theme_advanced_statusbar_location : 'bottom',
                theme_advanced_resizing : true,
                paste_remove_styles : true,
                paste_remove_spans :  true,
                paste_stip_class_attributes : "all",
                relative_urls : false,
                content_css : '<?php echo $this->Html->url('/css/wysiwyg.css'); ?>'
        });

        function send_to_editor(content){
                var ed = tinyMCE.activeEditor;
                ed.execCommand('mceInsertContent',false,content); 
        }

        jQuery(function(){
                $('.tag a').click(function(){
                        var e = $(this); 
                        $.get(e.attr('href')); 
                        e.parent().fadeOut(); 
                        return false; 
                })
        });
<?php $this->Html->scriptEnd(); ?>