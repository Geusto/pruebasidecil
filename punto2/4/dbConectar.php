<?php
// Parámetros de conexión
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

// Realizar una consulta
$sql = "SELECT id, nombre, correo, puesto FROM empleados";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar resultados
    echo '
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
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["correo"]) . "</td>";
            echo "<td>" . htmlspecialchars($fila["puesto"]) . "</td>";
            echo "</tr>";
        }
    echo '
        </tbody>
    </table>';
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conexion->close();