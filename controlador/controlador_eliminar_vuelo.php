<?php
include($_SERVER["DOCUMENT_ROOT"]."/public/header.php");
if(isset($_POST['eliminar'])) {
    include($_SERVER["DOCUMENT_ROOT"] ."/modelo/modelo_eliminar_vuelo.php");
}
include($_SERVER["DOCUMENT_ROOT"]."/modelo/modelo_asociar_nave.php");


include($_SERVER["DOCUMENT_ROOT"]."/vista/vista_eliminar_vuelo.php");

?>