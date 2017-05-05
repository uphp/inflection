<?php
    use Doctrine\Common\Inflector\Inflector;
    /*
    Adicione aqui diferenças de palavras para plural e singular, para isso faça como o exemplo:
    */
    class Inflection{
        public static function irregular(Array $array_inflection_irregular){
            Inflector::rules( 'plural', [ 'irregular' => $array_inflection_irregular ] );
        }
        public static function uninflected(Array $array_inflection_uninflected){
            Inflector::rules( 'plural', [ 'uninflected' => $array_inflection_uninflected ] );
        }
    }