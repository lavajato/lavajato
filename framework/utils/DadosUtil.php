<?php 

namespace senac\framework\utils;

class DadosUtil {

    public static function mapearClasse($classeOrigem, $classeDestino) {
        if(!isset($classeOrigem) || $classeOrigem == null)
            return null;

        $reflexaoOrigem = new \ReflectionClass($classeOrigem); 
        $varsOrigem = $reflexaoOrigem->getProperties();

        foreach($varsOrigem as $var) {
            if(property_exists($classeDestino, $var->name)) {
                $f = new \ReflectionProperty($classeDestino, $var->name);
                $f->setAccessible(true);
                $var->setAccessible(true);
                $f->setValue($classeDestino, $var->getValue($classeOrigem));
            }
        }

        return $classeDestino;
    }

    public static function mapearClasseArray($array) {
        if(!isset($array) || $array == null || empty($array))
            return null;
            
        return (object) $array;
    }
}

?>