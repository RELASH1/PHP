<?php
include "chefdep.php";
include "etudiant.php";
try {
    $id_con= new PDO ("mysql:host=localhost;dbname=gestetudiants","root","");
    
  }
  catch (Exception $e) {
    echo "erreur cnx bd :".$e->getMessage();
  }
session_start(); 

    $reqchef="select * from chef where username='".$_SESSION["SESSION_email"]."'";
    $reschef=$id_con->query($reqchef);
    $chefFound=$reschef->rowCount();

if($chefFound==0){
  header("Location:".$_SESSION["page"]);
}



$stm="select * from etinfo";
$rescount=$id_con->query($stm);
$countinfo=$rescount->rowCount();
$_SESSION["SESSION_nbinfo"]=$countinfo;

$stm1="select * from etmeca";
$rescount1=$id_con->query($stm1);
$countmeca=$rescount1->rowCount();
$_SESSION["SESSION_nbmeca"]=$countmeca;

$stm2="select * from eteco";
$rescount2=$id_con->query($stm2);
$counteco=$rescount2->rowCount();
$_SESSION["SESSION_nbeco"]=$counteco;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only --><link rel="stylesheet" href="chef.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="/tp/miniProjetphp/chef.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                
                <li><a href="chef.php">Acceuil</a></li>
                <li><a onclick="refreshPage()">Profil</a></li>
                <li><a href="#" onclick="msgchef()">Messages</a></li> 
                <li><a href="#">Profil des Profs</a></li>
                <li><a onclick="listeEt()">Profil des Etudiants</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
                
            </ul>
            <h1 class="logo">CLASSROOM</h1>
        </div>
    </nav>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="aside">
                   <nav>
                    <ul>
                        <a><li onclick="setClass1()">1ére Année</li></a>
                        <a href="#"><li onclick="setClass2()">2éme Année</li></a>
                        <a href="#"><li onclick="setClass3()">3éme Année</li></a>
                        <a href="#"><li>Master</li></a>
                        <a href="#"><li>Calendirer</li></a>
                    </ul>
                    </nav>
                    

                </div>  
            </div>
            <div class="col-12 col-md-9 col-lg-9">

           <div id="1ere">
               <div class="mt-5">
               <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">Bonjour Chef</h3>
                            <h6 class="theme-color lead">Vous êtes connecté Monsieur <?php echo strtoupper("".$_SESSION["SESSION_email"]."");  ?> </h6>
                            <p>bienvenue dans<mark>CLASSROOM</mark>Ici vous pouvez ajoutez des etudiants pour differents classe en 1ere années ou 2éme années jusqu'au Master pour differents branche.</p>
                            <div class="row about-list">
                                <div class="col-md-6">
                                <div class="media">
                                        <label>Username</label>
                                        <p><?php echo strtoupper("" .$_SESSION["SESSION_email"]. ""); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p><?php echo "" .$_SESSION["SESSION_Email_chef"]. ""; ?></p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                        <?php
                        
                            try {
                                $id_con= new PDO ("mysql:host=localhost;dbname=gestetudiants","root","");
                                
                                 }
                            catch (Exception $e) {
                                echo "erreur cnx bd :".$e->getMessage();
                                    }
                            
                            $reqimg="select image from chef WHERE username='".$_SESSION["SESSION_email"]."'";
                            $resimg=$id_con->query($reqimg);
                            
                            while($res=$resimg->fetch(PDO::FETCH_ASSOC)){
                                $img=$res['image'];
                                
                            }
                            
                             echo'<img src="'.$img.'">';
                        ?> 
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500"><?php echo "" .$_SESSION["SESSION_nbinfo"]. ""; ?></h6>
                                <p class="m-0px font-w-600">Etudiants 1ere informatique</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150"><?php echo "" .$_SESSION["SESSION_nbmeca"]. ""; ?></h6>
                                <p class="m-0px font-w-600">Etudiants 1ere mecanique</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850"><?php echo "" .$_SESSION["SESSION_nbeco"]. ""; ?></h6>
                                <p class="m-0px font-w-600">Etudiants 1ere economie gestion</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190"><?php echo "" .$_SESSION["SESSION_nbinfo"]. ""; ?></h6>
                                <p class="m-0px font-w-600">Etudiants 1ere informatique</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


               </div>
           </div>
    
            </div>
            
        </div>

    </div>

</body>
</html>