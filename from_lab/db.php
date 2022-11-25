<?php
echo "Attempting database connection..";
$host ="silva.computing.dundee.ac.uk";
$username = "22ac3u10";
$password = "cba123";
$database = "22ac3u10";

// Create connection
try{
    $mysql = new PDO("mysql:host=".$host.";dbname".$database, $username, $password);
    echo "Successfully Connected to ".$database, "\n";
}catch (PDOException $e){
    echo "Sorry There was an error Executing query\n";
    echo $e->getMessage();
}
?>

//http://localhost/database/db.php
//https://zeno.computing.dundee.ac.uk/2022-ac32006/isiahntina/createtbl.php