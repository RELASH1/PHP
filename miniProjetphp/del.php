<?php

try {
    $id_con= new PDO ("mysql:host=localhost;dbname=gestetudiants","root","");
    
}
catch (Exception $e) {
    echo "erreur cnx bd :".$e->getMessage();
}
    $req="DELETE  FROM etinfo WHERE username=$user";
    $reqq=$id_con->exec($req);

?>