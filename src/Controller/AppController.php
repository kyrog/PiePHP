<?php
namespace src\Controller;

use Core\Controller;
use Core\Request;

class AppController extends Controller {

    public function __contruct(){
        $secu = new Request();
        $secu->secure();
    }
    
    public function indexAction(){
        echo "ceci est la method index de appcontroller";
        $this->render("index.php");
    }
}