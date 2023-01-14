<?php
include "del.php";
try {
    $id_con= new PDO ("mysql:host=localhost;dbname=gestetudiants","root","");
    
}
catch (Exception $e) {
    echo "erreur cnx bd :".$e->getMessage();
}
$req="select * from etinfo";
$reqq=$id_con->query($req);
while($roww = $reqq->fetch(PDO::FETCH_ASSOC)) {
    $id = $roww['id'];
    echo "
        <span>".$roww['username']."</span>
        <span>".$roww['email']."</span>
        

           // Delete modal
           <div id='box".$roww['id']."'>
                
                <h1>Attention!</h1>
                <p>You are going to delete this user permanently.</p>
                <a class='close' href='del.php?id=".$roww['id']."' title='".$roww['id']."'>Delete</a> // This button should delete the data from the MySQL table
                
           </div>
       ";

}
?>