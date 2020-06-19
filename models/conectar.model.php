<?php namespace conectar;

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    class Conexion {
        private const HOST = '';
        private const USER = '';
        private const PASS = '';
        private const BBDD = '';

        public static function iniciar(){
            $options = array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_EMULATE_PREPARES => FALSE
            );
            try {
                $dbh = new \PDO("mysql:host=".self::HOST.";dbname=".self::BBDD.";charset=UTF8",self::USER,self::PASS, $options);
            } catch (\PDOException $e) {
                return 'Falló la conexión: a la BDD ' . $e->getMessage();
            } 
            return $dbh;
        } 
        public static function select( $x ){
            try {
                $leer = self::iniciar()->prepare( $x );
                $leer->setFetchMode(\PDO::FETCH_OBJ);
                $leer->execute();
            } catch (\PDOException $e) {
                return 'Falló ejecutar la SELECT: ' . $e->getMessage();
            } 

            switch ($leer->rowCount()) {
                case 0:
                    return 'no hay datos';
                    
                    break;
                
                case 1:

                    return $leer->fetch(); 

                    break;
                
                default:

                    return $leer->fetchAll(); 
                    
                    break;
            } 
            
                       
        }
    }



    class Gestor{

        public static function sql( $x ){
            try {
                $insertar = Conexion::iniciar()->prepare($x);
                $insertar->execute();
            } catch (\PDOException $e) {
                return 'Falló Ejecutar SQL: ' . $e->getMessage();
            } 
            return array( 'message' => 'ok' , 'cual' => 'Se ha ejecutado correctamente');
        }
    }


    class Correo{

        public $quienRecibe;
        public $asunto;
        public $texto;
        public $nombreEnvia;
        public $correoEnvia;
        
 
        public function enviarCorreo(){
 
         
 
         
 
 
         $quienEnvia = "From: $this->nombreEnvia <$this->correoEnvia>"."\r\n"; 
 
         $quienEnvia .= "MIME-Version 1.0"."\r\n";
 
         $quienEnvia .= "Content-type: text/html; charset=utf-8"."\r\n"; 
 
 
 
         mail($this->quienRecibe, $this->asunto, $this->texto, $this->quienEnvia) or die ('Fallo');            
 
 
 
 
        }
 
        public function __construct($a,$b,$c,$d,$e){
 
             $this->quienRecibe    = $a;
             $this->asunto         = $b;
             $this->texto          = $c;
             $this->nombreEnvia    = $d;
             $this->correoEnvia    = $e;
             
 
 
 
        }
 
 
    }



    class Archivo{

        public  $imagen;

        public  $rutaTemp;

        public  $rutaDestino;

        public  $rutaBDD;

        public  $peso;

        public  $tipo;

        public $busqueda;

        public $insertar;


        public function __construct($x,$limitePeso,$tipo){

            $this->imagen      = $x;

            $this->rutaTemp    = $this->imagen['tmp_name'];

            $this->rutaDestino = '../img/'.$this->imagen['name'];

            $this->rutaBDD     = 'img/'.$this->imagen['name'];

            $this->peso        = $limitePeso;

            $this->tipo        = $tipo;

            

        }
        

        public function peso(){

            if( $this->imagen['size'] <= $this->peso){

                return true;

            }else{

                return false;

            }



        }

        public function tipo(){

            if( strpos($this->imagen['type'],$this->tipo) !== false){

                return true;


            }else{

                return false;

            } 

            

        }


        public function mover(){

            if (file_exists($this->rutaDestino)){

                return [

                    'mensaje' => 'el archivo ya existe',

                    'valor'   => false

                ];

            }else{

                if(move_uploaded_file($this->rutaTemp,$this->rutaDestino)){

                    return true;

                }else{

                    return [

                        'mensaje' => 'Hay algún problema',

                        'valor'   => false

                    ];

                } 
  
            }



        }


        public function comprobar(){

            if( $this->peso()  &&
                $this->tipo()
            ){

                return $this->mover();

            }else{

                return 'Error';

            } 

            


        }



    }

    class Cookies{

        public static function crear( $a , $b ){
            setcookie($a,$b,time()+60*60*24*50,'/','');
        }
        public static function borrar( $a ){
            setcookie($a,'',time()-10,'/','');
        }

    }

    class Seguridad{

        private const  CLAVE= ''; 

        public static function encriptar($x){

            return openssl_encrypt($x,'',self::CLAVE);

        }

        public static function desencriptar($x){

            return openssl_decrypt($x,'',self::CLAVE);

        }

        

    }
    
?>