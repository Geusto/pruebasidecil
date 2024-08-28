<?php

//código original
$numbers = [1, 2, 3, 4, 5];
  $sum = 0;
  for ($i = 0; $i < count($numbers); $i++) {
      $sum += $numbers[$i];
  }
  echo "La suma es: " . $sum . '<br>';

  // una forma en que se puede refactorizar es recortar el iterador 
  $numbers2 = [1, 2, 3, 4, 5];
  $sum2 = 0;

  foreach ($numbers2 as $number) {
    $sum2 += $number;
  }
  
  echo "La suma es: " . $sum2 . '<br>';

  // o usando el metodo array_sum que dicta la documentación  https://www.php.net/manual/es/function.array-sum.php
  $numbers3 = [1, 2, 3, 4, 5];
  $sum3 = 0;

  $sum3 = array_sum($numbers3);
  echo "La suma es: " . $sum3;