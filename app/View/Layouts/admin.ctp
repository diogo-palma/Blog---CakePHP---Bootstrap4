<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title><?php echo $title_for_layout; ?></title>
      <?php echo $this->Html->css('style'); ?>
      <style>
         .active{
         background-color: #52beff4a;
         }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
         <a class="navbar-brand logo" href="#">Admin</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
               <li class="<?php echo (!empty($this->params['action']) && ($this->params['controller']=='posts') )?'active' :'' ?>">
                  <?php echo $this->Html->Link('Posts', array('action'=>'index','controller'=>'posts'),array('class'=>'nav-link')); ?>
               </li>
               <li class="<?php echo (!empty($this->params['action']) && ($this->params['controller']=='users') )?'active' :'' ?>">
                  <?php echo $this->Html->Link("Usuários",array('action'=>'index','controller'=>'users'),array('class'=>'nav-link')); ?>
               </li>
            </ul>
            <ul  class="navbar-nav my-2 my-lg-0">
               <li>
                  <?php echo $this->Html->Link("Voltar para o site",'/',array('class'=>'nav-link')); ?>
               </li>
               <li style="margin-left: 5px">
                  <?php echo $this->Html->link('Sair',array('controller'=>'users','action'=>'logout','admin'=>false),array('class'=>'nav-link text-danger font-weight-bold')); ?>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container" style="margin-top: 80px">
         <?php echo $this->Session->flash(); ?>
         <?php echo $content_for_layout; ?>
      </div>
      <?php echo $this->element('sql_dump'); ?>
   </body>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
   <?php echo $this->Html->script('admin'); ?>
   <?php echo $this->Html->script('cakebootstrap'); ?>
   <?php echo $scripts_for_layout;?>
</html>