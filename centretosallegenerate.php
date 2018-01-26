<?php
include('connexion.php');
$retour = "";

// retrouver le centre sélectionné, qui a été envoyé par AJAX
$centre = $_POST['centre'];

// valider les données côté serveur
$donneesValides = true;
if ('' == $centre) {
    $donneesValides = false;
}

else {
    // recherche si l'identifiant du pays existe dans la BD
    $requete = "SELECT NUMCENTRE, NOMCENTRE FROM centre WHERE NUMCENTRE = ?";
    $stmt = $con->prepare($requete);
    if ($stmt) {
        $stmt->bind_param("i", $centre);
        $stmt->execute();
        // Sans cette ligne, il ne sera pas possible de connaître le nombre de lignes retournées par un SELECT.
        $stmt->store_result();
 
        if ($stmt->num_rows == 0) {
            $donneesValides = false;
        }
        $stmt->close();
    }
    else {
        $retour = "REQUETE";
    }
}
if ($donneesValides && '' == $retour) {
    $requete = "SELECT NUMSALLE, NOMSALLE FROM salle WHERE NUMCENTRE = ?";
    $stmt = $con->prepare($requete);
    if ($stmt) {
        $stmt->bind_param("i", $centre);
        $stmt->execute();

        // Sans cette ligne, il ne sera pas possible de connaître le nombre de lignes retournées par un SELECT.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($salle_id, $salle_nom);
            while ($stmt->fetch_assoc()) {

                $retour .= '<option value="'.$salle_id.'">'.$salle_nom.'</option>';
            }
        }
        else {
            $retour = "AUCUNEDONNEE";
        }
    }
    else {
        $retour = "REQUETE";
    }

    // ne devrait jamais renter ici mais on la laisse là au cas où
    if ("" == $retour) {
        $retour = "NONDETERMINE";
    }
	}
	else {
    $retour = "PARAMETRE";
	}

	echo $retour;

?>