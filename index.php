<?php

  require 'models/includes.model.php';

   

  conectar\Cookies::borrar('votar'); 
  
  /* conectar\Cookies::borrar('ip'); */  

   

   

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="robots" content="noindex/nofollow">
    <title>Concurso-Videos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" defer/>
    <link rel="stylesheet" href="css/styles.css" defer/>
    
  </head>
  <body>
    <header class="header">
      
        <?php
        
          include 'views/entrada.view.php';
        
        
        ?>



    </header>

    <main class="main">
        <?php
        
          include 'views/lista.view.php';
        
        ?>
    </main>

    <?php
    
      include 'views/form.view.php';
    
    ?>

    <footer></footer>

  </body>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/gestor.js" async defer></script>
</html>
