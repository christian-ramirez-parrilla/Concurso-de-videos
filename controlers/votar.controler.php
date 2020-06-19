<?php

    require 'includes.model.php';


    $src = $_GET['src'];

    if($_COOKIE['ip']){

        echo 'mal';
        

    }else{



        $num = intval(rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9)); 

        conectar\Cookies::crear('ip',$num);

        conectar\Gestor::sql("INSERT INTO `registros` (`id`,`activado`,`identificador`,`codigo_video`) VALUES (NULL,1,'$num','$src')");


        $recuento =conectar\Conexion::select("SELECT * FROM `Videos` WHERE `src`='$src'");

        $votado = $recuento->votos+1; 

        conectar\Gestor::sql("UPDATE `Videos` SET `votos`='$votado' WHERE `src`='$src'"); 

        




    }
        
    
 
    echo $votado;

?>