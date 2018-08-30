<?php 
include"includes/config.php";
/*function ReadFromDB($str) {
 
 return htmlentities(utf8_decode(stripslashes($str)),ENT_COMPAT,'UTF-8');
}*/
if(!isset($_SESSION["admin"]))
{
	header("location:index.php");
} 
if (isset($_POST["ajouter"]))
{
	$dep=$_POST["departement"];
	$formation=$_POST["formation"];
	$matricul=$_POST["matricul"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$sexe=$_POST["sexe"];
	$adresse=$_POST["adresse"];
	$tel=$_POST["tel"];
	$email=$_POST["email"];
	$niveau=$_POST["niveau"];
	$status=$_POST["status"];
	
	$sql="insert into etudiant value(null,'".$dep."','".$formation."','".$matricul."','".$nom."','".$prenom."','".$sexe."','".$adresse."','".$tel."','".$email."','".$niveau."','".$status."')"; 
	/*echo "$sql" ; 
	exit ();*/
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:student.php");
}

if (isset($_POST["modifier"]))
{
	
	$dep=$_POST["dep"];
	$formation=$_POST["formation"];
	$matricul=$_POST["matricul"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$sexe=$_POST["sexe"];
	$adresse=$_POST["adresse"];
	$tel=$_POST["tel"];
	$email=$_POST["email"];
	$niveau=$_POST["niveau"];
	
	$status=$_POST["status"];
	
	$sql=" update etudiant set nom='$nom',prenom='$prenom',cin='$cin',tel='$tel',adresse='$adresse',email='$email',status='$status' where id_client=".$_GET['modifier'];
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:student.php");
}

if (isset($_GET["supp"]))
{
	
	$sql=" delete from  clients where id_client=".$_GET['supp'];
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:student.php");
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<!-- CSS for Growl like notifications -->
	<link rel="stylesheet" href="css/jquery.gritter.css">
	<!-- Uniform plugin -->
	<link rel="stylesheet" href="css/uniform.default.min.css">
	<!-- Theme CSS -->
	<!--[if !IE]> -->
	<link rel="stylesheet" href="css/style.css">
	<!-- <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" href="css/style_ie.css">
	<![endif]-->

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- Old jquery functions -->
	<script src="js/jquery.migrate.min.js"></script>
	<!-- jQuery UI Core -->
	<script src="js/jquery.ui.core.min.js"></script>
	<!-- jQuery UI Widget -->
	<script src="js/jquery.ui.widget.min.js"></script>

	<!-- smoother animations -->
	<script src="js/jquery.easing.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Scrollable navigation -->
	<script src="js/jquery.nicescroll.min.js"></script>
	<!-- Growl Like notifications -->
	<script src="js/jquery.gritter.min.js"></script>
	<!-- Form plugin -->
	<script src="js/jquery.form.min.js"></script>
	<!-- Validation plugin -->
	<script src="js/jquery.validate.min.js"></script>
	<!-- Additional methods for validation plugin -->
	<script src="js/additional-methods.min.js"></script>
	<!-- Form wizard plugin -->
	<script src="js/jquery.form.wizard.min.js"></script>
	<!-- Uniform plugin -->
	<script src="js/jquery.uniform.min.js"></script>

	<!-- Just for demonstration -->
	<script src="js/demonstration.min.js"></script>
	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
    <script>
	$(function(){
		$("#form_ajouter_etudiant").hide();
		$(".ajouter_etudiant").click(function(){
			$("#form_ajouter_etudiant").toggle("1000");
			
		})
		
	})
	$(function(){
		$("#form_ajouter_liste").hide();
		$("#ajouter_liste").click(function(){
			$("#form_ajouter_liste").toggle("1000");
			
		})
		
	})
	$(function(){
		$("#departement").change(function(){
			var id=$(this).val();
			$.post("get_dep.php",{id:id},function(data){$("#formation").html(data)})
		})
		
	})
	</script>
    
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png" />

</head>

<body data-layout="fixed">
	<div id="top"> 
		<?php include"includes/header.php";?>
	</div>

	<div id="main">
		<div id="navigation">
			<?php include"includes/left.php";?>
			
		</div>
		<div id="content">
			<div class="page-header">
				<div class="pull-left">
					<h4><i class="icon-file-alt"></i> Gestion Des Etudiants</h4>
				</div>
				<div class="pull-right">
					<ul class="bread">
						<li><a href="dashboard.php">Home</a><span class="divider">/</span></li>
						
						<li class='active'>Gestion Des Etudiants</li>
					</ul>
				</div>
			</div>
			
			<div class="container-fluid" id="content-area">
				
				<div class="container-fluid">
				<ul class="quick" data-collapse="collapse">
					<li>
						<a href="#" class="ajouter_etudiant"><img src="img/icons/plus.png" alt="" /><span>Ajouter des Etudiants</span></a>
					</li>
                    <li>
						<a href="#" class="ajouter_liste"><img src="img/icons/reading.png" alt="" /><span>Listes des etudiants</span></a>
					</li>	
					
				</ul>
			</div>
				<div class="row-fluid" id="form_ajouter_etudiant">
					<div class="span12">
						<div class="box">
							<div class="box-head">
								<i class="icon-list-ul"></i>
								<span>Ajouter Etudiant</span>
							</div>
							<div class="box-body box-body-nopadding">
								<form action="#" method="POST" class='form-horizontal form-bordered form-wizard'>
									<div class="step" id="firstStep">
										<ul class="wizard-steps wizard-style-2 steps-2">
											<li class='active'>
												<div class="single-step">
													<span class="title">
														Etape 1 
													</span>
													<span class="circle">
														<span class="active"></span>
													</span>
													<span class="description">
														Renseignement d'identité 
													</span>
												</div>
											</li>
											<li>
												<div class="single-step">
													<span class="title">
														Etape 2
													</span>
													<span class="circle">
													</span>
													<span class="description">
														Affectation à la classe 
													</span>
												</div>
											</li>
										
										</ul>
										<div class="step-forms">
                                            <div class="control-group">
												<label for="firstname" class="control-label">Matricul</label>
												<div class="controls">
													<input type="text" name="matricul" id="matricul" class="input-xlarge" data-rule-required="true">
												</div>
											</div>
											<div class="control-group">
												<label for="firstname" class="control-label">Nom</label>
												<div class="controls">
													<input type="text" name="nom" id="nom" class="input-xlarge" data-rule-required="true">
												</div>
											</div>
											<div class="control-group">
												<label for="anotherelem" class="control-label">Prenom</label>
												<div class="controls">
													<input type="text" name="prenom" id="prenom" class="input-xlarge" data-rule-required="true">
												</div>
											</div>
											<div class="control-group">
											<label for="text" class="control-label">Sexe</label>
											<div class="controls">
												<select name="sexe" id="sexe" class="uniform-me" data-rule-required="true">
													<option value="">-- Choisir Sexe  --</option>
													<option value="1">Femme</option>
													<option value="2">Homme</option>
												</select>
											</div>
										</div>
                                            <div class="control-group">
												<label for="anotherelem" class="control-label">Adresse</label>
												<div class="controls">
													<input type="text" name="adresse" id="adresse" class="input-xlarge" data-rule-required="true">
												</div>
											</div>
                                            
                                            <div class="control-group">
												<label for="anotherelem" class="control-label">Tel</label>
												<div class="controls">
													<input type="tel" name="tel" id="tel" class="input-xlarge" data-rule-required="true">
												</div>
											</div>
                                            <div class="control-group">
												<label for="anotherelem" class="control-label">Email</label>
												<div class="controls">
													<input type="email" name="email" id="email" class="input-xlarge" data-rule-required="true">
												</div>
											</div>
                                            
										</div>
									</div>
									<div class="step" id="secondStep">
										<ul class="wizard-steps wizard-style-2 steps-2">
											<li>
												<div class="single-step">
													<span class="title">
													Etape 1 
													</span>
													<span class="circle">
														
													</span>
													<span class="description">
														Renseignement d'identité 
													</span>
												</div>
											</li>
											<li class='active'>
												<div class="single-step">
													<span class="title">
														Etape 2 
													</span>
													<span class="circle">
														<span class="active"></span>
													</span>
													<span class="description">
														Affectation à la classe 
													</span>
												</div>
											</li>
											
										</ul>
                                        <div class="control-group">
											<label for="text" class="control-label">Niveau</label>
											<div class="controls">
												<select name="gend" id="gend" class="uniform-me" data-rule-required="true">
													<option value="">-- choisir --</option>
													<option value="1">1</option>
													<option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">Mastére</option>
                                                    <option value="5">Ingenieur</option>
												</select>
											</div>
										</div>
										<div class="control-group">
											<label for="text" class="control-label">Departement</label>
											<div class="controls">
												<select name="departement" id="departement" class="uniform-me" data-rule-required="true">
													<option value="">-- Choisir departement --</option>
													<?php 
												$sql="select * from departement  ";
												$req=$base->prepare($sql);
												$req->execute();
												$departements=$req->fetchAll(PDO::FETCH_OBJ);
												foreach ($departements as $departement){
												echo'<option value="'.$departement->id_dep.'">'.$departement->dep.'</option>';
												}
												?>
												</select>
											</div>
										</div>
                                        <div class="control-group">
										<label for="scategorie" class="control-label">Filliéres & Spécialités</label>
										<div class="controls">
											<select name="formation" id="formation" class='input-large'>	
											</select>
										</div>
									</div>
                                    <div class="control-group">
											<label for="text" class="control-label">Status</label>
											<div class="controls">
												<select name="status" id="status" class="uniform-me" data-rule-required="true">
													<option value="">-- Choisir Status --</option>
													<option value="active">Active</option>
													<option value="active">Désactivé</option>
												</select>
											</div>
										</div>
										
									</div>
									
									<div class="form-actions">
										<input type="reset" class="button button-basic" value="Back" id="back">
										<input type="submit" name="ajouter" class="button button-basic-blue" value="submit" >
									</div>                          
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>