<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- CSS only -->
  <link rel="stylesheet" href="login.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Awesome Icons -->
  <script src="https://kit.fontawesome.com/e27c698fd9.js" crossorigin="anonymous"></script>
</head>

<body>
  <section class="vh-100 gradient-custom">
    <!-- login card -->
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center justify-content-lg-end align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-6">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">
                <form method="POST">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your login and password!</p>

                  <div class="form-outline form-white mb-4">
                    <input type="text" id="typeEmailX" class="form-control form-control-lg" name="mail" value="<?php if (isset($_COOKIE['user'])) echo $_COOKIE['user']; ?>" />
                    <label class="form-label" for="typeEmailX">Email</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="pwd" value="<?php if (isset($_COOKIE['pwd'])) echo $_COOKIE['pwd']; ?>" />
                    <label class="form-label" for="typePasswordX">Password</label>
                  </div>

                  <div class="form-outline form-white  mb-4">
                    <input type="checkbox" name="remember" value="ok" />
                    <label class="form-label" for="remember">remember me ?</label>
                  </div>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Login</button>

                </form>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
  include "chefdep.php";
  include "etudiant.php";
  session_start();
  if (isset($_POST['submit'])) {
    $userEt = $_POST['mail'];
    $pwdEt = $_POST['pwd'];

    $userchef = $_POST['mail'];
    $pwdchef = $_POST['pwd'];
  }
  if (!empty($_SESSION["SESSION_email"])) {
    header("Location:" . $_SESSION["page"]);
  }

  if (isset($_POST['submit'])) {
    if ($_POST['remember'] == "ok") {
      if (!empty($_POST['mail']) && !empty($_POST['pwd'])) {
        setcookie("user", $_POST["mail"], time() + 3600 * 4);
        setcookie("pwd", $_POST["pwd"], time() + 3600 * 4);
      }
    }


    try {
      $id_con = new PDO("mysql:host=localhost;dbname=gestetudiants", "root", "");
      echo "cnx ok";
    } catch (Exception $e) {
      echo "erreur cnx bd :" . $e->getMessage();
    }

    // ** chef departement **
    $reqchef = "select * from chef where username='" . $_POST['mail'] . "'and pwd='" . $_POST['pwd'] . "'";
    $reschef = $id_con->query($reqchef);
    $chefFound = $reschef->rowCount();
    // ** email chef departement **
    $reqemailchef = "select email from chef where username='" . $_POST['mail'] . "'and pwd='" . $_POST['pwd'] . "'";
    $resemailchef = $id_con->query($reqemailchef);
    $foundMailchef = $resemailchef->fetch(PDO::FETCH_ASSOC);
    // ** etudiant informatique **
    $reqetinfo = "select * from etinfo where username='" . $_POST['mail'] . "'and pwd='" . $_POST['pwd'] . "'";
    $resEtinfo = $id_con->query($reqetinfo);
    $etinfoFound = $resEtinfo->rowCount();
    // ** etudiant mecanique **
    $reqetmec = "select * from etmeca where username='" . $_POST['mail'] . "'and pwd='" . $_POST['pwd'] . "'";
    $resEtmec = $id_con->query($reqetmec);
    $etmecFound = $resEtmec->rowCount();
    // ** etudiant economie gestion **
    $reqeteco = "select * from eteco where username='" . $_POST['mail'] . "'and pwd='" . $_POST['pwd'] . "'";
    $resEteco = $id_con->query($reqeteco);
    $etudecoFound = $resEteco->rowCount();
    // count infoet
    $stm = "select * from etinfo";
    $rescount = $id_con->query($stm);
    $countinfo = $rescount->rowCount();
    $_SESSION["SESSION_nbinfo"] = $countinfo;



    $rechercheEt = "select * from etudiants where username='" . $_POST['mail'] . "'and pwd='" . $_POST['pwd'] . "'";
    $rechercheEt = $id_con->query($rechercheEt);
    $etudOk = $rechercheEt->rowCount();
    $afficheEt = $rechercheEt->fetch(PDO::FETCH_ASSOC);
    if (!empty($_POST['mail']) && !empty($_POST['pwd'])) {
      if ($etudOk == 1) {
        $_SESSION["branche"] = $afficheEt['branche'];
        $_SESSION["email"] = $afficheEt['email'];
        $_SESSION["nom"] = $afficheEt['nom'];
        $_SESSION["prenom"] = $afficheEt['prenom'];
        $_SESSION["tel"] = $afficheEt['tel'];
        $_SESSION["classe"] = $afficheEt['classe'];
        $_SESSION["SESSION_email"] = $userEt;
        $_SESSION["page"] = "espaceetudiant.php";
        header("location:espaceetudiant.php");
      } else if ($chefFound == 1) {
        $_SESSION["SESSION_email"] = $userchef;
        $_SESSION["SESSION_Email_chef"] = $foundMailchef["email"];
        $_SESSION["page"] = "chef.php";

        header("location:chef.php");
      } else {
        echo '<script>alert("veuillez saisir les donneés correctement !")</script>';
      }
    }
  }



  ?>
</body>

</html>