<?php
include("datebase.php");
$name = $_POST['name'];
$lastname = $_POST['lastname'];    
$email = $_POST['email'];
$age = $_POST['age'];   

$insertQuery = "INSERT INTO users (name, lastname, email, age) VALUES ('$name', '$lastname', '$email', $age)";
if ($connection->query($insertQuery) === TRUE) {
    echo "Usuario agregado correctamente.";
} else {
    echo "Error: " . $insertQuery . "<br>" . $connection->error;
}

header("Location: index.php");
$connection->close();
exit();
?>