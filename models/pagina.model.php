<?php namespace pagina;

    class InfoPag {
        public static $h1_alt  = 'Stockholm';
        public static $h1_src  = 'img/logo.png';
        public static $h1_href = 'index.php';
    }
    class ConfigPag {
        public static $robots = 'index, follow' ;
    }
    
    
    class ValidarForm{
        public $elemento;
        public $siesEmail;
        public $min;
        public $max;
        
        public function sanear() {
            if ( $this->siesEmail ) {
                # Limpiar el EMAIL.
                return filter_var( $this->elemento , FILTER_SANITIZE_EMAIL );
            } else {
                # Limpiar el TEXTO.
                return $this->elemento;
            }
        }
        public function relleno() {
            # Comprobar que esté relleno ''.
            if ( $this->sanear() !== '' ) {
                return true;
            } else {
                return false;
            }
        }
        public function nulo() {
            # Comprobar que no sea NULL.
            if ( $this->sanear() !== NULL ) {
                return true;
            } else {
                return false;
            }
        }
        public function numeroCaracteres() {
            # Comprobar NRO. DE CARACTERES.
            $nroCaracteres = strlen( $this->sanear() );
            if  ( $nroCaracteres >= $this->min && $nroCaracteres <= $this->max ) {
                return true;
            } else {
                return false;
            }
        }
        public function validacionFinal() {
            # Comprobar que todas las funciones dan TRUE.
            if ( $this->relleno() && $this->nulo() && $this->numeroCaracteres() ) {
                return true;
            } else {
                return false;
            }
        }

        function __construct( $a , $b , $c , $d ) {
            $this->elemento  = $a;
            $this->siesEmail = $b;
            $this->min       = $c;
            $this->max       = $d;
        }

    }



?>