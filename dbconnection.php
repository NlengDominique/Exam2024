<?php


$servername = "localhost";
$database = "gestionbiblio";
$username = "root";
$password = "";

$db = new PDO("mysql:host=$servername; dbname=$database", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


?>