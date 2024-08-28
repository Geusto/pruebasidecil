<?php
// Conexión db
$servidor = "localhost";
$usuario = "root"; 
$contraseña = ""; 
$db = "empresa"; 

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contraseña, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $nombre = $conexion->real_escape_string($nombre);

    // Realizar la consulta
    $sql = "SELECT id, nombre, correo, puesto FROM empleados WHERE nombre LIKE ?";
    $stmt = $conexion->prepare($sql);
    $nombre_param = "%" . $nombre . "%"; 
    $stmt->bind_param("s", $nombre_param); 
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        // Mostrar resultados
        echo '
        <h2>Resultados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Puesto</th>
                </tr>
            </thead>
            <tbody>';

        if ($resultado->num_rows > 0) {
            // Mostrar los datos en filas de la tabla
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
                echo "<td>" . htmlspecialchars($fila["correo"]) . "</td>";
                echo "<td>" . htmlspecialchars($fila["puesto"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No se encontraron resultados</td></tr>";
        }

        echo '
            </tbody>
        </table>';
    } else {
        // Mostrar error en caso de fallo en la consulta
        echo "Error en la consulta: " . $conexion->error;
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    echo "No se enviaron datos.";
}

// Cerrar la conexión
$conexion->close();