<?PHP
	require_once('connexion.php');
	
	if (isset($_POST['ident'])){ // execution uniquement apres envoi du formulaire (test si la variable POST existe)
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
        header("Location:affichage-demande.php"); // redirection si OK
    }
    else {
        header("Location:login.php?erreur=login"); // redirection si utilisateur non reconnu
    }
}
?>