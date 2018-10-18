<?php
namespace Core;

use Core\Database;

class ORM{

    private $bdd;

    public function __construct(){
        $bdd = new Database();
        $this->bdd = $bdd->database();
    }
    public function create($table,$fields){ //return un id
        $col = "";
        $val = "";
        foreach($fields as $key => $value){
            $col .= $key . ",";
            $val .= ":$key,";
        }
        $col = substr($col, 0, -1);
        $val = substr($val, 0, -1);

        $sth = $this->bdd->prepare("INSERT INTO $table ($col) VALUES ($val)");
        foreach($fields as $key => $value) {
            $sth->bindValue(":$key", $value, \PDO::PARAM_STR);
        }
        $sth->execute();  //finir la fonction en retournant l id
        $arr = $fields;
        $val = array_shift($fields);
        $key = array_keys($arr);
        $key = array_shift($key);
        $col = "$key='$val'";
        $id = $this->find($table, array("WHERE" => "$col"));
        return($id[0]);
    }
    public function read($table, $id){ //return un tableau 
        $sth = $this->bdd->prepare("SELECT * FROM $table WHERE id_user='$id'");
        $sth->execute();
        return $sth->fetchAll(); 

    }
    public function update($table, $id, $fields){ //return un bol
        $col = "";
        foreach($fields as $key => $value){
            $col .= "$key='$value',";
        }
        $col = substr($col, 0, -1);
        $sth = $this->bdd->prepare("UPDATE $table SET $col WHERE id_user='$id'");
        
        $sth->execute();

    }
    public function delete($table, $id){ //return un bol
        $sth = $this->bdd->prepare("DELETE FROM $table WHERE id_user='$id'");
        $sth->execute();
    }
    public function find($table, $param){ // param est un tableau et le retourn
        $col = "";
        foreach ($param as $key => $value) {
            $col .= "$key $value";
        }
        $sth = $this->bdd->prepare("SELECT * FROM $table $col");
        $sth->execute();
        return $sth->fetch();
    }
}