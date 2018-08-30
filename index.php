<?php 
include"includes/config.php";

if(isset($_SESSION["admin"]))
{
	unset($_SESSION["admin"]);
	session_destroy();
	header("location:index.php");
}


if(isset($_POST["connecter"]))
{
	$login=$_POST["email"];
	$abr=$_POST["password"];
	$password=md5($abr);



	$sql="select * from admin where id_admin AND login='".$login."' AND password='".$password."'";
	$req=$base->prepare($sql);
	$req->execute();
	$admin=$req->fetchAll(PDO::FETCH_OBJ);

	if($admin!=null)
	{
	$_SESSION["admin"]=array();
	$_SESSION["admin"]["nom"]=$admin[0]->nom_a;
	$_SESSION["admin"]["prenom"]=$admin[0]->prenom_a;
	$_SESSION["admin"]["classe"]=$admin[0]->classe;
	$_SESSION["admin"]["id"]=$admin[0]->id_admin;
	header("location:dashboard.php");
	}
else
{
	$erreur = "Le nom d'utilisateur ou le mot de passe saisi est incorrect!";
}
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta names="apple-mobile-web-app-status-bar-style" content="black" />
	

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- Theme CSS -->
	<!--[if !IE]> -->
	<link rel="stylesheet" href="css/style.css">
	<!-- <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" href="css/style_ie.css">
	<![endif]-->

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Just for demonstration -->
	<script src="js/demonstration.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png" />
	<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png" />

</head>
<body class='login-body'>
	<div class="login-wrap">
		<div><h1><img src="../images/logo2.png"> </h1></div>
		<div class="login">
        <?php if (isset($erreur)){   ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php if (isset($erreur)) echo '<p>',$erreur,'</p>';  ?></strong>
                </div>
                <?php }?>
			<form  method="POST">
				
				<div class="sep"></div>
				<div class="email">
                <input type="text" name="email" placeholder="Email" class='input-block-level'></div>
				<div class="pw">
					<input type="password" name="password" placeholder="Password" class='input-block-level'>
				</div>
				<input type="submit" name="connecter" class='button button-basic-darkblue btn-block' value="Connecter">
			</form>
		</div>
		<a href="inscription.php" class='pw-link'><span>S'inscrire  </span><i class="icon-arrow-right"></i></a>
	</div>
	
</body>

</html>