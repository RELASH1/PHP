<?php

    include "msg.php";
    include "cnx.php";
    session_start();
    if (isset($_POST['submit'])) {
        $username = $_SESSION["SESSION_email"];
        $mess = $_POST['message'];
        $et = new msg();
        $et->username = $username;
        $et->mess = $mess;
        $cn = new cnx();
        $cn->host = "localhost";
        $cn->username = "root";
        $cn->password = "";
        $cn->database = "gestetudiants";

        $cn->query = "insert into messages (userEt,message)  VALUES ('" . $username . "','" . $mess . "')";
        $cn->database();
        if ($cn->done == "1") {
            echo'aaa';
            echo '<script>
            setTimeout(function() {
                swal({
                    title: "c est fait",
                    text: "message envoyé",
                    type: "success"
                }, function() {
                    window.location = "espaceetudiant.php";
                });
            }, 10   );
        </script>';
        }
    }

    include "msg.php";
    include "cnx.php";
    session_start();
    if (isset($_POST['submit'])) {
        $username = $_SESSION["SESSION_email"];
        $mess = $_POST['message'];
        $et = new msg();
        $et->username = $username;
        $et->mess = $mess;
        $cn = new cnx();
        $cn->host = "localhost";
        $cn->username = "root";
        $cn->password = "";
        $cn->database = "gestetudiants";

        $cn->query = "insert into messages (userEt,message)  VALUES ('" . $username . "','" . $mess . "')";
        $cn->database();
        if ($cn->done == "1") {
            echo'aaa';
            echo '<script>
            setTimeout(function() {
                swal({
                    title: "c est fait",
                    text: "message envoyé",
                    type: "success"
                }, function() {
                    window.location = "espaceetudiant.php";
                });
            }, 10   );
        </script>';
        }
    }







?>