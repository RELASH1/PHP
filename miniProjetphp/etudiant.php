<?php
class etudiant
{

    private $id;
    private $nom;
    private $prenom;
    private $username;
    private $email;
    private $sex;
    private $tel;
    private $date_n;
    private $classe;
    private $pwd;

    public function __construct()
    {
        $this->id = 0;
        $this->nom = "";
        $this->prenom = "";
        $this->username = "";
        $this->email = "";
        $this->sex = "";
        $this->tel = "";
        $this->date_n = "";
        $this->classe = "";
        $this->pwd = "";
    }
    public function __get($attribut)
    {
        return $this->{$attribut};
    }
    public function __set($attribut, $value)
    {
        $this->{$attribut} = $value;
    }
    



}
