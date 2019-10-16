<?php
$baseMayor = $_POST["baseMayor"];
$baseMenor = $_POST["baseMenor"];
$altura = $_POST["altura"];

$area = (($baseMayor + $baseMenor) /2) * $altura;

echo "El área del trapecio es: ".$area;

 ?>
