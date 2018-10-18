<?php
namespace src\Model;
use Core\Entity;

class UserModel extends Entity{

    private static $relations = array("has one" => "profil");

   
    public function save(){
        $this->email_validator();
        $this->mdp_validator();
        $this->entity_save();
    }
    public function login(){
        $this->entity_login();
    }
}
