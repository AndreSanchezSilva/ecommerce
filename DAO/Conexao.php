<?php
class Conexao extends PDO {
 
    private static $conexao;
 
    public function Conexao($dsn, $username = "", $password = "") {
        parent::__construct($dsn, $username, $password);
    }
 
    public static function conecta() {
        if(!isset( self::$conexao )){
            try {
                self::$conexao = new Conexao("pgsql:host=ec2-23-21-133-106.compute-1.amazonaws.com
;dbname=dfjamjie4vlfeq", "kxyxzoxjfjjbzl", "_I7fyDJgFOoKSRoaBbSsJpMFur");
            } catch ( Exception $e ) {
                echo 'Erro ao conectar';
                exit ();
            }
        }
        return self::$conexao;
    }

}