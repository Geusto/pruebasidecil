<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar el tamaño de la matriz y validarlo
    $tamano = isset($_POST['tamano']) ? intval($_POST['tamano']) : 0;

    // Validar que el tamaño sea al menos 11, sea impar y no exceda 19
    if ($tamano >= 11 && $tamano <= 19 && $tamano % 2 == 1) {
        // Crear una matriz vacía
        $matriz = array_fill(0, $tamano, array_fill(0, $tamano, 0));
        
        // Inicializar las variables para el recorrido en espiral
        $valor = 1;
        $izquierda = 0;
        $derecha = $tamano - 1;
        $arriba = 0;
        $abajo = $tamano - 1;

        // Llenar la matriz en espiral
        while ($valor <= $tamano * $tamano) {
            // Llenar de izquierda a derecha
            for ($i = $izquierda; $i <= $derecha; $i++) {
                $matriz[$arriba][$i] = $valor++;
            }
            $arriba++;

            // Llenar de arriba a abajo
            for ($i = $arriba; $i <= $abajo; $i++) {
                $matriz[$i][$derecha] = $valor++;
            }
            $derecha--;

            // Llenar de derecha a izquierda
            for ($i = $derecha; $i >= $izquierda; $i--) {
                $matriz[$abajo][$i] = $valor++;
            }
            $abajo--;

            // Llenar de abajo a arriba
            for ($i = $abajo; $i >= $arriba; $i--) {
                $matriz[$i][$izquierda] = $valor++;
            }
            $izquierda++;
        }

        // Mostrar la matriz en una tabla HTML
        echo '<style>
            table {
              border-collapse: collapse;
              table-layout: fixed;
            }
            table, tr, td {
              border: 1px solid black;
              width: 50px;
              height: 50px;
              text-align: center;
            }
            table tr:nth-child(even) td:nth-child(odd){
              background-color: black;
              color: white;
            }
            table tr:nth-child(odd) td:nth-child(even){
              background-color: black;
              color: white;
            }
        </style>';

        echo '<h2>Matriz en Espiral ' . $tamano . 'x' . $tamano . '</h2>';
        echo '<table>';

        for ($i = 0; $i < $tamano; $i++) {
            echo '<tr>';
            for ($j = 0; $j < $tamano; $j++) {
                echo '<td>' . htmlspecialchars($matriz[$i][$j]) . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
        echo '<p>Ejercicio elaborado hasta el punto 6</p>';
    } else {
        echo "El tamaño debe ser un número impar mayor o igual a 11 y menor o igual a 19.";
    }
} else {
    echo "No se enviaron datos.";
}
