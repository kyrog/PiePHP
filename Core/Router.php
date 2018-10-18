<?php
namespace Core;
include("routes.php");
class Router {
    private static $routes;
    
    public static function connect ($url, $route) { //lorsque le site charge, les routes sont integrées dans l'attribut static routes
    self::$routes[$url] = $route;
    }
    public static function get ($url) { //sert de transit entre les route est le core, renvoie ou non une route

        if (isset(self::$routes[$url])){
            return self::$routes[$url];
        }
        else{
            return null;
        }
    }
}