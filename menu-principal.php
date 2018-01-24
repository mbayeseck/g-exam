<!-- MENU PRINCIPAL-->
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="login.php" class="navbar-brand"><b>G-EXAM</b></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
						
						
						 <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion des Candidats<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="nouvelle-demande.php">Ajouter Candidat</a></li>
                                <li class="divider"></li>
                                <li><a href="affichage-candidat.php">Liste Candidats</a></li>
                            </ul>
                        </li>
						 <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion des notes<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="affichage-client.php">Renseigner notes</a></li>
                                <li class="divider"></li>
                                <li><a href="affichage-station.php">Relevés de notes</a></li>
                            </ul>
                        </li>
						
						 <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion des Examinateurs<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="affichage-client.php">Ajouter examinateur</a></li>
                                <li class="divider"></li>
                                <li><a href="affichage-station.php">Liste des examinateurs</a></li>
                            </ul>
                        </li>
						
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gestion des Examens<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="affichage-client.php">Ajouter une Session</a></li>
                                <li class="divider"></li>
                                <li><a href="affichage-station.php">Liste des examens</a></li>
								<li class="divider"></li>
                                <li><a href="affichage-station.php">Liste des examens en cours</a></li>
                            </ul>
                        </li>
						
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="affichage-technicien.php">Gestion des utilisateurs</a></li>
                                <li class="divider"></li>
                                <li><a href="affichage-agent.php">Gestion des anonymats</a></li>
								<li class="divider"></li>
								<li><a href="affichage-agent.php">Gestion des matières</a></li>
								<li class="divider"></li>
								<li><a href="affichage-agent.php">Gestion des Attestations</a></li>
								<li class="divider"></li>
								<li><a href="affichage-agent.php">Gestion des procès-verbaux</a></li>
                            </ul>
                        </li>
						
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Synthese<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Résultats</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Exporter en Excel</a></li>
                            </ul>
                        </li>
						
                    </ul>
                  
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown messages-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"> 4 messages</li>
                                <li>

                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">

                                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>

                                                <h4>
                                                    Equipe d'aide
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>

                                                <p>Bonjour sa fait un by comment vous allez</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Voir toutes les Messages</a></li>
                            </ul>
                        </li>

						<!--
                        <li class="dropdown notifications-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header"> 10 notifications</li>
                                <li>

                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 membres nous ont rejoins aujourd'hui
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">Voir toutes les messages</a></li>
                            </ul>
                        </li>

                        <li class="dropdown tasks-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">9 taches</li>
                                <li>

                                    <ul class="menu">
                                        <li>
                                            <a href="#">

                                                <h3>
                                                    Designer vos bouttons
                                                    <small class="pull-right">20%</small>
                                                </h3>

                                                <div class="progress xs">

                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Completer</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">Voir toutes les taches</a>
                                </li>
                            </ul>
                        </li>
						
						
						-->

                        <li class="dropdown user user-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">

                             <!--   <span class="hidden-xs"><?PHP echo $_SESSION['prenomAg'],' ',$_SESSION['nomAg'];?></span>  -->
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header">
                                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                    <p>
                                        Malick Sy - Professeur de Mathématiques
                                        <small>Président Jury</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">

                                    <div class="col-xs-4 text-center">
                                        <a href="#">Amis</a>
                                    </div>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="login.php" class="btn btn-default btn-flat">Deconnexion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>