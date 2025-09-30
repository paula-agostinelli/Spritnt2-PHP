<?php
include("datebase.php");
$name = $_POST['name'];
$lastName = $_POST['lastName'];    
$email = $_POST['email'];
$age = $_POST['age'];   

$insertQuery = "INSERT INTO users (name, last_name, email, age) VALUES ('$name', '$lastName', '$email', $age)";
if ($connection->query($insertQuery) === TRUE) {
    echo "usuario agregado correctamente";
} else {
    echo "Error: " . $insertQuery . "<br>" . $connection->error;
}

header("Location: index.php");
$connection->close();
exit();
?>