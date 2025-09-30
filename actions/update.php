<?php
session_start();
include("../config/datebase.php");

$updateQuery = "UPDATE users SET name = ?, lastname = ?, email = ?, age = ? WHERE id = ?";

$stmt = $connection->prepare($updateQuery);
if($stmt === false) {
    $_SESSION['message'] = "Error en la preparación de la consulta: " . $connection->error;
    $_SESSION['message_type'] = "danger";
    header("Location: ../index.php");
    exit();
}

$stmt->bind_param("sssii", $_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['age'], $_POST['id']);

if($stmt->execute()) {
    $_SESSION['message'] = "Usuario actualizado correctamente.";
    $_SESSION['message_type'] = "success";
} else {
    $_SESSION['message'] = "Error al actualizar usuario: " . $stmt->error;
    $_SESSION['message_type'] = "danger";
}
$stmt->close();
$connection->close();
header("Location: index.php");
exit();
?>
