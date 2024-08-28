<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de usuarios</title>
</head>
<body>
  <h2>Gestión de usuarios</h2>
  
<form action="actions_usuario.php" method="post">
    Nombre: <input type="text" name="nombre" placeholder="Ingresa el nombre" required><br>
    Correo electrónico: <input type="email" name="correo" placeholder="Ingresa el correo" required><br>
    Contraseña: <input type="password" name="password" placeholder="Ingresa la Contraseña" required><br>
    <input type="submit" value="Guardar Usuario">
  </form>
</body>
</html>