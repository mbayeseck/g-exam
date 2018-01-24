<?PHP
	
if(isset($_POST['txtname'])&&isset($_POST['txttel'])&&isset($_POST['txtmajor'])){
	include_once("connexion.php");
	$txtname=$_POST['txtname'];
	$txttel=$_POST['txttel'];
	$txtmajor=$_POST['txtmajor'];
	mysql_query("insert into student(st_name,st_tel,st_major) values('$txtname','$txttel','$txtmajor')");
	echo "inside";
}
echo "outside";
?>
<html>
	<head>
		<title>Insert Data</title>
	</head>
	<body>
		<form action="<?PHP $_PHP_SELF ?>" method="post">
			Nom de l'étudiant<input type="text" name="txtname" placeholder="Nom de l'étudiant"/>
			Tel<input type="text" name="txttel" placeholder="Tel"/>
			Major<input type="text" name="txtmajor" placeholder="Major"/>
			<input type="submit" value="valider"/>
		</form>
	</body>	
</html>