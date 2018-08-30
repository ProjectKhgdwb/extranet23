<?php 
include"includes/config.php";
if(!isset($_SESSION["admin"]))
{
	
	header("location:index.php");
}
/*$sql="select * from produit p limit 0,3";
$req=$base->prepare($sql);
$req->execute();
$produits=$req->fetchAll(PDO::FETCH_OBJ);
*/

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
    <!-- TableTools for dataTables plugin -->
	<link rel="stylesheet" href="css/TableTools.css">
	<!-- small charts plugin -->
	<link rel="stylesheet" href="css/jquery.easy-pie-chart.css">
	<!-- calendar plugin -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<!-- Calendar printable -->
	<link rel="stylesheet" href="css/fullcalendar.print.css" media="print">
	<!-- chosen plugin -->
	<link rel="stylesheet" href="css/chosen.css">
	<!-- CSS for Growl like notifications -->
	<link rel="stylesheet" href="css/jquery.gritter.css">
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
	<!-- small charts plugin -->
	<script src="js/jquery.easy-pie-chart.min.js"></script>
	<!-- Charts plugin -->
	<script src="js/jquery.flot.min.js"></script>
	<!-- Pie charts plugin -->
	<script src="js/jquery.flot.pie.min.js"></script>
	<!-- Bar charts plugin -->
	<script src="js/jquery.flot.bar.order.min.js"></script>
	<!-- Charts resizable plugin -->
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- calendar plugin -->
	<script src="js/fullcalendar.min.js"></script>
	<!-- chosen plugin -->
	<script src="js/chosen.jquery.min.js"></script>
	<!-- Scrollable navigation -->
	<script src="js/jquery.nicescroll.min.js"></script>
	<!-- Growl Like notifications -->
	<script src="js/jquery.gritter.min.js"></script>
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

</head>
<style>
.quick li a img {
    width: 44px;
    height: 32px;
    margin: 0 auto;
}
</style>
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
					<h4><i class="icon-home"></i> Bienvenue Mr / Mm <?php echo $_SESSION["admin"]["nom"]." ".$_SESSION["admin"]["prenom"] ?></h4>
				</div>
				
			</div>
			<div class="content-highlighted">
				<ul class="quick" data-collapse="collapse">
					<li>
						<a href="etudiant.php"><img src="img/icons/student.png" alt="" /><span>Gestion des étudiants </span></a>
					</li>
					
					<li>
						<a href="departement.php"><img src="img/icons/department.png" alt="" /><span>Départements</span></a>
					</li>
                    <li>
						<a href="pieces_rechange.php"><img src="img/icons/module.png" alt="" /><span>Modules</span></a>
					</li>
					<li>
						<a href="pieces_rechange.php"><img src="img/icons/note.png" alt="" /><span>Notes</span></a>
					</li>
					<li>
						<a href="pieces_rechange.php"><img src="img/icons/result.png" alt="" /><span>Résultats</span></a>
					</li>
					
					
					<li>
						<a href="gestion_compte.php"><img src="img/icons/hire-me.png" alt="" /><span>profil admin</span></a>
					</li>
					
				</ul>
			</div>
          <center>  <p> <h1> <font color="#33CCFF">BIENVENUE CHEZ NOTRE SITE </font> </h1> </p> </center>
        
        <center> <img src="img/fac.jpg" style="width: 750px; height: 450px;"></center>
					
										
				</div>
				
				 
			</div>
             
		</div>
	</div>
	
</body>

</html>