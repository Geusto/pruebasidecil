<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de multiplicar</title>
</head>
<body>
<table>
  <tbody>
    <h2>Tabla de mutiplicar</h2>
  <table>
    <thead>
        <tr>
            <th></th>
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <th>x <?php echo $i; ?></th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 1; $i <= 10; $i++) { ?>
            <tr>
                <th><?php echo $i; ?></th>
                <?php for ($j = 1; $j <= 10; $j++) { ?>
                    <td><?php echo $i * $j; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
  </tbody>
</table>
</body>
</html>