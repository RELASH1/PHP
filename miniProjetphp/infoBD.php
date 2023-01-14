<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php

include "etudiant.php";
include "cnx.php";
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$username = $_POST['username'];
$date_n = $_POST['dn'];
$sex = $_POST['inlineRadioOptions'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$classe = $_POST['classe'];
$pwd = $_POST['pwd'];

$et = new etudiant();
$et->nom = $nom;
$et->prenom = $prenom;
$et->username = $username;
$et->date_n = $date_n;
$et->sex = $sex;
$et->email = $email;
$et->tel = $tel;
$et->classe = $classe;
$et->pwd = $pwd;
$cn = new cnx();
$cn->host = "localhost";
$cn->username = "root";
$cn->password = "";
$cn->database = "gestetudiants";
$cn->query = "insert into etinfo (nom,prenom,username,email,tel,sex,date_n,classe,pwd)  VALUES ('" . $nom . "','" . $prenom . "','" . $username . "','" . $email . "','" . $tel . "','" . $sex . "','" . $date_n . "','" . $classe . "','" . $pwd . "')";
$cn->database();
if ($cn->done == "1") {
    echo '<script>
    setTimeout(function() {
        swal({
            title: "c est fait",
            text: "Etudiant est inscrit",
            type: "success"
        }, function() {
            window.location = "ajoutEtudInfo.php";
        });
    }, 10   );
</script>';
}





?>