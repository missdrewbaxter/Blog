<?php
//Server details
$host = "";
$userName = "";
$password = "";
$dbName = "";

//Connect to server
$mysqli = new mysqli($host,$userName,$password,$dbName);

//Check connection
if ($mysqli->connect_error){
	echo "WARNING: Connection Error!";
}

?>