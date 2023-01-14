<?php
class cnx
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $query;
    private $done;
    private $header;
   
    public function __construct(){
        $this->host="";
        $this->username="";
        $this->password="";
        $this->database="";
        $this->query="";
        $this->done="0";
        $this->header="";
    }
    public function database(){
        try {
    $id_con= new PDO ("mysql:host=$this->host;dbname=$this->database","$this->username","$this->password");
    
    }
    catch (Exception $e) {
    echo "erreur cnx bd :".$e->getMessage();
    }
    $req="$this->query";
    $id_con->exec($req);
    $resultat=$id_con->errorInfo();
        if($resultat[0]=="0000"){
            
            $this->done="1";
            

        }else{
            echo"<br>Erreur detecte:".$resultat[2];
        }
}
public function __get($attribut){
    return $this->{$attribut};
}
public function __set($attribut,$value){
     $this->{$attribut}=$value;
}
    
    
}
