<?php
namespace Core;
use \PDO;

class Database {
    protected $bdd;

    public function database(){
        if ($this->bdd === null) {
            $pdo = new PDO('mysql:host=localhost;dbname=pie_db;charset=utf8',
             "phpmyadmin", "phpmyadmin");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bdd = $pdo;
        }
        return $this->bdd;
    }
}