<?php

    require 'includes.model.php';


    $codigo = $_GET['src'];

    

    


        $busqueda = conectar\Conexion::select("SELECT * FROM `Videos` WHERE `src`='$codigo'");

        

        if( gettype($busqueda) !== "string"){

            
            

            echo 'bien';

        } else{

            echo 'false'; 

          

        }








    


    

?>