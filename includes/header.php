<style>
#top #brand {
    float: left;
    padding: 5px 1px; }
</style>


<div class="container-fluid">
			<div class="pull-left">
				<a href="../index.php" id="brand"><img src="../images/loogo.png" /></a>
				<div class="collapse-me">
					<a href="contact.php" class="button">
						<i class="icon-comment icon-white"></i>
						Messages
						<span class="badge badge-important">2</span>
					</a>
					<a href="commandes.php" class="button">
						<i class="icon-question-sign icon-white"></i>
						commandes en attente
						<span class="badge badge-info">3</span>
					</a>
					
				</div>
			</div>
			<div class="pull-right">
				<div class="btn-group">
					<a href="#" class="button dropdown-toggle" data-toggle="dropdown"><i class="icon-white icon-user"></i><?php echo $_SESSION["admin"]["nom"]." ".$_SESSION["admin"]["prenom"] ?><span class="caret"></span></a>
					<div class="dropdown-menu pull-right">
						<div class="right-details">
							<h6>Connecté avec le compte</h6>
							<span class="name"><?php echo $_SESSION["admin"]["nom"]." ".$_SESSION["admin"]["prenom"] ?></span>
							<span class="email"><?php echo $_SESSION["admin"]["classe"]?></span>
							<a href="gestion_compte.php" class="highlighted-link">Gestion des comptes</a>
							
						</div>
					</div>
				</div>
				<a href="deconnexion.php" class="button">
					<i class="icon-signout"></i>
					Se déconnecter
				</a>
			</div>
		</div>