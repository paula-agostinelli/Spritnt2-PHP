<?php
session_start();
include('../config/datebase.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteQuery = "DELETE FROM users WHERE id = ?";
    $stmt = $connection->prepare($deleteQuery);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'Usuario eliminado correctamente.';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error al eliminar el usuario: ' . $stmt->error;
        $_SESSION['message_type'] = 'danger';
    }
    $stmt->close();
} else {
    $_SESSION['message'] = 'No se proporcionó un ID de usuario.';
    $_SESSION['message_type'] = 'danger';
}

$connection->close();
header('Location: ../index.php');
exit();
?>