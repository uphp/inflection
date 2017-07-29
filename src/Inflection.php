<?php
    namespace src;

    use Doctrine\Common\Inflector\Inflector;
    /**
     * UPhp Inflection contém métodos estáticos para aplicar inflexões ao texto.
     * UPhp Inflection extend doctrine/inflector.
     *
     * Os métodos desta classe facilita o uso de algumas funções contidas em doctrine/inflector e foram adaptadas para serem utilizadas no UPhp.
     * Para mais informações de como usar o inflector acesse: http://www.doctrine-project.org/api/inflector/1.0/class-Doctrine.Common.Inflector.Inflector.html
     *
     * @link uphp.io
     * @since 0.0.1
     * @author Diego Bentes <diegopbentes@gmail.com>
     */
    class Inflection extends Inflector{
        /**
         * Adiciona palavras com diferenciações do padrão singular, plural ao array de palavras.
         *
         * @parametros <code>Array $arrayInflectionIrregular // Recebe um array de palavras irregulares</code>
         * @exemplo
         * <code>
         * <?php
         *      Inflection::irregular(['papel' => 'papeis']);
         * ?>
         * </code>
         * @retorno vazio As palavras serão adicionadas ao array de palavras do uphp/inflection
         */
        public static function irregular(Array $arrayInflectionIrregular){
            parent::rules( 'plural', [ 'irregular' => $arrayInflectionIrregular ] );
        }
        /**
         * Armazena palavras que não receberão inflexão.
         *
         * @parametros <code>Array $arrayInflectionUninflected // Recebe um array de palavras que não poderão ser inflexionadas </code>
         * @exemplo
         * <code>
         * <?php
         *      Inflection::uninflected(['login']);
         * ?>
         * </code>
         * @retorno vazio As palavras será adicionadas ao array de palavras não inflexionadas
         */
        public static function uninflected(Array $arrayInflectionUninflected){
            parent::rules( 'plural', [ 'uninflected' => $arrayInflectionUninflected ] );
        }

        public static function variablize($s) { return str_replace(array('-',' '),array('_','_'),strtolower(trim($s))); }

        public static function keyify($class_name)
        {
            return strtolower(self::underscorify(self::denamespace($class_name))) . '_id';
        }

        public static function underscorify($s)
        {
            return preg_replace(array('/[_\- ]+/','/([a-z])([A-Z])/'),array('_','\\1_\\2'),trim($s));
        }

        private static function denamespace($class_name){
            if (is_object($class_name))
                $class_name = get_class($class_name);

            if (self::has_namespace($class_name))
            {
                $parts = explode('\\', $class_name);
                return end($parts);
            }

            return $class_name;
        }

        private static function has_namespace($class_name)
        {
            if (strpos($class_name, '\\') !== false)
                return true;
            return false;
        }


    }