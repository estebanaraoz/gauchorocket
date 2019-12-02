<?php
    include("helpers/conexion.php");

    include("modelo/modelo_busqueda_servicios.php");
    include("modelo/modelo_busqueda_cabinas.php");
    include("modelo/modelo_reserva_orbitales.php");
    include("vista/vista_reserva_orbitales.php");

if(isset($_POST['insertar'])){
    include($_SERVER["DOCUMENT_ROOT"]."/modelo/modelo_alta_reserva.php");
}

?>
