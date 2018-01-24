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
	<link rel="stylesheet" type="text/css" href="plugins/jformer-master/styles/jformer.css"></link>
	<script type="text/javascript" src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="plugins/jformer-master/scripts/jFormer.js"></script>

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
				<?php
			require_once('plugins/jformer-master/php/jformer.php');
			$contactForm = new JFormer('contactForm',array(
				'submitButtonText'=>'Enregistrer','style'=> 'width : 650px;'));
				
			/*Station input text*/
			$nom = new JFormComponentSingleLineText('Station', 'Nom de la Station :', array(
				'validationOptions' => array('Champ Obligatoire')));
			/*Email (input text)*/
			$email = new JFormComponentSingleLineText('email', 'Votre email :', array(
				'validationOptions' => array('required', 'email')));
 
			/*Sujet (input text)*/
			$sujet = new JFormComponentSingleLineText('subject', 'Le sujet :', array(
				'validationOptions' => array('required')));
 
			/*Message (textarea)*/
			$message = new JFormComponentTextArea('message', 'Votre message :', array(
				'validationOptions' => array('required'),
				'height' => 'medium',
				'width' => 'longest'));
			$contactForm->addJFormComponentArray(array(
				$nom,   $email,   $sujet,   $message));
				
			function onSubmit($formValues) {
 
				/* On supposera qu'on utilise une librairie comme PHPMailer */
				$mail = new PHPMailer();
 
				/*  Si jamais il y a un problème dans l'envoi */
				if(!$mail->Send()) {
					$return = array('status' => 'failure', 'response' => $mail->ErrorInfo);
				/* Message de retour en HTML  */
					$return['failureNoticeHtml'] = "Désolé envoi impossible!!"; 
						}
				else {
					$return = array('status' => 'success', 'response' => 'Message envoyé');
				/* Message de retour en HTML  */
						$return['successPageHtml'] = '<p>Merci pour votre message!!</p>'; 
					}
					return $return;
				}
			$contactForm->processRequest();					
		?>
	
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