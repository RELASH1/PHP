<?php
class msg
{
    
    private $username;
    private $message;
   
    public function __construct(){
        $this->username="";
        $this->message="";
    }
    public function __get($attribut){
        return $this->{$attribut};
    }
    public function __set($attribut,$value){
         $this->{$attribut}=$value;
    }
   




    }