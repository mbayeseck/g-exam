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
	
	<script type="text/javascript" src="dist/js/jquery.autocomplete.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <style>
         #project-label {
            display: block;
            font-weight: bold;
            margin-bottom: 1em;
         }
         #project-icon {
            float: left;
            height: 32px;
            width: 32px;
         }
         #project-description {
            margin: 0;
            padding: 0;
         }
      </style>
	<script>
	<?php
        include('connexion.php'); 
		$reponse=$bdd->query("SELECT S.codeSite,S.nomSite,P.nomPet, E.idEquip, E.nomEquip, E.numSerie FROM Site S LEFT JOIN Petrolier P ON P.codePet=S.codePet LEFT JOIN Equipement E ON E.codeSite=S.codeSite");
	?>
	$(function() {
            var projects = [
			
			<?php
				while($row=$reponse->fetch()){
			         ?>
			
                    {value: '<?=$row['idEquip']?>',label: '<?=$row['nomEquip']?>',label: '<?=$row['codeType']?>'},
           
                
                   <?php
                    }
							$reponse->closeCursor();
                    ?> 
                            ];  
				var obj={'index':1,'value':2,'values':3};				
         $( "#client" ).autocomplete({
            minLength: 0,
            source: projects,
            focus: function( event, ui ) {
               $( "#client" ).val( ui.item.label );
                  return false;
               },
            select: function( event, ui ) {
               $( "#project" ).val( ui.item.label );
               $( "#equip" ).val( ui.item.value );
				$.each(obj, function(index, value) { // pour chaque noeud JSON
				// on ajoute l option dans la liste
				$( "#technicien" ).append('<option value="'+ index +'">'+ index +'</option>');
			});
					                
			  return false;
            }
         })
         .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append( "<a>" + item.label +"</a>" )
            .appendTo( ul );
         };
         });
    </script>
	<style type="text/css">
		label
		{
		display: block;
		width: 300px;
		float: left;
		}
	.autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
	.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	.autocomplete-selected { background: #F0F0F0; }
	.autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
	</style>
	
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <!-- INCLUDE ICI LE MENU PRINCIPAL-->
	<?php
		include('menu-principal.php');
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
		<form method="POST" action="">
		<label>Station : </label><input name="client" id="client" class="ui-autocomplete ui-widget-content ui-corner-all"/><br/><br/>
		<label>Numéro BT : </label><input name="numBt" id="numBt"/><br/><br/>
		<label>Equipement : </label><input name="equip" id="equip"/><br/><br/>
		<label>Affecté à : </label><select id="technicien"><option>Ibrahima GASSAMA</option></select><br/><br/>
		<label>Type de Demande : </label><select id="type"><option>MA</option></select><br/><br/>
		<label>Priorité : </label><select id="priorite"><option>1</option><option>2</option><option>3</option></select><br/><br/>
		<label>Date de Demande : </label><input name="dated" id="datepicker"/><br/><br/>
		<label>Description du Problème : </label><textarea id="description"></textarea><br/>
		<label>Causes : </label><textarea id="causes"></textarea><br/>
		<label></label><input type="submit" value="Valider">
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