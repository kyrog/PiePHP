<?php
namespace src\Controller;
use Core\Controller;
use src\Model\UserModel;
use Core\Request;

class UserController extends Controller {

    public $post;
    public $get;
    private $secu;


    public function __contruct(){
        if(empty($this->secu)){
            $this->secu = new Request();
        }
        $this->post = $this->secu->securepost();
        $this->get = $this->secu->secureget();
        
    }
   public function addAction(){
        echo "ceci est la method add";
   }
   public function indexAction() {
           echo "ceci est la methode index";
   }
   public function registerAction(){
        $this->render("register");
        if (isset($_POST["submit"])){
            $this->__contruct();
        }
        if (!empty($this->post["email"]) && !empty($this->post["password"])){
            $obj = new UserModel($this->post["email"], $this->post["password"],"users");
           $obj->save();
        }
   }
   public function loginAction(){
       $this->render("login");
       if (isset($_POST["submit"])){
        $this->__contruct();
       }
       if (!empty($this->post["email"]) && !empty($this->post["password"])){
        $obj = new UserModel($this->post["email"], $this->post["password"],"users");
       $obj->login();
    }
   }
}