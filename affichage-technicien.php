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
	<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="plugins/fastclick/fastclick.min.js"></script>
	<script src="dist/js/app.min.js"></script>
	<script src="dist/js/demo.js"></script>
	
	    <!-- LIGNES AJOUTEES POUR CETTE PAGE-->
	<script type="text/javascript" src="plugins/DataTable/media/js/jquery.js"></script>
	<script type="text/javascript" src="plugins/DataTable/media/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" href="plugins/DataTable/media/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script type="text/javascript" charset="utf-8">	
	$(document).ready(function() {
    $('#example').DataTable();
		} );
	
	
	     $(document).ready(function () {
$('.map').on('click', function (e) {
             e.preventDefault();
             //var page = $(this).attr("href");
	var page = "ICI LE CODE PROVENANT DE L'IFRAME DE GOOGLE MAP";
             var pagetitle = $(this).attr("href");
	var width = $(this).attr("data-width");
	var height = $(this).attr("data-height");
             var $dialog = $('<div></div>')
	.html('<iframe width='+width+' height='+height+' src='+page+' frameborder="0" allowfullscreen output=embed></iframe>').dialog({
                 autoOpen: false,
                 modal: true,
                 width: "auto",
                 height: "auto",
                 show: "slide",
		hide: "fade",
		resizable: false,
                 title: pagetitle,
		
		buttons: {
			  "Fermer": function() {
				  $( this ).dialog( "close" );
			  }
		}
             });
             $dialog.dialog('open');
         });
     });
       
 	</script>   
	<!-- <script src="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"></script> -->
	
	

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
<a href="Google Map" class="map link" data-width="400" data-height="400">Plan</a>
    <!-- INCLUDE ICI LE MENU PRINCIPAL-->
	<?php
	//	include('file_session.php');
		include('menu-principal.php');
        include('connexion.php');
        $reponse=$bdd->query("SELECT I.idInter,I.nomInter,I.prenomInter,I.contactInter,Z.nomZone,I.latitude,I.longitude FROM Intervenant I 
									LEFT JOIN Zone Z ON Z.idZone=I.idZone");
	?>
    
 <div class="content-wrapper">
     <div class="container">
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">LISTE DES TECHNICIENS</h3>
                    </div>
                    <div class="box-body">
					
					<!--CONTENU DE LA PAGE-->
					<table id="example" class="display" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Id Technicien</th>
							<th>Prenom</th>
							<th>Nom</th>
							<th>Contact</th>
							<th>Zone</th>
							<th>Latitude</th>
							<th>Longitude</th>
							<th>Edition</th>
						</tr>
					</thead>						
						<tbody>
                            <?php
                                while($row=$reponse->fetch()){
                            ?>
						<tr>
							<td><?=$row['idInter']?></td>
							<td><?=$row['prenomInter']?></td>	
                            <td><?=$row['nomInter']?></td>
							<td><?=$row['contactInter']?></td>	
							<td><?=$row['nomZone']?></td>							
                            <td><?=$row['latitude']?></td>
							<td><?=$row['longitude']?></td>	
							<td><center>
							<input border=0 src="" type="button" value='Edit' align="middle" name="edit" class="map">
							</center></td>  
						</tr>
                            <?php
                                }
								$reponse->closeCursor();
                            ?>
                                
				</tbody>
			</table>
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