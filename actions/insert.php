<?php
session_start();
include("../config/datebase.php");

$insertQuery = "INSERT INTO users (name, lastname, email, age) VALUES (?, ?, ?, ?)";

$stmt = $connection->prepare($insertQuery);

if($stmt === false) {
    $_SESSION['message'] = "Error en la preparación de la consulta: " . $connection->error;
    $_SESSION['message_type'] = "danger";
    header("Location: ../index.php");
    exit();
}
// Se usan parámetros preparados para evitar inyecciones SQL
$stmt->bind_param("sssi", $_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['age']);

if($stmt->execute()) {
    $_SESSION['message'] = "Usuario agregado correctamente.";
    $_SESSION['message_type'] = "success";
} else {
    $_SESSION['message'] = "Error al agregar usuario: " . $stmt->error;
    $_SESSION['message_type'] = "danger";
}
$stmt->close();
$connection->close();
header("Location: ../index.php");
exit();
?>