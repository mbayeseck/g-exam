<?php
	include_once("connexion.php");
	$query="SELECT * FROM Intervenant";
	$result=mysql_query($query) or die ('Error in query'.mysql_error);
	
	while($row=mysql_fetch_assoc($result)){
		$output[]=$row;
	}
	print(json_encode($output));
if(isset($_POST['txtidInter'])&&isset($_POST['txtlatitude'])&&isset($_POST['txtlongitude'])){

	$txtidInter=$_POST['txtname'];
	$txtlatitude=$_POST['txttel'];
	$txtlongitude=$_POST['txtmajor'];
	mysql_query("UPDATE Intervenant SET idInter='$txtname',
										latitude='$txttel',
										longitude='$txtmajor'
														");
	echo "inside";
}
echo "outside";
?>