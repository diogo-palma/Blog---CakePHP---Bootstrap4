<?php $pages = $this->requestAction(array('controller'=>'pages','action'=>'menu','admin'=>false)); ?>

<ul class="navbar-nav mr-auto">


   <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='index') )?'active' :'' ?>">
      <?php echo $this->Html->Link('Home', '/',array('class'=>'nav-link')); ?>
   </li>
   <?php 
      $uid = $this->Session->read('Auth.User.id');
      if ($uid == null){
   ?>
      <li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='login') &&  $this->params['admin']=true )?'active' :'' ?>">
         <?php echo $this->Html->Link('Login', '/admin',array('class'=>'nav-link')); ?>
      </li>
   <?php 
      } else{
   ?>
   <li><b><?php echo $this->Html->Link('Admin', '/admin',array('class'=>'nav-link text-secondary')); ?></b></li>
   <?php
      }
   ?>
	<li class="nav-item">
	  <a class="nav-link disabled" href="#">Sobre</a>
	</li>
	</ul>

