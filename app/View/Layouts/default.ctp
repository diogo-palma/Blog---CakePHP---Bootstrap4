<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title><?php echo $title_for_layout; ?></title>
      <link rel="alternate" type="application/rss+xml" title="Mon blog" href="<?php echo $this->Html->url(array('controller'=>'posts','action'=>'feed','ext'=>'rss')); ?>">
      <?php echo $this->Html->css('style'); ?>
      <?php echo $scripts_for_layout; ?>
      <style>
         .logo{
            background-color: #007bff;
            color: white !important;
            padding: 15px;
            width: 100px;
            margin-top: -10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            text-align: center;
         }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
         <a class="navbar-brand logo" href="#">Logo</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarCollapse">
            <?php echo $this->element('menu',array(),array('cache'=>true)); ?>
            <form class="form-inline mt-2 mt-md-0">
               <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar..." aria-label="Search">
               <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Ok</button>
            </form>
         </div>
      </nav>
      <div class="container" style="margin-top: 80px">
         <!--nocache-->
         <?php echo $this->Session->flash(); ?>
         <!--/nocache-->
         <?php echo $content_for_layout; ?>
      </div>
      <?php echo $this->element('sql_dump'); ?>
   </body>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
   <?php echo $this->Html->script('cakebootstrap'); ?>
</html>