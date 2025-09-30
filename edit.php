<?php
include("datebase.php");
$id = $_GET['id'];
$selectQuery = "SELECT * FROM users WHERE id = '$id'";
$result = $connection->query($selectQuery);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $lastName = $row['last_name'];
    $email = $row['email'];
    $age = $row['age'];
} else {
    echo "Usuario no encontrado";
    exit();
}
$connection->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div>
        <h1>Editar de usuario</h1>
        <hr>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">   
            <div class="mb-3">
                <label for="inputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="name" required value="<?php echo $name; ?>">
            </div>
            <div class="mb-3">
                <label for="inputLastName" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="lastName" required value="<?php echo $lastName; ?>">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="email" required value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="inputAge" class="form-label">Edad</label>
                <input type="number" class="form-control" name="age" required value="<?php echo $age; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>