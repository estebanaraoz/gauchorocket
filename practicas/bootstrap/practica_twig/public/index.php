<?php

require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array('cache' => '../cache/twig'));

// $html = $twig->render('saludo.html.twig');
// echo($html);

echo $twig->render('saludo2.html.twig', array('nombre' => 'Gonzalo', 'titulo_pagina'=> 'Saludo de prueba'));

?>
