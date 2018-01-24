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
			/*include('connexion.php');     */
		include('menu-principal.php');
		/*Recupération de la valeur du service envoyée par le formulaire*/
	/*	$idr = isset($_POST['station'])?$_POST['station']:null;		
		$reponse=$bdd->query("SELECT I.idInter,I.nomInter,I.prenomInter,I.contactInter,Z.nomZone,I.latitude,I.longitude FROM Intervenant I 
									LEFT JOIN Zone Z ON Z.idZone=I.idZone");*/
			if(isset($_POST['valider'])&&isset($_POST['station']))
				{
					$date=date("Y-m-d");
					$heure=date("H:i:s");
					$station= $_POST['station'];
					$codeAgent='MKS';
					$Equipement= $_POST['equipement'];
					$Technicien= $_POST['technicien'];
					$Etat='NOUV';
					$NumBT= $_POST['numBt'];
					$typedemande= $_POST['typedemande'];
					$priorite= $_POST['priorite'];
					$datecreation=$date." ".$heure;
					$datedemande=$date." ".$heure;
					$description=$_POST['description'];
					$causes=$_POST['causes'];
			$save=$bdd->query("insert into Demande values('','$codeAgent','$Equipement','$Technicien','$station','$Etat','$NumBT','$typedemande','$datecreation','$datedemande','$description','$causes','$priorite')");	
			if($save){
				echo "<script type='text/javascript'>document.location.replace('index.php');</script>";			
			}
			else
			{
				echo "<script type='text/javascript'>alert('Verifiez les Input SVP !!!!!!')</script>";			
			}
            	}	
			$reponse1=$bdd->query("SELECT S.codeSite,S.nomSite,P.nomPet FROM Site S LEFT JOIN Petrolier P ON P.codePet=S.codePet");
			$code_site = array();
			$nom_site = array();
			$nom_petrolier = array();
			$nb_site = 0;
			if($reponse1 != false)
				{
					 while($row1=$reponse1->fetch())
						{
							array_push($code_site, $row1['codeSite']);
							array_push($nom_site, $row1['nomSite']);
							array_push($nom_petrolier, $row1['nomPet']);
							$nb_site++;
						}
				}	
	
	?>
    
 <div class="content-wrapper">
     <div class="container">
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">NOUVELLE DEMANDE</h3>
                    </div>
                    <div class="box-body">
					
			<!--CONTENU DE LA PAGE-->			
		<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="changer">
		<label>Station : </label>
		
		<select name="station" id="station" onchange="this.form.submit()">
		<option value="0"> Station ...</option>
		<?php
		for($i = 0; $i < $nb_site; $i++)
				{							
                ?>	
			<option name="station" value="<?php echo($code_site[$i]); ?>"<?php echo((isset($idr) && $idr == $code_site[$i])?" selected=\"selected\"":null); ?> ><?php echo($nom_petrolier[$i]." ".$nom_site[$i]." ".$dir); ?></option>
			<?php
                }
						
            ?>
			
		</select>
		
		
		
		<?php
			if(isset($idr)){
				$reponse2=$bdd->query("SELECT idEquip,nomEquip".
						" FROM Equipement".
						" WHERE codeSite = '$idr'".
						" ORDER BY codeType");
				$nd = 0;
				$code_equip = array();
				$nom_equip = array();		
				while($row2=$reponse2->fetch())
						{
						array_push($code_equip, $row2['idEquip']);
						array_push($nom_equip, $row2['nomEquip']);
						$nd++;
						}
				?>	
		<br/><br/><label>Equipement : </label>				
		<select name="equipement" id="equipement">
				<option value="-1">---Equipement---</option>			
				<?php
				for($i = 0; $i < $nd; $i++)
					{	
				?>		
		
		<option value="<?php echo($code_equip[$i]); ?>"><?php echo($nom_equip[$i]); ?></option>
				<?php
				}
				}
				?>
		</select><br/><br/>
		<label>Numéro BT : </label><input name="numBt" id="numBt"/><br/><br/>
		<label>Affecté à : </label>
		<select name="technicien" id="technicien">
							<?php
                                while($row=$reponse->fetch()){
                            ?>
		<option value="<?=$row['idInter']?>"><?=$row['prenomInter']," ",$row['nomInter']?></option>
							<?php
                                }
								$reponse->closeCursor();
                            ?>
		</select><br/><br/>
		<label>Type de Demande : </label><select name="typedemande" id="type"><option value="MA">MA</option></select><br/><br/>
		<label>Priorité : </label><select name="priorite" id="priorite"><option value="1">1</option><option value="2">2</option><option value="3">3</option></select><br/><br/>
		<label>Date de Demande : </label><input name="dated" id="datepicker"/><br/><br/>
		<label>Description du Problème : </label><textarea name="description" id="description"></textarea><br/>
		<label>Causes : </label><textarea name="causes" id="causes"></textarea><br/>
		<label></label><input type="submit" value="Valider" name="valider">
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