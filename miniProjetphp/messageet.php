<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="home.css" />
    <title>home</title>
</head>

<body class="bg-tansparent">
    <div class="container">
        <div class="row d-flex mt-md-5">
            <div class="col-md-3">
                <div class="text-end">
                    <img class="img-fluid rounded-pill" src="./assets/img/pic1.jpg" alt="">
                </div>
            </div>
            <div class="col-md-6 align-self-center">
                <form action="success.php" method="POST" enctype=multipart/form-data>
                    <div class="form-group ">
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Type a comment for your classmates" rows="3" style="resize: none;"></textarea>
                    </div>
                    <div class="d-flex justify-content-between ">
                        <div class=" d-flex  flex-row">
                            <div class="p-2 ">
                                <div class="file-upload">
                                    <input type="file" name="files[]" />
                                    <i class="fa fa-arrow-up"></i>
                                </div><span>Revision</span>

                            </div>
                        </div>
                        <div class="ml-auto p-2">
                            <input class="post" type="submit" name="submit" value="post">
                        </div>
                    </div>


                </form>


            </div>
        </div>
        <?php

        // include "cnx.php";

        // try {
        //     $id_con = new PDO("mysql:host=localhost;dbname=gestetudiants", "root", "");
        // } catch (Exception $e) {
        //     echo "erreur cnx bd :" . $e->getMessage();
        // }

        // if (isset($_POST['submit'])) {

        //     // Count total files
        //     $countfiles = count($_FILES['files']['name']);
        //     // Prepared statement
        //     if (isset($_FILES['files']['name']) && !empty($_POST['cmnt'])) {
        //         $query = "insert into posts (image,dir,cmnt) VALUES(?,?,'" . $_POST['cmnt'] . "')";
        //         $statement = $id_con->prepare($query);
        //     } else if (isset($_FILES['files']['name']) && empty($_POST['cmnt'])) {
        //         $query = "insert into posts (image,dir) VALUES(?,?)";
        //         $statement = $id_con->prepare($query);
        //     }
            

        //     // Loop all files
        //     for ($i = 0; $i < $countfiles; $i++) {

        //         // File name
        //         $filename = $_FILES['files']['name'][$i];

        //         // Location
        //         $target_file = './assets/img/' . $filename;

        //         // file extension
        //         $file_extension = pathinfo(
        //             $target_file,
        //             PATHINFO_EXTENSION
        //         );

        //         $file_extension = strtolower($file_extension);

        //         // Valid image extension
        //         $valid_extension = array("png", "jpeg", "jpg", "pdf");

        //         if (in_array($file_extension, $valid_extension)) {

        //             // Upload file

        //             if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)) {
        //                 // Execute query
        //                 $statement->execute(array($filename, $target_file));
        //             }
        //         }
        //     }

      

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
                                text: "message envoye",
                                type: "success"
                            }, function() {
                                window.location = "";
                            });
                        }, 10   );
                    </script>';
                    }
                }





        ?>