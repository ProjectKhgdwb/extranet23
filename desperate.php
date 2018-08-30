<?php 
	include"includes/config.php";

	if(!isset($_SESSION["admin"]))
	{	
		header("location:index.php");
	}

	$sql="select*from etudiants";
	$req=$base->prepare($sql);
	$req->execute();
	$etudiants=$req->fetchAll(PDO::FETCH_OBJ);

	if (isset($_POST["ajouter"]))
	{
		$matricule= $_POST["matricule"];
		$nom= $_POST["nom"];
		$prenom= $_POST["prenom"];
		$sexe= $_POST["sexe"];
		$cin= $_POST["cin"];
		$date_naissance*= $_POST["date_naissance"];
		$tel= $_POST["tel"];
		$email= $_POST["email"];
		$adresse= $_POST["adresse"];
		$ancienne_ecole= $_POST["ancienne_ecole"];
		$niveau= $_POST["niveau"];
		$specialite= $_POST["specialite"];
		$departement= $_POST["departement"];
		$annee_scolaire= $_POST["annee_scolaire"];
		$status= $_POST["status"];

		$sql="insert into etudiants value(null,'".$matricule."','".$nom."','".$prenom."','".$sexe."','".$cin."','".$date_naissance."','".$tel."','".$email."','".$adresse."','".$ancienne_ecole."','".$niveau."','".$specialite."','".$departement."','".$annee_scolaire."','".$status."')";

		$req=$base->prepare($sql);
		$res=$req->execute();
		if($res)
			header("location:desperate.php");
		}

		if (isset($_POST["modifier"]))
		{
	
			$matricule= $_POST["matricule"];
			$nom= $_POST["nom"];
			$prenom= $_POST["prenom"];
			$sexe= $_POST["sexe"];
			$cin= $_POST["cin"];
			$date_naissance*= $_POST["date_naissance"];
			$tel= $_POST["tel"];
			$email= $_POST["email"];
			$adresse= $_POST["adresse"];
			$ancienne_ecole= $_POST["ancienne_ecole"];
			$niveau= $_POST["niveau"];
			$specialite= $_POST["specialite"];
			$departement= $_POST["departement"];
			$annee_scolaire= $_POST["annee_scolaire"];
			
			$sql=" update etudiant set nom='$nom',prenom='$prenom',cin='$cin',tel='$tel',adresse='$adresse',email='$email',status='$status' where id_client=".$_GET['modifier'];
			$req=$base->prepare($sql);
			$res=$req->execute();
			if($res)
				header("location:student.php");
		}


?>