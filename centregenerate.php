<?php
include('connexion.php');
$retour = "";

$requete = "SELECT NUMCENTRE, NOMCENTRE FROM centre";
$resultat = $con->query($requete);     // exécute la requête
if ($resultat) {    // si la requête a fonctionné
    if ($con->affected_rows != 0) {    // si la requête a retourné au moins un enregistrement
        while ($enreg = $resultat->fetch_assoc()) {     // extrait chaque ligne une à une
            $retour .= '<option value="'.$enreg['NUMCENTRE'].'">'.$enreg['NOMCENTRE'].'</option>';
        }
    }
    else {
        $retour = "AUCUNEDONNEE";
    }
}
else {
    $retour = "REQUETE";
}
// ne devrait jamais renter ici mais on conserve ce test au cas où
if ("" == $retour) {
    $retour = "NONDETERMINE";
}
echo $retour; // il faut faire un echo de code html puisque l'appel AJAX a été fait avec dataType: "html"
?>