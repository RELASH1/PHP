<?php
class chefdep
{
    
    private $id;
    private $nom;
    private $prenom;
    private $username;
    private $email;
    private $pwd;
    private $image;
    
    

    public function __construct(){
        $this->id=0;
        $this->nom="";
        $this->prenom="";
        $this->email="";
        $this->username="";
        $this->pwd="";
        $this->image="";
    }
    public function __get($attribut){
        return $this->{$attribut};
    }
    public function __set($attribut,$value){
         $this->{$attribut}=$value;
    }
   



}
