<?php
namespace src\Model;
use Core\Entity;

class ArticleModel extends Entity {
    private static $relations = array("has many" => array("comments", "tags"));
    
    public function __construct(){
        parent::__construct();
    }
}