<?php

    require 'includes.model.php';


    $activado = 1;

    

    $srcVal    = new pagina\ValidarForm($_POST['src'],false,10,100);

    if( preg_match("/^https:\/\/www.youtube.com\/watch\?/",$srcVal->sanear()) ){

        
        $src = substr($srcVal->sanear(),32); 

        $plata ='Y';

    }

    if( preg_match("/^https:\/\/youtu.be\//",$srcVal->sanear()) ) {

        $src = substr($srcVal->sanear(),17);

        $plata ='Y';

    }                  
    
    if( preg_match("/^https:\/\/www.youtube.com\/embed\//",$srcVal->sanear())){

        $src = substr($srcVal->sanear(),30);

        $plata ='Y';
    }

    

    if( preg_match("/^https:\/\/m.youtube.com\/watch\?/",$srcVal->sanear())){

        $primera =substr($srcVal->sanear(),30);
       
       
        

        $src = $primera;

        $plata ='Y';
        
        
    }


    if( preg_match("/^https:\/\/vimeo.com\//",$srcVal->sanear())){


        $src = substr($srcVal->sanear(),18);

        $plata ='V';

    }

    if( preg_match("/^https:\/\/player.vimeo.com\/video\//",$srcVal->sanear())){


        $src = substr($srcVal->sanear(),31);;

        $plata ='V';

    }







    

    $nombreVal = new pagina\ValidarForm($_POST['nombre'],false,3,30);

    $emailVal  = new pagina\ValidarForm($_POST['email'],true,3,60);

    



    $token     = md5($emailVal->sanear()); 

    $votos = 0;

    if( $srcVal     ->validacionFinal() &&
    
        $nombreVal  ->validacionFinal() &&
    
        $emailVal   ->validacionFinal()    
    ){

        $busqueda = conectar\Conexion::select("SELECT * FROM `Videos` WHERE `src`='$src'");

        if( gettype($busqueda) !== "string" ){

            echo 'ya existe';


        }else{

            date_default_timezone_set('Europe/Madrid');

            setlocale(LC_ALL,"es_ES");

            $tiempo = time();

            $tiempoString = strftime('%G-%m-%d 00:00:00',$tiempo);

            conectar\Gestor::sql("INSERT INTO `Videos` (`id`,`activado`,`src`,`plata`,`nombre`,`email`,`votos`,`fecha`) VALUES (NULL,'$activado','$src','$plata','".$nombreVal->sanear()."','$token','0','$tiempoString')");

            echo 'todo bien'; 

           


        }

    }else{


            echo 'se ha introducido mal';




    }





    






?>