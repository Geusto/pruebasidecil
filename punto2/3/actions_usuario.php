<?php
//archivo JSON donde se almacenarán los usuarios
$archivo = 'usuarios.json';

// Leer el archivo JSON si existe
if (file_exists($archivo)) {
    $contenido = file_get_contents($archivo);
    $usuarios = json_decode($contenido, true);
} else {
    $usuarios = array(); 
}

// validar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    // Validar por nombre y el correo
    $existe = false;
    foreach ($usuarios as $user) {
        if ($user['nombre'] === $nombre || $user['correo'] === $correo) {
            $existe = true;
            break;
        }
    }

    if ($existe) {
        // Mostrar mensaje si el nombre o el correo existe
        echo "<h2>Error: El nombre o el correo electrónico ya están registrados.</h2>";
        echo '<a href="index.php">Regresar al formulario</a>';
    } else {
        // Crear un array para el nuevo usuario
        $usuario = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'password' => $password
        );

        // Agregar el nuevo usuario al array
        $usuarios[] = $usuario;

        // Guardar el array actualizado
        file_put_contents($archivo, json_encode($usuarios, JSON_PRETTY_PRINT));

        // Mostrar los usuarios
        echo "<h2>Usuarios Guardados:</h2>";
        echo "<ul>";
        foreach ($usuarios as $user) {
            echo "<li>Nombre: " . htmlspecialchars($user['nombre']) . " - Correo: " . htmlspecialchars($user['correo']) . "</li>";
        }
        echo "</ul>";
        echo '<a href="index.php">Atras</a>';
    }
} else {
    echo "No se enviaron datos.";
}

