<?php 
include"includes/config.php";
if(!isset($_SESSION["admin"]))
{
	
	header("location:index.php");
}
$sql="select*from departement";
$req=$base->prepare($sql);
$req->execute();
$departements=$req->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST["ajouter"]))
{
	$nom_dep=$_POST["nom_dep"];
	$chef_dep=$_POST["chef_dep"];
	$status=$_POST["status"];
	
	$sql="insert into departement value(null,'".$nom_dep."','".$chef_dep."','".$status."')";
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:departement.php");
}

if (isset($_POST["modifier"]))
{
	
	$nom_dep=$_POST["nom_dep"];
	$chef_dep=$_POST["chef_dep"];
	$status=$_POST["status"];
	
	$sql=" update departement set nom_dep='$nom_dep',chef_dep='$chef_dep',status='$status' where id_dep=".$_GET['modifier'];
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:departement.php");
}

if (isset($_GET["supp"]))
{
	
	$sql=" delete from  departement where id_dep=".$_GET['supp'];
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:departement.php");
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
		$("#form_ajouter_admin").hide();
		$("#ajouter_admin").click(function(){
		$("#form_ajouter_admin").toggle("1000");
			
		})
		
	})
	</script>
</head>

<body data-layout="fixed">
<div id="top"> 
		<?php include"includes/header.php";?>
	</div>
	
	<div id="main">
		<div id="navigation" style="top:100px;">
			
			<?php include "includes/left.php";?>
		</div>

		<div id="content">
			<div class="page-header">
				<div class="pull-left">
					<h4><i class="icon-table"></i> Gestion des departements </h4>
				</div>
				<div class="pull-right">
					<ul class="bread">
						<li><a href="dashboard.php">Home</a><span class="divider">/</span></li>
						<li class='active'>Gestion des departements
						</li>
					</ul>
				</div>
			</div>

			<div class="container-fluid" id="content-area">
										<div class="row-fluid">
					<div class="span12">
						<?php 
						if(isset($_GET["modifier"]))
						{
							$id_d=$_GET["modifier"];
						$sql="select * from departement where id_dep=".$id_d;
						$req=$base->prepare($sql);
						$req->execute();
						$get_dep=$req->fetchAll(PDO::FETCH_OBJ);
						?>
						<div class="box">
							<div class="box-head">
								<i class="icon-list-ul"></i>
								<span id="">Modfier departement</span>
							</div>
							<div class="box-body box-body-nopadding" id="">
								<form  method="POST" class='form-horizontal form-bordered'>
									<div class="control-group">
										<label for="textfield" class="control-label">Nom departement</label>
										<div class="controls">
											<input type="text" name="nom_dep" id="nom_a" placeholder="nom departement" value="<?php echo $get_dep[0]->nom_dep ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Chef departement</label>
										<div class="controls">
											<input type="text" name="chef_dep" id="prenom_a" placeholder="prenom" value="<?php echo $get_dep[0]->chef_dep ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">status</label>
										<div class="controls">
											<select name="status">
											<option value="nvalid" <?php  if($departements[0]->status=="nvalid")  echo "selected" ;?>>non valid</option>
											<option value="valid" <?php  if($departements[0]->status=="valid")  echo "selected" ;?> > valid</option>
											</select>
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
								<a href="#" id="ajouter_admin"><img src="img/icons/hire-me.png"/><span>Ajouter Departement</span></a></li>
                                </ul>
                              
								
							
                            
							<div class="box-head" id="form_ajouter_admin">
								<form  method="POST" class='form-horizontal form-bordered'>
									<div class="control-group">
										<label for="textfield" class="control-label">Nom department</label>
										<div class="controls">
											<input type="text" name="nom_dep" id="nom_a" placeholder="Nom department" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Chef departement</label>
										<div class="controls">
											<input type="text" name="chef_dep" id="prenom_a" placeholder="Chef departement" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">status</label>
										<div class="controls">
											<select name="status">
											<option value="nvalid">non valid</option>
											<option value="valid"> valid</option>
											</select>
										</div>
									
									</div>
		
									<div class="form-actions">
										<input type="submit" name="ajouter" class="button button-basic-blue" value="enregistrer">
									
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
														<span>Departements</span>
													</div>
													<div class="box-body box-body-nopadding">
														<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
															<thead>
																<tr>
																	
																	<th>Nom departement</th>
																	<th>Chef departement</th>
																	<th>Status</th>
																											
																	<th>Modifier ce compte</th>
                                                                    <th>Suprimer ce compte</th>
																	
																</tr>
															</thead>
															<tbody>
																<?php
																foreach ($departements as $departement){
																	
																echo "
																<tr>
																	
																	<td>".$departement->nom_dep."</td>
																	<td>".$departement->chef_dep."</td>
																	<td>".$departement->status."</td>
																	
	
																	
																		
						     <td width='90'>
							 <a href='departement.php?modifier=".$departement->id_dep."'><button class='button button-basic-blue'>Modifier</button></a>
							 </td>
							  <td width='90'>
							 <a href='departement.php?supp=".$departement->id_dep."' onclick='return(confirm(\"voulez vous supprimer\"))'><button class='button button-basic-red'>Supprimer</button></a>
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