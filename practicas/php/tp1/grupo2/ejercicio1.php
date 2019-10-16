<?php

$var = 3;
$res=0;
$cont=0;

while ($res < pow($var,$var)) {
  $cont ++;
  $res = $var*$cont;
  echo($res."<br>");
}

 ?>
