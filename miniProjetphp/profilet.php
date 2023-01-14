<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="profilet.css" />
    <title>Document</title>
</head>

<body class="bg-transparent">
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                    <img class="rounded-circle mt-md-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">

                    <span class="font-weight-bold"><?php echo strtoupper("" . $_SESSION["SESSION_email"] . ""); ?></span><span class="text-black-50"><?php echo strtoupper("" . $_SESSION["email"] . ""); ?></span><span> </span>


                </div>
            </div>
            <div class="col-md-9">
                <div class="p-md-3 py-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="" method="POST" enctype=multipart/form-data>
                        <div class="row mt-md-2">
                            <div class="col-md-6"><label>Nom</label>
                                <input type="text" class="form-control" placeholder="nom" name="nom">
                            </div>
                            <div class="col-md-6"><label>Prenom</label>
                                <input type="text" class="form-control" name="prenom" placeholder="prenom">
                            </div>
                        </div>
                        <div class="row mt-md-3">
                            <div class="col-md-12"><label>Username</label>
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>
                            <div class="col-md-12"><label>Tel</label>
                                <input type="text" class="form-control" placeholder="tel" name="tel">
                            </div>
                            <div class="col-md-12"><label>Email</label>
                                <input type="text" class="form-control" placeholder="email" name="email">
                            </div>
                            <div class="col-md-12"><label>mot de passe</label>
                                <input type="password" class="form-control" placeholder="mdp" name="pwd">
                            </div>
                            <div class="file-upload">
                                <input type="file" name="files[]" />
                                <i class="fa fa-arrow-up"></i>
                            </div><span>Changer image</span>
                        </div>
                        <div class="mt-md-5 text-center">
                            <span><button class="btn btn-primary rounded-pill" type="submit" name="submit">enregistrer</button></span>
                        </div>
                </div>

                </form>
            </div>

        </div>
    </div>
</body>
<?php

try {
    $id_con = new PDO("mysql:host=localhost;dbname=gestetudiants", "root", "");
} catch (Exception $e) {
    echo "erreur cnx bd :" . $e->getMessage();
}

$reqetinfo = "select * from etinfo where username='" . $_SESSION["SESSION_email"] . "'";
$resEtinfo = $id_con->query($reqetinfo);
$etinfoFound = $resEtinfo->rowCount();
// ** etudiant mecanique **
$reqetmec = "select * from etmeca where username='" . $_SESSION["SESSION_email"] . "'";
$resEtmec = $id_con->query($reqetmec);
$etmecFound = $resEtmec->rowCount();
// ** etudiant economie gestion **
$reqeteco = "select * from eteco where username='" . $_SESSION["SESSION_email"] . "'";
$resEteco = $id_con->query($reqeteco);
$etudecoFound = $resEteco->rowCount();

$rechercheEt = "select * from etudiants where username='" . $_SESSION["SESSION_email"] . "'";
$rechercheEt = $id_con->query($rechercheEt);
$etudOk = $rechercheEt->rowCount();
$afficheEt = $rechercheEt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST["submit"])) {

    if ($etudOk == 1) {
        // Count total files
        $countfiles = count($_FILES['files']['name']);
        // Prepared statement
        $query = "insert into etudiants (image,dir) VALUES(?,?)";
        $statement = $id_con->prepare($query);
        // Loop all files
        for ($i = 0; $i < $countfiles; $i++) {

            // File name
            $filename = $_FILES['files']['name'][$i];

            // Location
            $target_file = './assets/img/' . $filename;

            // file extension
            $file_extension = pathinfo(
                $target_file,
                PATHINFO_EXTENSION
            );

            $file_extension = strtolower($file_extension);

            // Valid image extension
            $valid_extension = array("png", "jpeg", "jpg", "pdf");

            if (in_array($file_extension, $valid_extension)) {

                // Upload file

                if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
                    // Execute query
                    $statement->execute(array($filename, $target_file));
                }
            }
        }
        echo "File upload successfully";
        try {
            $id_con = new PDO("mysql:host=localhost;dbname=gestetudiants", "root", "");
        } catch (Exception $e) {
            echo "erreur cnx bd :" . $e->getMessage();
        }

        $req = "UPDATE etudiants SET nom='" . $_POST['nom'] . "',prenom='" . $_POST['prenom'] . "',username='" . $_POST['username'] . "',email='" . $_POST['email'] . "',pwd='" . $_POST['pwd'] . "' ,tel='" . $_POST['tel'] . "' where username='" . $_SESSION["SESSION_email"] . "' ";
        $reschef = $id_con->exec($req);
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["nom"] = $_POST['nom'];
        $_SESSION["prenom"] = $_POST['prenom'];
        $_SESSION["tel"] = $_POST['tel'];
        $_SESSION["SESSION_email"] = $_POST['username'];
        if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
            setcookie("user", $_POST["username"], time() + 3600 * 4);
            setcookie("pwd", $_POST["pwd"], time() + 3600 * 4);
        }
    }
}



?>