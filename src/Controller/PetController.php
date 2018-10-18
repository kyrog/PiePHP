<?php
namespace src\Controller;
use Core\Controller;

class PetController extends Controller {
    public function indexAction(){
        $this->render("index");
    }
}