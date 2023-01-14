<?php
class prof
{
    private $id;
    private $nom;
    private $prenom;
    
    

    public function __construct(){
        $this->id=0;
        $this->nom="";
        $this->prenom="";
    }
    public function __get($attribut){
        return $this->{$attribut};
    }
    public function __set($attribut,$value){
         $this->{$attribut}=$value;
    }



}


?>