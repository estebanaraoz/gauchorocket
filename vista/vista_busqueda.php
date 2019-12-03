<br><br>
<?php
if (!isset($_SESSION["id_usuario"]))
echo "
    <div class=\"alert alert-warning\">
        Recuerda: Solo podran realizar reservas los usuarios registrados.
    </div>
";
?>
<h2>Búsqueda de viajes</h2>
<a href="busqueda_orbitales" class="btn btn-primary">Orbitales</a>
<a href="busqueda_trayectos" class="btn btn-primary">Trayectos</a>
<a href="busqueda_tour" class="btn btn-primary">Tour</a>