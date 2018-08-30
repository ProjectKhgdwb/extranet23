<?php 
	include"includes/config.php";
	if(!isset($_SESSION["admin"]))
	{
		header("location:index.php");
	}
	$sql="select * from etudiants";
	$req=$base->prepare($sql);
	$req->execute();
	$etudiants=$req->fetchAll(PDO::FETCH_OBJ);
	if (isset($_POST["ajouter"]))
	{
		$matricule=$_POST["matricule"];
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$sexe=$_POST["sexe"];
		$cin=$_POST["cin"];
		$dateNaiss=$_POST["date_naissance"];
		$tel=$_POST["tel"];
		$email=$_POST["email"];
		$adresse=$_POST["adresse"];
		$ancienne_ecole=$_POST["ancienne_ecole"];

		$niveau=$_POST["niveau"];
		$specialite=$_POST["specialite"];
		$departement=$_POST["departement"];
		$annee_scolaire=$_POST["annee_scolaire"];

		
		$sql="insert into etudiants values (null,'".$matricule."','".$nom."','".$prenom."','".$sexe."','".$cin."','".$dateNaiss."','".$tel."','".$email."','".$adresse."','".$ancienne_ecole."','".'1'."','".'GL'."','".'informatique'."','".'2017/2018'."')";

		$req=$base->prepare($sql);
		$res=$req->execute();
		if($res)
			header("location:etudiant.php");
	}

	if (isset($_POST["modifier"]))
	{
		$matricule=$_POST["matricule"];
		$nom=$_POST["nom"];
		$prenom=$_POST["prenom"];
		$sexe=$_POST["sexe"];
		$cin=$_POST["cin"];
		$dateNaiss=$_POST["date_naissance"];
		$tel=$_POST["tel"];
		$email=$_POST["email"];
		$adresse=$_POST["adresse"];
		$ancienne_ecole=$_POST["ancienne_ecole"];
		
		$sql=" update etudiants set matricule='$matricule',nom='$nom',prenom='$prenom',sexe=$sexe,cin='$cin',date_naissance='$dateNaiss',tel='$tel',email='$email',adresse='$adresse',ancienne_ecole='$ancienne_ecole' where id_etudiant=".$_GET['modifier'];

		$req=$base->prepare($sql);
		$res=$req->execute();
		if($res)
			header("location:etudiant.php");
	}

	if (isset($_GET["supp"]))
	{
		
		$sql=" delete from  etudiants where id_etudiant=".$_GET['supp'];
		$req=$base->prepare($sql);
		$res=$req->execute();
		if($res)
			header("location:etudiant.php");
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
	<!-- TableTools for dataTables plugin -->
	<link rel="stylesheet" href="css/TableTools.css">
	<!-- Theme CSS -->
	<!--[if !IE]> -->
	<link rel="stylesheet" href="css/style.css">
	<!-- <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" href="css/style_ie.css">
	<![endif]-->

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- smoother animations -->
	<script src="js/jquery.easing.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Scrollable navigation -->
	<script src="js/jquery.nicescroll.min.js"></script>
	<!-- Growl Like notifications -->
	<script src="js/jquery.gritter.min.js"></script>
	<!-- dataTables plugin -->
	<script src="js/jquery.dataTables.min.js"></script>
	<!-- TableTools for dataTables plguin -->
	<script src="js/TableTools.min.js"></script>

	<!-- Just for demonstration -->
	<script src="js/demonstration.min.js"></script>
	<!-- Theme framework -->
	<script src="js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="js/application.min.js"></script>
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png" />
	<script>
	$(function(){
		function limitText(field, maxChar){
    	var ref = $(field),
        val = ref.val();
	    if ( val.length >= maxChar ){
	        ref.val(function() {
	            console.log(val.substr(0, maxChar))
	            return val.substr(0, maxChar);       
	        });
	    }
		}
	
		$("#form_ajouter_client").hide();
		$("#ajouter_client").click(function(){
		$("#form_ajouter_client").toggle("1000");	
		})
		$("input[name=cin]").keyup(function(){
		var cin=$(this).val();
		var nbr=cin.length;
		if(nbr>=9)
		{
			limitText(this, 9);
        }
		if(isNaN(parseFloat(cin))==true)
			$("input[name=cin]").val(" ");
		})
		
	})
	</script>
</head>

<body data-layout="fixed">
<div id="top"> 
		<?php include"includes/header.php";?>
		<?php include "includes/left.php";?>

	</div>
	
	<div id="main">
		<div id="navigation">
			
			<?php// include "includes/left.php";?>
		</div>

		<div id="content">
			<div class="page-header">
				<div class="pull-left">
					<h4><i class="icon-table"></i> Tables</h4>
				</div>
				<div class="pull-right">
					<ul class="bread">
						<li><a href="dashboard.php">Home</a><span class="divider">/</span></li>
						<li class='active'>Tables</li>
					</ul>
				</div>
			</div>

			<div class="container-fluid" id="content-area">
					<div class="row-fluid">
					<div class="span12">
						<?php 
						if(isset($_GET["modifier"]))
						{
						$ide=$_GET["modifier"];
						$sql="select * from etudiants where id_etudiant=".$ide;
						$req=$base->prepare($sql);
						$req->execute();
						$get_etudiant=$req->fetchAll(PDO::FETCH_OBJ);
						?>
						<div class="box">
							<div class="box-head">
								<i class="icon-list-ul"></i>
								<span id="">Modfier Etudiant</span>
							</div>
							<div class="box-body box-body-nopadding" id="">
								<form  method="POST" class='form-horizontal form-bordered'>
									<div class="control-group">
										<label for="textfield" class="control-label">Matricule</label>
										<div class="controls">
											<input type="text" name="matricule" id="textfield" placeholder="matricule" value="<?php echo $get_etudiant[0]->matricule ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Nom</label>
										<div class="controls">
											<input type="text" name="nom" id="textfield" placeholder="nom" value="<?php echo $get_etudiant[0]->nom ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">prenom</label>
										<div class="controls">
											<input type="text" name="prenom" id="textfield" placeholder="prenom" value="<?php echo $get_etudiant[0]->prenom ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Sexe</label>
										<div class="controls">
											<input type="text" name="sexe" id="textfield" placeholder="sexe" value="<?php echo $get_etudiant[0]->sexe ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Cin</label>
										<div class="controls">
											<input type="text" name="cin" id="textfield" placeholder="cin" value="<?php echo $get_etudiant[0]->cin ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Date naissance</label>
										<div class="controls">
											<input type="text" name="date_naissance" id="textfield" placeholder="date naissance" value="<?php echo $get_etudiant[0]->date_naissance ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Tel</label>
										<div class="controls">
											<input type="text" name="tel" id="textfield" placeholder="telephone" value="<?php echo $get_etudiant[0]->tel ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">email</label>
										<div class="controls">
											<input type="text" name="email" id="textfield" placeholder="adresse mail" value="<?php echo $get_etudiant[0]->email ?>" class="input-xlarge">
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">adresse</label>
										<div class="controls">
											<input type="text" name="adresse" id="textfield" placeholder="adresse" value="<?php echo $get_etudiant[0]->adresse ?>" class="input-xlarge">
										</div>
									</div>
                                    
                                    
									<div class="control-group">
										<label for="textfield" class="control-label">Ancienne ecole</label>
										<div class="controls">
											<input type="text" name="ancienne_ecole" id="textfield" placeholder="ancienne_ecole" value="<?php echo $get_etudiant[0]->ancienne_ecole ?>" class="input-xlarge">
										</div>
									</div>
									
									
									<div class="form-actions">
										<input type="submit" name="modifier" class="button button-basic-blue" value="modifier">
									
									</div>
								</form>
							</div>
						</div>
						<?php
						}
						else
						{
							?>
					
						<div class="box">
							
								<ul class="quick" data-collapse="collapse">
                            <li>
								<a href="#" id="ajouter_client"><img src="img/icons/hire-me.png"/><span>Ajouter Etudiant</span></a></li>
                                </ul>
                                
							<div class="box-head" id="form_ajouter_client">
								<form  method="POST" class='form-horizontal form-bordered'>
									<div class="control-group">
										<label for="textfield" class="control-label">Matricule</label>
										<div class="controls">
											<input type="text" name="matricule" id="textfield" placeholder="matricule" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Nom</label>
										<div class="controls">
											<input type="text" name="nom" id="textfield" placeholder="nom" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">prenom</label>
										<div class="controls">
											<input type="text" name="prenom" id="textfield" placeholder="prenom" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">sexe</label>
										<div class="controls">
											<input type="text" name="sexe" id="textfield" placeholder="sexe" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">cin</label>
										<div class="controls">
											<input type="text" name="cin" id="textfield" placeholder="cin" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Date naissance</label>
										<div class="controls">
											<input type="text" name="date_naissance" id="textfield" placeholder="date naissance" class="input-xlarge">
										</div>
									</div>
                                    <div class="control-group">
										<label for="textfield" class="control-label">telephone</label>
										<div class="controls">
											<input type="text" name="tel" id="textfield" placeholder="numero tel" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">email</label>
										<div class="controls">
											<input type="text" name="email" id="textfield" placeholder="adresse email" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">adresse</label>
										<div class="controls">
											<input type="text" name="adresse" id="textfield" placeholder="adresse" class="input-xlarge">
										</div>
									
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Ancienne ecole</label>
										<div class="controls">
											<input type="text" name="ancienne_ecole" id="textfield" placeholder="ancienne ecole" class="input-xlarge">
										</div>
									
									</div>
                                    
									
									
									<div class="form-actions">
										<input type="submit" name="ajouter" class="button button-basic-blue" value="ajouter">
									
									</div>
								</form>
							</div>
						</div>


			<?php
			}
			?>
					</div>
				</div>
					<div class="row-fluid">
						<div class="span12">
							<div class="box">
								<div class="box-head">
									<i class="icon-table"></i>
									<span>Etudiants</span>
								</div>
								<div class="box-body box-body-nopadding">
									<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
										<thead>
											<tr>
												<th>ID</th>
												<th>matricule</th>
												<th>nom</th>
												<th>prenom</th>
												<th>sexe</th>
												<th>cin</th>
												<th>date naissance</th>
                                                <th>tel</th>
												<th>email</th>
												<th>adresse</th>
												<th>ancienne ecole</th>
												
											</tr>
										</thead>
										<tbody>
		<?php
		foreach ($etudiants as $etudiant){
			
		echo "
		<tr>
			<td>".$etudiant->id_etudiant."</td>
			<td>".$etudiant->matricule."</td>
			<td>".$etudiant->nom."</td>
			<td>".$etudiant->prenom."</td>
			<td>".$etudiant->sexe."</td>
			<td>".$etudiant->cin."</td>
			<td>".$etudiant->date_naissance."</td>
			<td>".$etudiant->tel."</td>
			<td>".$etudiant->email."</td>
			<td>".$etudiant->adresse."</td>
			<td>".$etudiant->ancienne_ecole."</td>
			";
			//if($client->status=="valid")
			$status="<button class='button button-basic-green disabled'>Valid</button>";
			//else
			//$status="<button class='button button-basic-red disabled'>Non Valid</button>";
			echo"<td>".$status."</td>
				
		<td width='180'>
		<a href='etudiant.php?modifier=".$etudiant->id_etudiant."'><button class='button button-basic-blue'>Modifier</button></a>
		<a href='etudiant.php?supp=".$etudiant->id_etudiant."' onclick='return(confirm(\"voulez vous supprimer\"))'><button class='button button-basic-red'>Supprimer</button></a>
		</td>
				
			</tr>";
		}
		?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
				</div>
				</div>
				</div>
				
			</body>

			</html>