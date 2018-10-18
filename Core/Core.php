<?php
use Core\Router;
namespace Core;

class Core {

    public function run(){
        $route = Router::get($_SERVER["REQUEST_URI"]); //la methode get recupere le get des l url
        if ($route !== null) { //si celle ci correspond a une route predefini elle est renvoyé afin d'exploiter son tableau
            $controller = "src\Controller\\" . ucfirst($route["controller"])
             . "Controller";
            $method = $route["action"] . "Action";
            $obj = new $controller(); // le controller appel donc sa class et sa methode
            $obj->$method();
        }
        else {
            require("src/View/Error/404.php"); //si aucun route n'existe un erreur est renvoyé
        }
    }
}

// router dynamique

// class Core {
//     public function run() {
//         if(!empty($_GET)) {
//             if ($_GET['c'] == "user"){
//                 if(!isset($_GET['a']) || empty($_GET['a'])) {
//                     $index = new \src\Controller\UserController();
//                     $index->indexAction();
//                 }
//                else if($_GET['a'] == "add"){
//                     $add = new \src\Controller\UserController();
//                     $add->addAction();
//                     echo __CLASS__ . " [OK]" . PHP_EOL;
        
//                 }
//                 else {
//                     require("src/View/Error/404.php");
//                 }
                
//             }
//             else if(empty($_GET['c'])) {
//                 $default = new \src\Controller\AppController();
//                 $default->indexAction();
//             }
//             else {
//                 require("src/View/Error/404.php");
//             }
//         }
//     }
// } 