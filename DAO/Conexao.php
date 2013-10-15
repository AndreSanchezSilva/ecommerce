<?php
class Conexao extends PDO {
 
    private static $conexao;
    

    public function __construct() {

        if ($_SERVER["SERVER_NAME"] == "localhost" ) {

            $host = "localhost";
            $porta = "3306";
            $db = "xcommerce";
            $user = "root";
            $pass = "";

            parent::__construct("mysql:host=$host; port=$porta; dbname=$db;","$user","$pass");
            

        } else {

            $host = "ec2-23-21-133-106.compute-1.amazonaws.com";
            $porta = "5432";
            $db = "dfjamjie4vlfeq";
            $user = "kxyxzoxjfjjbzl";
            $pass = "_I7fyDJgFOoKSRoaBbSsJpMFur";


            parent::__construct("pgsql:host=$host; port=$porta; dbname=$db; user=$user; password=$pass;");
        }
    }

    public static function conecta() {
        if(!isset( self::$conexao )){
            try {
                self::$conexao =  new Conexao();
            } catch ( Exception $e ) {
                echo 'Erro ao conectar: ' . $e->getMessage();
                exit ();
            }
        }
        return self::$conexao;
    }

}

?>
