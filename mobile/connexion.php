<?PHP
$server_name="cosetamgmaint.mysql.db";
$user_name="cosetamgmaint";
$password="Tokheim2011";
$database_name="cosetamgmaint";

$con=mysql_connect($server_name,$user_name,$password)
or die ('Server error'.mysql_error());

mysql_select_db($database_name) or die ('DB error : Unable to select Database');

mysql_query("SET NAMES 'utf8'");
?>