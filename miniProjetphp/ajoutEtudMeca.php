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
    <link rel="stylesheet" href="ajoutEtudInfo.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
</head>
<body>
   
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Ajouter un etudiant premiere annee mecanique</h3>
            <form action="mecaBD.php" method="POST">

              
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="firstName" class="form-control form-control-lg" name="nom"/>
                    <label class="form-label" for="firstName" >Nom</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" id="lastName" class="form-control form-control-lg" name="prenom"/>
                    <label class="form-label" for="lastName" >Prenom</label>
                  </div>

                </div>
              </div>
              <div class="row">
               <div class="col-12">

                  
               <div class="form-outline">
                    <input type="email" id="emailAddress" class="form-control form-control-lg" name="email"/>
                    <label class="form-label" for="emailAddress">Email</label>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <input type="date" class="form-control form-control-lg" id="birthdayDate" name="dn" />
                    <label for="birthdayDate" class="form-label" >Date Naissance</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Sex: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                      value="Femme" checked />
                    <label class="form-check-label" for="femaleGender">Femme</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                      value="Homme" />
                    <label class="form-check-label" for="maleGender">Homme</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                      value="Autre" />
                    <label class="form-check-label" for="otherGender">Autre</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                <div class="form-outline">
                    <input type="text" id="Username" class="form-control form-control-lg" name="username"/>
                    <label class="form-label" for="Username" >Username</label>
                  </div>
                  

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="tel" id="phoneNumber" class="form-control form-control-lg"  name="tel" />
                    <label class="form-label" for="phoneNumber">Numero Telephone</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password"  class="form-control form-control-lg"  name="pwd" />
                    <label class="form-label">Mot De Passe</label>
                  </div>

                </div>
              
                <div class="col-md-6 mb-4 pb-2">

                  <select class="select form-control-lg" name="classe">
                    <option value="1" disabled>Choix</option>
                    <option value="GM 1.1">GM 1.1</option>
                    <option value="GM 1.2">GM 1.2</option>
                    <option value="GM 1.3">GM 1.3</option>
                  </select>
                  <label class="form-label select-label">Choix de la classe</label>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Ajouter" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>