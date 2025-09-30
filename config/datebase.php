<?php
$host="localhost";
$user="root";
$password="";   
$database="sprint2";
$connection = new mysqli($host, $user, $password, $database);
if ($connection->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
}   
$connection->set_charset("utf8");
?>      