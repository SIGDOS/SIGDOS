<?php
ini_set("max_execution_time","0");
error_reporting(E_ERROR);
class datos
{
	
	
    private $ip = "localhost";
    private $bd = "sigdos";
    private $usuario = "root";
    private $contraseña = "";
   
    
    
    function conecta(){
        //tira de coneccion a la base de datos
        //varia segun el gestor en este caso es mysql
       $pdo = new PDO("mysql:host=".$this->ip.";dbname=".$this->bd."",$this->usuario,$this->contraseña);
	   //$pdo = new PDO("pgsql:host=".$this->ip.";port=5432;dbname=".$this->bd."",$this->usuario,$this->contraseña);
        $pdo->exec("set names utf8");
        return $pdo;
    }
    

    
    function __construct(){
      //this->$pdo = conecta();
    }

   
    public function Ejecuta($consulta, $lid)
    {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $co->beginTransaction(); //prepara al gestor de base
            //de datos para comenzar con las
            //operaciones de actualizacion de registros
        try {
           
            
            // Ejecuta la sentencia
            $sentencia = $co->query($consulta);
          $a = 0;
          if($lid!=''){
             $a = $co->lastInsertId($lid);
	      }  
           
            
            
            $co->commit();//ejecuta la actualizacion
            
            
            
            
            
            return $a;
            

        } catch (Exception $e) {
            //si encontro un error entra aca
            $co->rollback();//coloca la informacion
            //al estado anterior sin cambios
            echo 'ERROR EN SQL: ',  $e->getMessage(), "\n";
            return false;
        }
    }

    
    public function Busca($consulta)
    {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        try {
            
            $sentencia = $co->query($consulta);
            
            
            // Capturar primera fila del resultado
            $fila = $sentencia->fetchAll(PDO::FETCH_BOTH);
            return $fila;

        } catch (Exception $e) {
            echo 'ERROR EN SQL: ',  $e->getMessage(), "\n";
            return false;
        }
    }
    
    
   
    
}

?>