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
    }