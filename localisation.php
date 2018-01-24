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
		
</head>
 <style type="text/css">
    #box-body{position:relative;width:990px;margin:auto;}
    #box-body #map{width:990px;height:500px;margin:auto;}
  </style> 
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
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
                        <h3 class="box-title">LOCALISATION</h3>
                    </div>
                    <div id="box-body">
					
			<!--CONTENU DE LA PAGE-->
				  <div id="map">
            <p>Veuillez patienter pendant le chargement de la carte...</p>
					</div>
			<!--FIN DU CONTENU DE LA PAGE-->
			 <script type="text/javascript" src="dist/js/pages/jquery.min.js"></script>
    <script type="text/javascript" src="dist/js/pages/jquery-ui-1.8.12.custom.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" charset="utf-8">
			
            var locations = [   
                <?php
				while($row=$reponse->fetch()){
			         ?>
			
                    ['<?=$row['prenomInter']," ",$row['nomInter']?>',<?=$row['latitude']?>,<?=$row['longitude']?>,<?=$row['idInter']?>],
           
                
                   <?php
                    }
							$reponse->closeCursor();
                    ?> 
                            ];
	        

    var map;
    var markers = [];

    function init(){
      map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(14.6964, -17.4375),
        mapTypeId: google.maps.MapTypeId.TERRAIN
      });

      var num_markers = locations.length;
      for (var i = 0; i < num_markers; i++) {  
        markers[i] = new google.maps.Marker({
          position: {lat:locations[i][1], lng:locations[i][2]},
          map: map,
          html: locations[i][0],
          id: i,
        });

        google.maps.event.addListener(markers[i], 'click', function(){
          var infowindow = new google.maps.InfoWindow({
            id: this.id,
            content:this.html,
            position:this.getPosition()
          });
          google.maps.event.addListenerOnce(infowindow, 'closeclick', function(){
            markers[this.id].setVisible(true);
          });
          this.setVisible(false);
          infowindow.open(map);
        });
      }
    }

google.maps.event.addDomListener(window, 'load', init);
 	</script>  
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