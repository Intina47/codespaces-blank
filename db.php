//http://localhost/database/db.php
<?php
echo "FILE SUCCESSFULY LOADED";
echo "Attempting database connection..";
$host ="silva.computing.dundee.ac.uk";
$username = "isiahntina";
$password = "AC32006";
$database = "isiahntinadb";

// Create connection
$mysqli = new PDO("mysql:host=".$host.";dbname".$database, $username, $password);
// Check connection
?>