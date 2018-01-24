<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GmainT</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"></script>
	<script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="plugins/fastclick/fastclick.min.js"></script>
	<script src="dist/js/app.min.js"></script>
	<script src="dist/js/demo.js"></script>
	<!--AJOUTER POUR CETTE PAGE-->
	<style type="text/css">
		label
		{
		display: block;
		width: 300px;
		float: left;
		}

	</style>

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <!-- INCLUDE ICI LE MENU PRINCIPAL-->
	<?php
		include('menu-login.php');
		require_once('connexion.php');
		if (isset($_POST['valider'])){ // execution uniquement apres envoi du formulaire (test si la variable POST existe)
		$login = addslashes($_POST['ident']); // mise en variable du nom d'utilisateur
		$pass = addslashes($_POST['pwd']); // mise en variable du mot de passe chiffré à l'aide de md5 (I love md5) 
		// requete sur la table administrateurs (on récupère les infos de la personne)
		$reponse3=$bdd->query("SELECT * FROM Agent WHERE login='$login' AND pass='$pass'"); // requête sur la base administrateurs		
		$row_verif =$reponse3->fetch();
		//$utilisateur = mysql_num_rows($reponse3);
		//session_start();	
    if ($row_verif) {    // On test s'il y a un utilisateur correspondant
		session_start();
        session_register("authentification"); // enregistrement de la session
        
        // déclaration des variables de session
		$_SESSION['codeAg'] = $row_verif['codeAg'];
        $_SESSION['type'] = $row_verif['type']; // le privilège de l'utilisateur (permet de définir des niveaux d'utilisateur)
        $_SESSION['nomAg'] = $row_verif['nomAg']; // Son nom
        $_SESSION['prenomAg'] = $row_verif['prenomAg']; // Son Prénom
        $_SESSION['login'] = $row_verif['login']; // Son Login
        $_SESSION['pass'] = $row_verif['pass']; // Son mot de passe (à éviter)
        $test=$_SESSION['codeAg'];		
		echo "<script type='text/javascript'>document.location.replace('affichage-candidat.php');</script>";	
   //     header("Location:affichage-demande.php"); // redirection si OK
    }
    else {
        header("Location:login.php?erreur=login"); // redirection si utilisateur non reconnu
    }
}
	?>
    
 <div class="content-wrapper">
     <div class="container">
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">AUTHENTIFICATION</h3>
                    </div>
                    <div class="box-body">
					
			<!--CONTENU DE LA PAGE-->
		<form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>">
			<label>Identification : </label><input name="ident" id="ident" required/><br/><br/>
			<label>Mot de Passe : </label><input type="password" name="pwd" id="pwd"/><br/><br/>
			<label></label><input type="submit" value="Se Connecter" name="valider" id="valid"/><br/><br/>
		</form>
			<!--FIN DU CONTENU DE LA PAGE-->
                    </div>
                </div>
            </section>
        </div>
    </div>
 <!--PIED DE PAGE ICI-->
	<?php
		include('pied-page.php');
	?>
</div>
</body>
</html>