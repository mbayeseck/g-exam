<?PHP
	include_once("connexion.php");
	$query="SELECT D.idDem,D.numBtDem,E.nomEquip,P.nomPet,S.nomSite,D.codeEtat,D.typeDem,
    D.dateDem,D.prioriteDem,D.descriptionDem,I.nomInter FROM Demande D LEFT JOIN Equipement E ON D.idEquip=E.idEquip
								LEFT JOIN Site S ON D.codeSite=S.codeSite
								LEFT JOIN Intervenant I ON D.idInter=I.idInter
								LEFT JOIN Petrolier P ON P.codePet=S.codePet";
	$result=mysql_query($query) or die ('Error in query'.mysql_error);
	
	while($row=mysql_fetch_assoc($result)){
		$output[]=$row;
	}
	print(json_encode($output));
?>