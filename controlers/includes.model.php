<?php

    spl_autoload_register( function( $nombre ){
        $posicion = strpos( $nombre , '\\');
        $nombreArchivo = substr( $nombre , 0 , $posicion);
        require "../models/$nombreArchivo.model.php";    
    })

?>