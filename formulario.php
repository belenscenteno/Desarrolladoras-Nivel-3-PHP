<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Usuario</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Formulario de Usuario</h1>
    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <input type="submit" value="Guardar">
    </form>

    <?php
    if ($_POST) {
        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        // Crear la conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cursosql";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar si la conexión fue exitosa
        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        // Preparar la consulta SQL para insertar los datos en la tabla 'usuario'
        $sql = "INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "Datos guardados correctamente.";
        } else {
            echo "Error al guardar los datos: " . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
    ?>
</body>
</html>
