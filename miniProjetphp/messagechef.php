<?php
include "chefdep.php";
include "etudiant.php";
session_start();
try {
  $id_con= new PDO ("mysql:host=localhost;dbname=gestetudiants","root","");
  
}
catch (Exception $e) {
  echo "erreur cnx bd :".$e->getMessage();
}

    $reqchef="select * from chef where username='".$_SESSION["SESSION_email"]."'";
    $reschef=$id_con->query($reqchef);
    $chefFound=$reschef->rowCount();

if($chefFound==0){
  header("Location:".$_SESSION["page"]);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   
</head>
<body>
    <div class="container">
        <h1 class="display-4" style="color:blue">LISTE DES MESSAGES</h1>
        
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    
  <?php
        try {
            $id_con= new PDO ("mysql:host=localhost;dbname=gestetudiants","root","");
            
        }
        catch (Exception $e) {
            echo "erreur cnx bd :".$e->getMessage();
        }
        $req="select * from messages";
        $reqq=$id_con->query($req);
        while($res=$reqq->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>".$res["userEt"]."</td> <td>".$res["message"]."</td></tr>";
     } 
            ?>

  </tbody>
  
</table>
