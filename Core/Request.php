<?php
namespace Core;

class Request {
    public function securepost(){
        if (!empty($_POST)){
            foreach($_POST as $value){
                $value = htmlspecialchars(strip_tags(trim($value)));
            }
        }
        return $_POST;      
    }
    public function secureget()
    {
        if(!empty($_GET)){
            foreach($_GET as $value){
                $value = htmlspecialchars(strip_tags(trim($value)));
            }
        }
        return $_GET;
    }
}