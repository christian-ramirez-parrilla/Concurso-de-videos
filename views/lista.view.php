<section class="section section--intro">
    
</section>

<?php

    $valor = $_COOKIE['ip'];

    $resultados = conectar\Conexion::select("SELECT * FROM `Videos`");

    $registro  = conectar\Conexion::select("SELECT * FROM `registros` WHERE `identificador`='$valor'");


    if( gettype($resultados) === "string"){  ?>

        <section class="section section--nolist">
            <h3 class="section__h3">¡Vaya! Aún no hay ningún vídeo subido.😯</h3>
        </section>


    <?php }else{ ?>

        <form class="busqueda" action="" method="">

            <input autocomplete="off" name="buscar" type="text" placeholder="Introduce la url">
            <!-- <input type="submit" value="Buscar"> -->
            <button type="button" id="busqueda">Buscar</button>
            <button type="button" id="cerrarBus">Cerra Busqueda</button>
        </form>    
            

        
        
        <section id="idea" class="section section--list">

            <!-- aqui iri lo de la cookie -->

                <?php /* }else{ */

                    if( count($resultados) === 1){ 
                    
                        $tiempo = strtotime($resultados->fecha);
                    
                        $fecha  = strftime('%G-%m-%d',$tiempo);
                    
                    ?> 
                    
                    <article class="article" id="<?=$resultados->src?>">
                        
                        <iframe class="article__iframe"
                                <?php
                                
                                    if( $resultados->plata === 'Y'){ ?>


                                        src="https://www.youtube.com/embed/<?=$resultados->src?>" 


                                    <?php }

                                    if( $resultados->plata === 'V'){ ?>


                                        src="https://player.vimeo.com/video/<?=$resultados->src?>"

                                       

                                    <?php }
                                
                                
                                ?>
                                
                                
                                frameborder="0" 
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                        
                        <div class="article__info">
                            <h2 class="article__h2"><?=$resultados->nombre?></h2>
                            <?php
                            
                                $partido = strstr($resultados->fecha,' ',true);
                            
                            
                            ?>
                            <span class="article__date"><?=$partido?></span>
                        </div>
                        
                        <div class="article__like" data-tab="<?=$resultados->src?>">
                            <!-- <i class="article__icon fas fa-heart"></i> -->

                            
                            <i 
                            <?php 
                            
                                if( $registro->codigo_video === $resultados->src){ ?>

                                    class="article__icon activo  fas fa-heart"

                                <?php }else{ ?>


                                    class="article__icon   fas fa-heart"


                                <?php }
                            
                            
                            
                            
                            ?>
                             data-tab="<?=$resultados->votos?>">
                            </i>
                            <div class="voto">
                                <p><?=$resultados->votos?> votos</p>
                            </div>
                            
                        </div>
                        
                    </article>

                <?php }else{ 
                    
                    foreach ($resultados as $i => $cadaVi) { 
                        
                        
                        $tiempo = strtotime($cadaVi->fecha);
                    
                        $fecha  = strftime('%G-%m-%d',$tiempo);
                        
                        
                        
                        ?>
                    
                        <article class="article" id="<?=$cadaVi->src?>">
                            
                            <iframe 
                            class="article__iframe" 
                            <?php
                                
                                    if( $cadaVi->plata === 'Y'){ ?>


                                        src="https://www.youtube.com/embed/<?=$cadaVi->src?>" 


                                    <?php }

                                    if( $cadaVi->plata === 'V'){ ?>


                                        src="https://player.vimeo.com/video/<?=$cadaVi->src?>"

                                       

                                    <?php }
                                
                                
                            ?>



                            src="https://www.youtube.com/embed/<?=$cadaVi->src?>" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen></iframe>
                            
                            <div class="article__info">
                                <h2 class="article__h2"><?=$cadaVi->nombre?></h2>
                                <?php
                                
                                    $partidoDos = strstr($cadaVi->fecha,' ',true);
                                
                                ?>
                                <span class="article__date"><?=$partidoDos?></span>
                            </div>
                            
                            <div class="article__like" data-tab="<?=$cadaVi->src?>">
                                <!-- <i class="article__icon fas fa-heart"></i> -->
                                <i 
                                <?php 
                            
                                if( $registro->codigo_video === $cadaVi->src){ ?>

                                    class="article__icon activo  fas fa-heart"

                                <?php }else{ ?>


                                    class="article__icon   fas fa-heart"


                                <?php }
                            
                            
                            
                            
                            ?>data-tab="<?=$cadaVi->votos?>"
                                ></i>
                                <div class="voto">
                                    <span><?=$cadaVi->votos?> votos</span>
                                </div>
                                
                            </div>
                
                        </article>
                    
                    
                    
                    
                    <?php } ?>

                <?php } 



               /*  } */ ?>
                
                

        </section>

    <?php }

?>

        

