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
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="dist/js/jquery.autocomplete.min.js"></script>		
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
		include('connexion.php');
		include('menu-principal.php');
		/*Recupération de la valeur du service envoyée par le formulaire*/
	/*	$idr = isset($_POST['station'])?$_POST['station']:null;		
		$reponse=$bdd->query("SELECT I.idInter,I.nomInter,I.prenomInter,I.contactInter,Z.nomZone,I.latitude,I.longitude FROM Intervenant I 
									LEFT JOIN Zone Z ON Z.idZone=I.idZone");*/
			if(isset($_POST['valider']))
				{
					$numsalle= $_POST['NUMSALLE'];
					$numcentre= $_POST['CENTRE'];
					$cni= $_POST['CNI'];
					$prenom= $_POST['PRENOM'];
					$nom= $_POST['NOM'];
					$datenais=date("Y-m-d");
					$lieunais=date('LIEUNAIS');
					$genre=date('GENRE');
					$provenance=date('PROVENANCE');
			$save=$bdd->query("insert into candidat values('5','$numsalle','$numcentre','$cni','$prenom','$nom','$datenais','$lieunais','$genre','$provenance')");	
			if($save){
				echo "<script type='text/javascript'>document.location.replace('index.php');</script>";			
			}
			else
			{
				echo "<script type='text/javascript'>alert('Verifiez les Input SVP !!!!!!')</script>";			
			}
           }			
	
	?>
    
 <div class="content-wrapper">
     <div class="container">
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">NOUVEAU CANDIDAT</h3>
                    </div>
                    <div class="box-body">
					
			<!--CONTENU DE LA PAGE-->			
		<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="changer">
		<label>N° Candidat : </label><input name="numbase" id="numb"/><br/><br/>		
		<label>Centre : </label>	
		<select name="centre" id="centre" size="1">
		<!--<option value="0"> Centre ...</option>	-->
    		
		</select><br/><br/>
		<label>Salle : </label>	
		<select name="salle" id="salle" >
		<!--<option value="0"> Salle ...</option> -->
		</select><br/><br/>
		<label>N° CNI : </label><input name="numcni" id="cni"/><br/><br/>
		<label>Prénom : </label><input name="prenom" id="prenom"/><br/><br/>
		<label>Nom : </label><input name="nom" id="nom"/><br/><br/>
		<label>Date de Naissance : </label><input name="daten" id="datepicker"/><br/><br/>
		<label>Lieu de Naissance : </label><input name="lieun" id="lieu"/><br/><br/>
		<label>Genre : </label>
			<select name="genre" id="genre">
				<option value="M">M</option>
				<option value="F">F</option>
			</select><br/><br/>
		<label>Provenance : </label><input name="pro" id="pro"/><br/><br/>	
		<label></label><input type="submit" value="Valider" name="valider">
		</form>
		
			<!--FIN DU CONTENU DE LA PAGE-->
                    </div>
                </div>
            </section>
        </div>
    </div>
	
<script>
    $(function () {
        // dès le chargement de la page, on remplit la liste des centres
        remplirCentre();
		
		// lorsque le centre sera changé dans la liste, on charge la liste des salles
        $("#centre").change(function (event) {
            remplirSalle();
        });
    });
function remplirCentre() {
    var jqxhr = $.ajax({
            type: 'get', // on n'a pas de paramètres à envoyer alors GET est sécuritaire
            url: 'centregenerate.php',
            dataType: "html", // le fichier php fait un echo de code HTML
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: ""
        })
        .done(function (response, textStatus, jqXHR) {
            // Appel réussi : on affiche le code HTML généré par le code serveur
            if ("REQUETE" == response) {
                $("#centre").html("<option value=''>Un problème technique(code R).</option>");
            }
            else if ("AUCUNEDONNEE" == response) {
                $("#centre").html("<option value=''>Aucun Centre !!!</option>");
            }
            else if ("NONDETERMINE" == response) {
                $("#centre").html("<option value=''>Un problème technique(code I).</option>");
            }
            else if (response.indexOf('<option') != 0) {
                // la chaîne ne débute pas par <option donc c'est probablement un message d'erreur PHP retourné par AJAX
                $("#centre").html("<option value=''>Un problème technique(code E).</option>");
            }
            else {
                $("#centre").html("<option value=''>Veuillez choisir...</option>" + response);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            // Réagit si le code serveur n'a pas pu être appelé par AJAX, s'il a planté ou s'il n'a pas retourné le bon type de données
            $("#centre").html("<option value=''>Un problème technique(code A).</option>");
        });
    }

function remplirSalle() {

        var centre = $('#centre').val();
        var dataString = 'centre=' + centre;
        var jqxhr = $.ajax({
            type: 'post',
            url: 'centretosallegenerate.php',
            dataType: "html", // le fichier php fait un echo de code HTML
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: dataString
        })
        .done(function (response, textStatus, jqXHR) {
            // Appel réussi : on affiche le code HTML généré par le code serveur
            if ("PARAMETRE" == response) {
                $("#salle").html("<option value=''>Le centre sélectionné n'est pas valide.</option>");
            }
            else if ("REQUETE" == response) {
                $("#salle").html("<option value=''>Un problème technique(code R).</option>");
            }
            else if ("AUCUNEDONNEE" == response) {
                $("#salle").html("<option value=''>Aucune Salle !!!</option>");
            }
            else if ("NONDETERMINE" == response) {
                $("#salle").html("<option value=''>Un problème technique(code I).</option>");
            }
            else if (response.indexOf('<option') != 0) {
                // la chaîne ne débute pas par <option donc c'est probablement un message d'erreur PHP retourné par AJAX
                $("#salle").html("<option value=''>Un problème technique(code E).</option>");
            }
            else {
                $("#salle").html("<option value=''>Veuillez choisir...</option>" + response);
            }
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            // Réagit si le code serveur n'a pas pu être appelé par AJAX, s'il a planté ou s'il n'a pas retourné le bon type de données
            $("#salle").html("<option value=''>Un problème technique(code A).</option>");
        });
    }	
</script>
 
 <!--PIED DE PAGE ICI-->
	<?php
		include('pied-page.php');
	?>
</div>
</body>
</html>