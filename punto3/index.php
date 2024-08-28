<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include 'Coche.php';

$carro = new Coche("Mazda", "cx50", "2024");

echo '<p>'. $carro->mostrarInfo() .'<p/>' ; 
?>
</body>
</html>