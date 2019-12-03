<?php
include($_SERVER["DOCUMENT_ROOT"]."/public/header.php");

include($_SERVER["DOCUMENT_ROOT"]."/modelo/modelo_modificar_vuelo.php");

include($_SERVER["DOCUMENT_ROOT"]."/vista/vista_modificar_vuelo.php");
if(isset($_POST['actualizar'])) {
    include($_SERVER["DOCUMENT_ROOT"] . "/modelo/modelo_actualizar_vuelo.php");

}

?>