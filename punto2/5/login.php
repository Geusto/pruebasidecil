<?php
session_start();

$usuario_valido = 'admin';
$contraseña_valida = '1234';

$usuario = trim($_POST['usuario']);
$contraseña = trim($_POST['contraseña']);

if ($usuario === $usuario_valido && $contraseña === $contraseña_valida) {
    $_SESSION['usuario'] = $usuario;
    echo '<h3>Bienvenido</h3> <br>';
    echo "<a href='logout.php'>Cerrar sesion</a>";
} else {
    echo "Usuario o contraseña incorrectos. <a href='login.php'>Inténtalo de nuevo</a>";
}
