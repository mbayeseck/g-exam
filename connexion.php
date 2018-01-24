<?PHP
$server_name="localhost";
$user_name="root";
$password="";
$database_name="bddep";

$con= new mysqli($server_name,$user_name,$password,$database_name);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>