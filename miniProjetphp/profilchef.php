<?php
include "chefdep.php";
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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <link rel="stylesheet" href="profilchef.css"/>
</head>

    

<div class="container my-5">
<div class="row gutters ">
	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
		<div class="card h-100">
			<div class="card-body">
				<div class="account-settings">
					<div class="user-profile">
						<div class="user-avatar">
							<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Maxwell Admin">
						</div>
						<h5 class="user-name"><?php echo strtoupper("" .$_SESSION["SESSION_email"]. ""); ?></h5>
						<h6 class="user-email"><?php echo strtoupper("" .$_SESSION["SESSION_Email_chef"]. ""); ?></h6>
					</div>
					<div class="about">
						<h5 class="mb-2 text-primary">About</h5>
						<p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
		<form action="" method="POST">
			<div class="card h-100">
			
			<div class="card-body">
				
				<div class="row gutters">
					 
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">Mettre a jours les donneés personelles</h6>
					</div>
					
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="fullName">Nom</label>
							<input type="text" class="form-control" id="fullName" placeholder="Entrer votre nom" name="nom">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
							<label for="prenom">Prenom</label>
							<input type="text" class="form-control" id="pren" placeholder="Entrer votre Prenom" name="prenom">
					</div>
					</div>
					
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
							<label for="eMail">Email</label>
							<input type="email" class="form-control" id="eMail" placeholder="Entrer votre email" name="email">
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="Username">Username</label>
							<input type="text" class="form-control" id="Username" placeholder="Entrer votre Username" name="username">
						</div>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<h6 class="mb-3 text-primary">mettre a jours le mot de passe </h6>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="password">mot de passe</label>
							<input type="password" class="form-control" id="pwd" placeholder="Entrer votre mot de passe" name="pwd">
						</div>
					</div>

					
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="text-right">
							<button type="submit" id="submit" name="submit1" class="btn btn-secondary">Annuler</button>
							<button type="submit" id="submit" name="submit" class="btn btn-primary">valider </button>
						</div>
					</div>
				
			</div>
			
			</div>
			
			</div>
		</form>
		</div>
		
</div>
</div>
<?php
try {
	$id_con= new PDO ("mysql:host=localhost;dbname=gestetudiants","root","");
	
  }
  catch (Exception $e) {
	echo "erreur cnx bd :".$e->getMessage();
  }

  // ** chef departement **
  
 
if (isset($_POST['submit'])){
	
	$req="UPDATE chef SET nom='".$_POST['nom']."',prenom='".$_POST['prenom']."',username='".$_POST['username']."',email='".$_POST['email']."',pwd='".$_POST['pwd']."' where username='".$_SESSION["SESSION_email"]."' ";
	
	$reschef=$id_con->exec($req);
	$_SESSION["SESSION_email"]=$_POST['username'];
	$_SESSION["SESSION_Email_chef"]=$_POST['email'];
	if(!empty($_POST['username'])&&!empty($_POST['pwd']) ){
		setcookie("user",$_POST["username"],time()+3600*4) ;
		setcookie("pwd",$_POST["pwd"],time()+3600*4) ;
	
	}

 	


	
}


?>


</html>

