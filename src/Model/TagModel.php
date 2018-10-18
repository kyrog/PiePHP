<?php
namespace src\Model;
use Core\Entity;

class TagModel extends Entity {
    private static $relations = array("has many" => "articles");
    
    public function __construct(){
        parent::__construct();
    }
    
}