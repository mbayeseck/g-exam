<!--CONTENU DE LA PAGE-->
<div id="details_demande">       
            <table> 
                <tr> <td style="color:red;"><b></b></td> </tr> 
            </table>
            <table>
				<tr>
                    <td class="left_td"> <b>N° Demande :</b></td>
                    <td id="iddemande" class="right_td">1605032691</td>
                </tr>
                <tr>
                    <td class="left_td">Affectée à :</td>
                    <td class="right_td">Unknown</td>
                </tr>
                <tr>
                    <td class="left_td">Type de la demande :</td>
                    <td class="right_td">Unknown</td>
                </tr>
                <tr>
                    <td class="left_td">Statut :</td>
                    <td id="statut_demande" class="right_td">ATT</td>
                </tr>
                <tr><td></td><td></td></tr> <!-- Séparation des informations -->
                <tr>
                    <td class="left_td">Station :</td>
                    <td class="right_td">SNSH204 SHELL SN - SS BIGNONA</td>
                </tr>
                <tr>
                    <td class="left_td">Date de la demande :</td>
                    <td class="right_td">10/05/2016 17:23		</td>
                </tr>
                <tr>
                    <td class="left_td">Priorité :</td>
                    <td class="right_td">Partiellement hors service</td>
                </tr>
                <tr>
                    <td class="left_td">Date limite :</td>
                    <td class="right_td">10/05/2016 17:27</td>
                </tr>
                <tr>
                    <td class="left_td">Date et heure de clôture :</td>
                    <td class="right_td">Non clos</td>

                </tr>
                <tr>
                    <td class="left_td">Note attribuée :</td>
                    <td class="right_td">Non Notée</td>
                </tr>
                <tr>
                    <td class="left_td">Typologie :</td>
                    <td class="right_td">n/c</td>
                </tr>
                <tr>
                    <td class="left_td">Num tel :</td>
                    <td class="right_td">n/c</td>
                </tr>
				<tr>
                        <td>
                            <!-- Partie qui supporte la sauvegarde du commentaire -->
                            <input type="button" name="valider" value="Valider" 
                                   style="padding: 3px;" 
                                                                      onclick="submitForm('rs-edit-demande.php?action=valider')"/>
                            <!-- Partie qui supporte le transfère --> 
                            <input type="button" name="transferer" value="Transférer"  style="padding: 3px;" 
                                   onclick="submitForm('rs-transfert.php');" 
                                   />
                            <!-- Partie qui supporte la clôture --> 
                            <input type="button" value="Clôturer"  style="padding: 3px;" 
                                   onclick="submitForm('rs-cloture.php');" 
                                   />
                                                                   <input type="button" value="Dé-clôturer" 
                                       style="padding:3px; margin:3px;" 
                                       disabled                                       onclick="submitForm('rs-edit-demande.php?action=decloture');"/>
                                                               <!-- Partie qui supporte l'édition de rapport -->
                                                                                                                <input type="button" value="Rapports"  style="padding: 3px;" 
                                   onclick="submitForm('rs-edit-rapport.php?action=editer');" />
					<form action="parcsite.php" method="post" target="parcSite"  style="margin: 5px;"
							onsubmit="window.open('', 'parcSite', 'width=1024,height=800toolbar=yes,scrollbars=yes');">
							<input type="hidden" name="IDSTATION" value="1000978" />
							<input style="padding: 3px;" type="submit" value="Parc du site" />
					</form>
                        </td>
                    </tr>
                
            </table>			
         
        </div>
<?php
						
?>
<!--FIN DU CONTENU DE LA PAGE-->               