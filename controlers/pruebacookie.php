
            <?php  

if( $_COOKIE['buscar']){

   $id = $_COOKIE['url']; 

   $busquedaItem = conectar\Conexion::select("SELECT * FROM `Videos` WHERE `src`='$id'");

   ?>

   <article class="article <?=$busquedaItem->src?>">
       
       <iframe class="article__iframe"
               <?php
               
                   if( $busquedaItem->plata === 'Y'){ ?>


                       src="https://www.youtube.com/embed/<?=$busquedaItem->src?>" 


                   <?php }

                   if( $busquedaItem->plata === 'V'){ ?>


                       src="https://player.vimeo.com/video/<?=$busquedaItem->src?>"

                      

                   <?php }
               
               
               ?>
               
               
               frameborder="0" 
               allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
               allowfullscreen></iframe>
       
       <div class="article__info">
           <h2 class="article__h2"><?=$busquedaItem->nombre?></h2>
           <span class="article__date"><?=$busquedaItem->fecha?></span>
       </div>
       
       <div class="article__like">
           <i class="article__icon fas fa-heart"></i>
           <i class="article__icon activo fas fa-heart" data-tab="<?=$busquedaItem->src?>"></i>
           <div class="voto">
               <p><?=$busquedaItem->votos?> votos</p>
           </div>
           
       </div>
       
   </article> 