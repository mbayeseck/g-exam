<?php
	//fonction de récupération d'un candidat selon identification
	function afficherCandidatById($identification){
		include('connexion.php');
        $reponse=$con->query("SELECT C.NUMBASE,C.NUMSALLE, C.CNI, C.PRENOM, C.NOM, C.DATENAIS, C.LIEUNAIS,
		C.GENRE, C.PROVENANCE
		FROM candidat C");	
	}
	//fonction de récupération de salle selon Id Centre
	function listeSallesByIdCentre($numcentre){
		
	}
?>