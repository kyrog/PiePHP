<?php
class Autoloader{
   
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload')); //recupere la class et le namespace et appelle la fonction controller
    }
    
    static function autoload($class){ //transforme les backslash en slash et require le fichier cible;
        $class = str_replace('\\', '/', $class); 
        require $class . '.php';
        }
}
