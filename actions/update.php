<?php
include ("config/datebase.php");
$id = $_POST['id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];         
$email = $_POST['email'];
$age = $_POST['age'];

$updateQuery = "UPDATE users SET name='$name', lastname='$lastname', email='$email', age=$age WHERE id = $id";
if ($connection->query($updateQuery) === TRUE) {
    echo "Usuario actualizado correctamente.";
} else {
    echo "Error: " . $updateQuery . "<br>" . $connection->error;
}   
header("Location: index.php");
$connection->close();
exit();
?>
