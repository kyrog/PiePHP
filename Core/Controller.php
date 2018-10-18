<?php
namespace Core;
use Core\TemplateEngine;

class Controller {
    private static $_render;

    protected function render($view, $scope = []) {
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', // f correspond a la view demandé
       str_replace('Controller', '', basename(get_class($this))), $view]) . ".php";
       $f = str_replace('src\\\\','',$f);
        if (file_exists($f)) { //si f existe il est mis dans un variable ainsi que l'index
        ob_start();
        include($f);
        $view = ob_get_clean();
        ob_start();
        include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View',
       'index']) . '.php');  //la view est ensuite echo dans l'index qui lui est include dans l'index principal
        self::$_render = ob_get_clean();
        echo self::$_render; // l index du view n'est necessaire qu'une seule fois, d'ou le fait qu'elle soit static
        }
    }
}