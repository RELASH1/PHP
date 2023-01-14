<?php
class post
{

    private $id;
    private $cmnt;
    private $cours;
    private $td;
    private $examen;
    public function __construct()
    {
        $this->id = 0;
        $this->cmnt = "";
        $this->cours = "";
        $this->td = "";
        $this->examen = "";
    }
    public function __get($attribut)
    {
        return $this->{$attribut};
    }
    public function __set($attribut, $value)
    {
        $this->{$attribut} = $value;
    }

    public function createPost($idUser, $idPost)
    {
        if ($idUser == $idPost) {
        }
    }
}
