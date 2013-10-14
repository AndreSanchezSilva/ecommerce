<?php
class Conexao extends PDO {
 
    private static $conexao;
 
    public function Conexao($dsn, $username = "", $password = "") {
        parent::__construct($dsn, $username, $password);
    }
 
    public static function conecta() {
        if(!isset( self::$conexao )){
            try {
                self::$conexao = new Conexao("mysql:host=localhost;dbname=ecommerce", "root", "");
            } catch ( Exception $e ) {
                echo 'Erro ao conectar';
                exit ();
            }
        }
        return self::$conexao;
    }

}