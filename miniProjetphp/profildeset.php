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
        <h1 class="display-4" style="color:blue">LISTE DES ETUDIANTS 1ére INFORMATIQUE</h1>
        
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">tel</th>
      
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
        $req="select * from etinfo";
        $reqq=$id_con->query($req);
        while($res=$reqq->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>".$res["nom"]."</td> <td>".$res["prenom"]."</td> <td>".$res["username"]."</td> <td>".$res["email"]."</td> <td>".$res["tel"]."</td></tr>";
     } 
            ?>

  </tbody>
  
</table>
<h1 class="display-4" style="color:blue">LISTE DES ETUDIANTS 1ére MECANIQUE</h1>
<table name="T2"class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">tel</th>
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
        $req="select * from etmeca";
        $reqq=$id_con->query($req);
        while($res=$reqq->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>".$res["nom"]."</td> <td>".$res["prenom"]."</td> <td>".$res["username"]."</td> <td>".$res["email"]."</td> <td>".$res["tel"]."</td> </tr>";}
            ?>
  </tbody>
  
</table>



<h1 class="display-4" style="color:blue">LISTE DES ETUDIANTS 1ére ECONOMIE GESTION</h1>
<table name="T2"class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">tel</th>
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
        $req="select * from eteco";
        $reqq=$id_con->query($req);
        while($res=$reqq->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>".$res["nom"]."</td> <td>".$res["prenom"]."</td> <td>".$res["username"]."</td> <td>".$res["email"]."</td> <td>".$res["tel"]."</td> </tr>";}
            ?>
  </tbody>
  
</table>
</div>
    
</body>
</html>