<?php
session_start();
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

echo "Has cerrado sesión. <a href='formlogin.php'>Iniciar sesión</a>";