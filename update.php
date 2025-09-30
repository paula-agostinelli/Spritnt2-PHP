<?php
include ("datebase.php");
$id = $_POST['id'];
$name = $_POST['name'];
$lastName = $_POST['lastName'];         
$email = $_POST['email'];
$age = $_POST['age'];

$updateQuery = "UPDATE users SET name='$name', last_name='$lastName', email='$email', age=$age WHERE id = $id";
if ($connection->query($updateQuery) === TRUE) {
    echo "usuario actualizado correctamente";
} else {
    echo "Error: " . $updateQuery . "<br>" . $connection->error;
}   
header("Location: index.php");
$connection->close();
exit();
?>
