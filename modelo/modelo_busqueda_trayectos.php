<?php
    //Realiza conexion con la base de datos.
    $conn = getConexion();

    if(isset($_POST['buscar'])){
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $fecha = $_POST['fecha'];

        $criterio="";

        $sql = "
            SELECT via.id_viaje, tv.nombre_tipo_viaje, via.salida_viaje, via.duracion, via.precio, via.id_tipo_viaje, lugO.nombre_lugar nombre_origen, lugD.nombre_lugar nombre_destino,  (vncG.asientos_disponibles + vncF.asientos_disponibles + vncS.asientos_disponibles) cantidad, vncG.asientos_disponibles general, vncF.asientos_disponibles familiar, vncS.asientos_disponibles suit
            FROM viaje as via 
            INNER JOIN lugar as lugO ON via.id_lugar_origen = lugO.id_lugar
            INNER JOIN lugar as lugD ON via.id_lugar_destino = lugD.id_lugar
            INNER JOIN tipo_viaje tv ON tv.id_tipo_viaje = via.id_tipo_viaje
            INNER JOIN viaje_nave_cabina as vncG ON vncG.id_viaje = via.id_viaje AND vncG.id_cabina = 1 
            INNER JOIN viaje_nave_cabina as vncF ON vncF.id_viaje = via.id_viaje AND vncF.id_cabina = 2 
            INNER JOIN viaje_nave_cabina as vncS ON vncS.id_viaje = via.id_viaje AND vncS.id_cabina = 3
            WHERE via.id_tipo_viaje BETWEEN 2 AND 3
         ";

        if(!empty($origen)){
            $criterio = " AND via.id_lugar_origen = '$origen' ";
        }
        if(!empty($destino)){
            $criterio.= " and via.id_lugar_destino = '$destino'";
        }
        if(!empty($fecha)){
            $criterio.=" AND DATE(via.salida_viaje) = '$fecha'";
        }

        $sql.=$criterio;
        $sql.=" ORDER BY salida_viaje";

        $result = mysqli_query($conn, $sql) or die("Error al realizar la búsqueda de Viajes Orbitales.");

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                //En cada vuelta del while crea una variable que contiene cada viaje.
                $viaje = Array();
                $viaje['idViaje'] =  $row["id_viaje"];
                $viaje['tipoViaje'] =  $row["nombre_tipo_viaje"];
                $viaje['salidaViaje'] =  $row["salida_viaje"];
                $viaje['duracion'] =  $row["duracion"];
                $viaje['precio'] =  $row["precio"];
                $viaje['idTipoViaje'] =  $row["id_tipo_viaje"];
                $viaje['lugarOrigen'] =  $row["nombre_origen"];
                $viaje['lugarDestino'] =  $row["nombre_destino"];
                $viaje['totalAsientos'] =  $row["cantidad"];
                $viaje['totalGeneral'] =  $row["general"];
                $viaje['totalFamiliar'] =  $row["familiar"];
                $viaje['totalSuit'] =  $row["suit"];
                $viajes[] = $viaje;
            }
        }
    }
 ?>
