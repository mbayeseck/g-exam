			<table id="example" class="display" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>N° Candidat</th>
							<th>N° SALLE</th>
							<th>N° CNI</th>
							<th>Prénom</th>
							<th>Nom</th>
							<th>Date de Naissance</th>
							<th>Lieu de Naissance</th>
							<th>Genre</th>
							<th>Provenance</th>
							<th>Edition</th>
						</tr>
					</thead>
						
						<tbody>
                            <?php
                                while($row=$reponse->fetch_assoc()){
                            ?>
							
						<tr>
							<td><?=$row['NUMBASE']?></td>
                            <td><?=$row['NUMSALLE']?></td>
                            <td><?=$row['CNI']?></td>
							<td><?=$row['PRENOM']?></td>
							<td><?=$row['NOM']?></td>
							<td><?=$row['DATENAIS']?></td>
							<td><?=$row['LIEUNAIS']?></td>
							<td><?=$row['GENRE']?></td>
							<td><?=$row['PROVENANCE']?></td>
							<td><center><form method="POST" action="<?php echo($_SERVER['PHP_SELF']); ?>"> 
							<input type="submit" value='' align="middle" name="edit" id="edit" style="background:url(img/edit.gif) no-repeat;width:25px;height:30px;"></input>
							<input name="iddemande" type="hidden" value="<?=$row['NUMBASE']?>"/>
							<input name="bt" type="hidden" value="<?=$row['NUMSALLE']?>"/>
							<input name="station" type="hidden" value="<?=$row['CNI']?>"/>
							<input name="datedemande" type="hidden" value="<?=$row['PRENOM']?>"/>
							<input name="technicien" type="hidden" value="<?=$row['NOM']?>"/>
							<input name="etat" type="hidden" value="<?=$row['DATENAIS']?>"/>
							<input name="type" type="hidden" value="<?=$row['LIEUNAIS']?>"/>
							<input name="priorite" type="hidden" value="<?=$row['GENRE']?>"/>
							<input name="nomequip" type="hidden" value="<?=$row['PROVENANCE']?>"/>
							</form> </center></td>  
						</tr>
						       
                            <?php
                                }
								$con->close();
								//$reponse->closeCursor();
                            ?>
                      
				</tbody>
			</table>