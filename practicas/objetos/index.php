<?php

echo "Primer ejemplo objetos";

// El cliente quiere depositar 200 en el cajero

$cajero = new Cajero();
$cuentaGonza = new Cuenta(new Cliente("Gonza"), new Dinero() );

$cajero->depositarEn($cuentaGonza, new Dinero(200));

echo $cuentaGonza->consultarSaldo();

?>
