<?php

  $num1 = trim($_POST['num1']);
  $num2 = trim($_POST['num2']);

  if (is_numeric($num1) && is_numeric($num2)) {
    echo 'la suma de numeros es ' , $num1+$num2;
  } else {
    echo 'los datos ingresados no son de tipo numericos';
  }