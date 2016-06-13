<?php

    class Banco {
        
        private function __construct() {
            
        }   
        
        private static $conexao;
        
        public static function AbrirConexao() {
            if(!isset($conexao)) {
                try {
                    $conexao = new PDO("mysql:host=localhost;dbname=myblog", "root", "root");
                }
                catch(PDOException $e) {
                    echo "ERRO AO ABRIR CONEXÃO" . $e->getMessage() . "</br>";
                }
            } 
            
            return $conexao;
        }
        
        public static function FecharConexao() {
            $conexao = null;
        }
        
        public static function Bind($classe, $linha) {
            $vars = get_class_vars(get_class($classe));
            
            foreach ($vars as $name => $value) {
                $classe->$name = $linha[$name];
            }
            
            return $classe;
        }
    }
?>