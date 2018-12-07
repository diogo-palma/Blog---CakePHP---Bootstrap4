<?php $this->set('title_for_layout',isset($title)?$title:'Home'); 
   ?>
<style>
   .card-subtitle {
   margin-top: 0;
   }
   .card{
   margin-bottom: 10px;
   box-shadow: 2px 2px #e4dddd;
   }
   div > a{
   text-decoration: none;
   color: white;
   }
   span > a{
   text-decoration: none;
   color: #716464;
   }
   .small{
   font-size: 11px;
   }
</style>

<div class="container">
   <div class="row">
      <div class="col-10">
         <h1><?php echo isset($title)?$title:'Blog'; ?></h1>
         <hr>
         <div class="row">
            <?php foreach ($posts as $k => $v): $tags = $v['Tag'];  $v = current($v);  ?>
            <div class="col col-sm-6">
               <div class="card border-light">
                  <div class="card-header bg-light">
                     <small class="text-muted float-right small ">
                     <i>
                     <?php echo  date('h:i - d/m/Y', strtotime($v['created'])); ?>
                     </i>
                     </small>
                  </div>
                  <div class="card-body">
                     <h5 class="card-title"><?php echo $v['name']; ?></h5>
                     <p class="card-text"><?php echo $this->Text->truncate($v['content'],400,array('exact'=>false,'html'=>true)); ?></p>
                     <?php foreach($tags as $t): ?>
                     <span class="badge badge-pill badge-light" style="border: 1px solid #ccc;"><?php echo $this->Html->link($t['name'],array('action'=>'tag',$t['name'])); ?></span> 
                     <?php endforeach; ?>
                  </div>


                  <div class="card-footer text-white bg-light mb-3 ">
                     <h6 class="card-subtitle mb-2 text-muted float-right" style="font-size: 15px;"><span style="font-size:10px">por: </span>Admin></h6>
                     <a href="<?php echo $this->Html->url($v['link']); ?>" class="btn btn-outline-primary btn-sm">Ler Mais...</a>
                  </div>
               </div>
            </div>
            <?php endforeach ?>
         </div>
         <?php echo $this->Paginator->numbers(); ?>
      </div>
      <div class="col">
         <h4>Redes Sociais<h4>
         <img src="img/redes_sociais.png" style="    width: 150px;"/>
      </div>
   </div>
</div>