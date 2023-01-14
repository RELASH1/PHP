<?php
session_start();

if ($_SESSION["branche"] == "informatique") {
} else if ($_SESSION["branche"] == "mecanique") {
} else if ($_SESSION["branche"] == "economie") {
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="espaceet.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="/tp/miniProjetphp/chef.js"></script>
</head>

<body onload="ok();">
    <header>
        <header id="navbar_top">
            <div class="container">
                <!-- Navbar-->
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent my-2 ">
                    <div class="container-fluid">
                        <!-- if you want to put your logo insted
                    <a class="navbar-brand" href="index.html">
                    <img src="./assets/img/"  alt="LOGO">
                 </a> -->
                        <a class="navbar-brand " href="#"><b>LOGO</b></a>
                        <button class="hamburger d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            <div class="bar"></div>
                        </button>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">

                                <li class="nav-item"><a class="nav-link active" href="espaceetudiant.php">Acceuil</a></li>
                                <li class="nav-item"><a class="nav-link active" onclick="modifieret()">Profil</a></li>
                                <li class="nav-item"><a class="nav-link active" onclick="msg()">Messages</a></li>
                                <li class="nav-item"><a class="nav-link active" href="#">Profil des Profs</a></li>
                                <li class="nav-item"><a class="nav-link active" onclick="listeEt()">Profil des Etudiants</a></li>
                                <li class="nav-item"><a class="nav-link active" href="logout.php">Déconnexion</a></li>

                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>

            </div>
        </header>

        <!-- <nav class="navbar">
            <div class="navbar-container container">
                <input type="checkbox" name="" id="">
                <div class="hamburger-lines">
                    <span class="line line1"></span>
                    <span class="line line2"></span>
                    <span class="line line3"></span>
                </div>
                <ul class="menu-items">

                    <li><a href="espaceetudiant.php">Acceuil</a></li>
                    <li><a onclick="modifieret()">Profil</a></li>
                    <li><a onclick="msg()">Messages</a></li>
                    <li><a href="#">Profil des Profs</a></li>
                    <li><a onclick="listeEt()">Profil des Etudiants</a></li>
                    <li><a href="logout.php">Déconnexion</a></li>

                </ul>
                <h1 class="logo">Challouf</h1>
            </div>
        </nav> -->

        <section class="wrapper bg-white">
            <div class="container">
                <div class="row vh-100">
                    <div class="col-12 col-md-3">
                        <div class="aside vh-100">
                            <nav>
                                <ul>
                                    <a>
                                        <li onclick="emp1()">Emploi</li>
                                    </a>
                                    <a href="#">
                                        <li onclick="emp1()">Cours</li>
                                    </a>
                                    <a href="#">
                                        <li onclick="clen1()">Compte Rendu</li>
                                    </a>
                                    <a href="#">
                                        <li onclick="clen1()">Calendirer</li>
                                    </a>
                                </ul>
                            </nav>


                        </div>
                    </div>
                    <div class="col-12 col-md-9 ">

                        <div class="vh-100 w-100" id="1ere">

                            </script>

                        </div>
                    </div>

                </div>

            </div>
        </section>


</body>

</html>