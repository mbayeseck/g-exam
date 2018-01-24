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
	
	<script type="text/javascript" charset="utf-8">
	
	$(document).ready(function() {
    $('#example').DataTable();
		} );
 	</script>   
	<!-- <script src="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"></script> -->
	
	

</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <!-- INCLUDE ICI LE MENU PRINCIPAL-->
	<?php
	//	include('file_session.php');
		include('menu-principal.php');
        include('connexion.php');
        $reponse=$bdd->query("SELECT * FROM Petrolier");
	?>
    
 <div class="content-wrapper">
     <div class="container">
            <section class="content">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">LISTE DES CLIENTS</h3>
                    </div>
                    <div class="box-body">
					
					<!--CONTENU DE LA PAGE-->
					<table id="example" class="display" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Code</th>
							<th>Nom</th>
							<th>Adresse</th>						
							<th>Edition</th>
						</tr>
					</thead>						
						<tbody>
                            <?php
                                while($row=$reponse->fetch()){
                            ?>
						<tr>
							<td><?=$row['codePet']?></td>
                            <td><?=$row['nomPet']?></td>
                            <td><?=$row['contactPet']?></td>						
							<td><center><form method="POST" action="source.php" TARGET=Source2> 
							<input border=0 src="" type="submit" value='Edit' align="middle" name="edit" id="edit">
							</form></center></td>  
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