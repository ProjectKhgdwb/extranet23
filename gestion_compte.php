<?php 
include"includes/config.php";
if(!isset($_SESSION["admin"]))
{
	
	header("location:index.php");
}
$sql="select*from admin";
$req=$base->prepare($sql);
$req->execute();
$admins=$req->fetchAll(PDO::FETCH_OBJ);
if (isset($_POST["ajouter"]))
{
	$nom_a=$_POST["nom_a"];
	$prenom_a=$_POST["prenom_a"];
	$classe=$_POST["classe"];
	$login=$_POST["login"];
	$abr=$_POST["password"];
	$password=md5($abr);
	$created=date("Y-m-d H:i");
	$status=$_POST["status"];
	
	$sql="insert into admin value(null,'".$nom_a."','".$prenom_a."','".$classe."','".$login."','".$password."','".$abr."','".$created."','".$status."')";
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:gestion_compte.php");
}

if (isset($_POST["modifier"]))
{
	
	$nom_a=$_POST["nom_a"];
	$prenom_a=$_POST["prenom_a"];
	$classe=$_POST["classe"];
	$login=$_POST["login"];
	$password=md5($_POST["password"]);
	$created=date("Y-m-d H:i");
	$status=$_POST["status"];
	
	$sql=" update admin set nom_a='$nom_a',prenom_a='$prenom_a',classe='$classe',login='$login',password='$password',created='$created',status='$status' where id_admin=".$_GET['modifier'];
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:gestion_compte.php");
}

if (isset($_GET["supp"]))
{
	
	$sql=" delete from  admin where id_admin=".$_GET['supp'];
	$req=$base->prepare($sql);
	$res=$req->execute();
	if($res)
		header("location:gestion_compte.php");
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
					<h4><i class="icon-table"></i> Profils </h4>
				</div>
				<div class="pull-right">
					<ul class="bread">
						<li><a href="dashboard.php">Home</a><span class="divider">/</span></li>
						<li class='active'>Profil</li>
					</ul>
				</div>
			</div>

			<div class="container-fluid" id="content-area">
										<div class="row-fluid">
					<div class="span12">
						<?php 
						if(isset($_GET["modifier"]))
						{
							$ida=$_GET["modifier"];
						$sql="select * from admin where id_admin=".$ida;
						$req=$base->prepare($sql);
						$req->execute();
						$get_admin=$req->fetchAll(PDO::FETCH_OBJ);
						?>
						<div class="box">
							<div class="box-head">
								<i class="icon-list-ul"></i>
								<span id="">Modfier Admin</span>
							</div>
							<div class="box-body box-body-nopadding" id="">
								<form  method="POST" class='form-horizontal form-bordered'>
									<div class="control-group">
										<label for="textfield" class="control-label">Nom</label>
										<div class="controls">
											<input type="text" name="nom_a" id="nom_a" placeholder="nom" value="<?php echo $get_admin[0]->nom_a ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">prenom</label>
										<div class="controls">
											<input type="text" name="prenom_a" id="prenom_a" placeholder="prenom" value="<?php echo $get_admin[0]->prenom_a ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">classe</label>
										<div class="controls">
											<input type="text" name="classe" id="classe" placeholder="classe" value="<?php echo $get_admin[0]->classe ?>" class="input-xlarge">
										</div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">login</label>
										<div class="controls">
											<input type="text" name="login" id="login" placeholder="email" value="<?php echo $get_admin[0]->login ?>" class="input-xlarge">
										</div>
									
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">password</label>
										<div class="controls">
											<input type="text" name="password" id="password" placeholder="password" value="<?php echo $get_admin[0]->password ?>" class="input-xlarge">
										</div>
									
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">status</label>
										<div class="controls">
											<select name="status">
											<option value="nvalid" <?php  if($get_admin[0]->status=="nvalid")  echo "selected" ;?>>non valid</option>
											<option value="valid" <?php  if($get_admin[0]->status=="valid")  echo "selected" ;?> > valid</option>
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
								<a href="#" id="ajouter_admin"><img src="img/icons/hire-me.png"/><span>Ajouter Compte</span></a></li>
                                </ul>
                              
								
							
                            
							<div class="box-head" id="form_ajouter_admin">
								<form  method="POST" class='form-horizontal form-bordered'>
									<div class="control-group">
										<label for="textfield" class="control-label">Nom</label>
										<div class="controls">
											<input type="text" name="nom_a" id="nom_a" placeholder="Nom" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">prenom</label>
										<div class="controls">
											<input type="text" name="prenom_a" id="prenom_a" placeholder="Prenom" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">classe</label>
										<div class="controls">
											<input type="text" name="classe" id="textfield" placeholder="classe" class="input-xlarge">
										</div>
									</div>
									
									
									
									
									<div class="control-group">
										<label for="textfield" class="control-label">login</label>
										<div class="controls">
											<input type="text" name="login" id="textfield" placeholder="login" class="input-xlarge">
										</div>
									
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">password</label>
										<div class="controls">
											<input type="password" name="password" id="password" placeholder="password" class="input-xlarge">
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
														<span>Table Admin</span>
													</div>
													<div class="box-body box-body-nopadding">
														<table class="table table-nomargin table-bordered dataTable table-striped table-hover">
															<thead>
																<tr>
																	<th>ID</th>
																	
																	<th>Nom</th>
																	<th>Prenom</th>
																	<th>classe</th>
																	<th>login</th>
																	<th>password</th>
                                                                    <th>Date de creation</th>
                                                                    <th>status</th>
																	
																	<th>Modifier ce compte</th>
                                                                    <th>Suprimer ce compte</th>
																	
																</tr>
															</thead>
															<tbody>
																<?php
																foreach ($admins as $admin){
																	
																echo "
																<tr>
																	<td>".$admin->id_admin."</td>
																	<td>".$admin->nom_a."</td>
																	<td>".$admin->prenom_a."</td>
																	<td>".$admin->classe."</td>
																	<td>".$admin->login."</td>
																	<td>".$admin->abr."</td>
																	<td>".$admin->created."</td>
																	<td>".$admin->status."</td>
																	
																		
						     <td width='90'>
							 <a href='gestion_compte.php?modifier=".$admin->id_admin."'><button class='button button-basic-blue'>Modifier</button></a>
							 </td>
							  <td width='90'>
							 <a href='gestion_compte.php?supp=".$admin->id_admin."' onclick='return(confirm(\"voulez vous supprimer\"))'><button class='button button-basic-red'>Supprimer</button></a>
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
									
								</body>

								</html>