<?php

namespace Core;
use Core\ORM;

class Entity {
    protected $email;
    protected $password;
    protected $table;
    private $orm;
    protected $trigger = 1;


    public function __construct($email, $password,$table){
        $this->orm = new ORM();
        $this->email = $email;
        $this->password = $password;
        $this->table = $table;
    }
    public function email_validator()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->mail_check = $this->orm->find($this->table,
             array("WHERE" => "email='$this->email'"));
            if (!empty($this->mail_check)) {
                $this->trigger = 0;
                echo("<script>alert('email déjà existant');</script>");
                
            }
            else{
                return 0;
            }
        }
        else {
            $this->trigger = 0;
            echo("<script>alert('email incorrecte');</script>");
            
        }
    }
    public function mdp_validator() // verif a partir d ici
    {
        if (strlen($this->password) < 6 || strlen($this->password) > 12) {
            $this->trigger = 0;
            echo("<script>alert('Le mot de passe est incorrecte !');</script>");
            
        }
        else {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);//hasher le password apres et le verify 
        }
    }
    public function entity_save(){
        if ($this->trigger == 1){
            $this->orm->create($this->table, array("email" => $this->email, 
            "password" => $this->password));
            echo "Vous avez bien été enregistré";
        }
        else {
            echo "enregistrement échoué, veuillez réessayer";
        }
    }
    public function entity_login(){
        $hash = $this->orm->find($this->table, 
        array("WHERE" => "email='$this->email'"));
        $hash = $hash["password"];
        if (password_verify($this->password, $hash)){
            echo "vous etes connecté";
        }
        else{
            echo "login incorrecte";
        }
    }
}