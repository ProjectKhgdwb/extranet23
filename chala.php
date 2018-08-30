<?php 
include"includes/config.php";

if(isset($_SESSION["admin"]))
{
	unset($_SESSION["admin"]);
	session_destroy();
	header("location:inscription.php");
}

if(isset($_POST["connecter"]))
{
	$nom= $_POST["nom"];
	$prenom= $_POST["prenom"];
	$classe= $_POST["classe"];
	$login=$_POST["email"];
	$abr=$_POST["password"];
	$password=md5($abr);
	$abr2 = $_POST["confirmPassword"];
	$confirm = md5($abr2);
	$i = 0; //pour stocker le nombre d'erreurs détectées

	//vérification du nom,prenom,classe
    if (empty($nom) || empty($prenom) || empty($classe) )
    {
        $msg_erreur = "Les champs sont obligatoires";
        $i++;
    }

	//vérification du login
	$sql="select count(*) from admin where id_admin AND login='".$login."'";
	$req=$base->prepare($sql);
	$req->execute();
	$mail_free=($query->fetchColumn()==0)?1:0;
    $query->CloseCursor();

    if($mail_free == 0)
    {
        $mail_erreur1 = "Votre mail est déjà utilisé";
        $i++;
    }
 
	// Vérifie si la chaine ressemble à un email et non nul
	if (!filter_var($login, FILTER_VALIDATE_EMAIL) || empty($login)) {
 		   $mail_erreur2 = 'Cet email a un format non adapté';
 		   $i++;
	}

	//vérification du mdp
	if ($password != $confirm || empty($confirm) || empty($pass))
    {
        $mdp_erreur = "MOT de passe doit étre identique, et non vide";
        $i++;
    }

    //inscription
    if ($i == 0) {
    		//echo '<p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d accueil</p>';
    		$req=$base->prepare ("insert into admin (nom_a, prenom_a, classe ,login ,password ,abr ,status) values (:nom,:prenom,:classe,:login,:password,:abr,:status)");
    		$req->bindValue(':nom',$nom,PDO::PARAM_STR);
    		$req->bindValue(':prenom',$prenom,PDO::PARAM_STR);
    		$req->bindValue(':classe',$classe,PDO::PARAM_STR);
    		$req->bindValue(':login',$login,PDO::PARAM_STR);
    		$req->bindValue(':password',$password,PDO::PARAM_STR);
    		$req->bindValue(':abr',$abr,PDO::PARAM_STR);
    		$req->bindValue(':status','active',PDO::PARAM_STR);
    			$req->execute();

    		//les variables de session
    		//header("location:index.php");
    	}
    /*else {
    	echo'<h1>Inscription interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$msg_erreur.'</p>';
        echo'<p>'.$mail_erreur1.'</p>';
        echo'<p>'.$mail_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        //echo'<p>Cliquez <a href="./inscription.php">ici</a> pour recommencer</p>';

    }*/
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
		<h2>Bienvenue!</h2>
		<div class="login">
			<?php if (isset($msg_erreur)){   ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong><?php if (isset($msg_erreur)) echo '<p>',$msg_erreur,'</p>';  ?></strong>
                    <strong><?php if (isset($mail_erreur1)) echo '<p>',$mail_erreur1,'</p>';  ?></strong>
                    <strong><?php if (isset($mail_erreur2)) echo '<p>',$mail_erreur2,'</p>';  ?></strong>
                    <strong><?php if (isset($mdp_erreur)) echo '<p>',$mdp_erreur,'</p>';  ?></strong>
                </div>
                <?php }?>
			<form  method="POST">
				<div class="sep"></div>
				<div>
										<br>

					<input type="text" name="nom" placeholder="nom" class='input-block-level'>
					<input type="text" name="prenom" placeholder="prenom" class='input-block-level'>
					<input type="text" name="classe" placeholder="classe" class='input-block-level'>
				</div>
				<div class="email">
					<input type="text" name="email" placeholder="Email" class='input-block-level'>
				</div>
				<div class="pw">
					<input type="password" name="password" placeholder="Mot de passe" class='input-block-level'>
					<input type="password" name="confirmPassword" placeholder="Confirmer le Mot de passe" class='input-block-level'>
				</div>
				<button type="submit" value="Sign In" class='button button-basic-darkblue btn-block'>Sign UP</button>
			</form>
		</div>
		<button type="submit" value="Sign In" class="signUPbutton">Sign in</button>
	</div>
	j



</body>
</html>