<?php
namespace src\Model;
use Core\Entity;

class CommentModel extends Entity {
    private static $relations = array("has one" => "article") ;

    public function __construct(){
        parent::__construct();
    }
    
}