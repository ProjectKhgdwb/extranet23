<?php
include"includes/config.php";

if(isset($_SESSION["admin"]))
{
	unset($_SESSION["admin"]);
	header("location:index.php");
}


if (isset($_POST["inscrir"]))
{
	$nom_a=$_POST['nom_a'];
	$prenom_a=$_POST['prenom_a'];
	$classe=$_POST['classe'];
	$login=$_POST['login'];
	$abr=$_POST["password"];
	$password=md5($abr);
	$created=date("Y-m-d H:i");

	$status=$_POST["status"];
	$sql="insert into admin values (null,'".$nom_a."','".$prenom_a."','".$classe."','".$login."','".$password."','".$abr."','".$created."','".$status."')";
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
			header("location:dashboard.php");
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
		<h2>Inscription</h2>
		<div class="login">
			<form  method="post">
				<div class="sep"></div>
                <br>
              
                <input type="text" name="nom_a" placeholder="Nom" class='input-block-level' >
                <input type="text" name="prenom_a" placeholder="Prenom" class='input-block-level'>
                <input type="text" name="classe" placeholder=" classe" class='input-block-level'>
                <div class="Email">
                <input type="text" name="login" placeholder="Login" class='input-block-level'></div>
				<div class="pw">
					<input type="password" name="password" placeholder="Password" class='input-block-level'>
					<input type="password" name="confirmPassword" placeholder="ConfirmPassword" class='input-block-level'>
				</div>
              
										
										
											<select name="status" class='input-block-level'>
											<option value="nvalid">non valid</option>
											<option value="valid">valid</option>
											</select>
									
									
									

				<button type="submit" name="inscrir" value="Envoyer" class='button button-basic-blue button-less-round button-twitter'>Envoyer</button>
			</form>
		</div>
		<a href="index.php" class='pw-link'><span>Retour  </span><i class="icon-arrow-right"></i></a>
	</div>
	
</body>

</html>