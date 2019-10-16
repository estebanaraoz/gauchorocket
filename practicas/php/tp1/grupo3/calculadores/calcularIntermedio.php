<?php

$valor1 = $_POST["val1"];
$valor2 = $_POST["val2"];
$valor3 = $_POST["val3"];

if ($valor1 > $valor2 && $valor1 < $valor3 || $valor1 < $valor2 && $valor1 > $valor3 ) {
  echo "El número intermedio es: ".$valor1;
}
else if($valor2 > $valor1 && $valor2 < $valor3 || $valor2 < $valor1 && $valor2 > $valor3){
  echo "El número intermedio es: ".$valor2;
}

else if($valor3 > $valor1 && $valor3 < $valor2 || $valor3 < $valor1 && $valor3 > $valor2){
  echo "El número intermedio es: ".$valor3;
}

 ?>
