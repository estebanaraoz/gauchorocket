<?php
    $conn = getConexion();
    $idViaje = $_GET['idViaje'];

    $sql = "
        SELECT via.id_viaje, via.salida_viaje, via.duracion, via.precio, via.id_tipo_viaje, lug.nombre_lugar,  (vncG.asientos_disponibles + vncF.asientos_disponibles + vncS.asientos_disponibles) cantidad, vncG.asientos_disponibles general, vncF.asientos_disponibles familiar, vncS.asientos_disponibles suit
        FROM viaje as via 
        INNER JOIN lugar as lug ON via.id_lugar_origen = lug.id_lugar
        INNER JOIN viaje_nave_cabina as vncG ON vncG.id_viaje = via.id_viaje AND vncG.id_cabina = 1 
        INNER JOIN viaje_nave_cabina as vncF ON vncF.id_viaje = via.id_viaje AND vncF.id_cabina = 2 
        INNER JOIN viaje_nave_cabina as vncS ON vncS.id_viaje = via.id_viaje AND vncS.id_cabina = 3
        WHERE via.id_viaje= \"$idViaje\"
    ";

    $result = mysqli_query($conn, $sql) or die("Error al realizar la consulta de búsqueda");

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            //En cada vuelta del while crea una variable que contiene cada viaje.
            $viaje = Array();
            $viaje['idViaje'] = $row["id_viaje"];
            $viaje['salidaViaje'] =  $row["salida_viaje"];
            $viaje['duracion'] =  $row["duracion"];
            $viaje['precio'] =  $row["precio"];
            $viaje['idTipoViaje'] =  $row["id_tipo_viaje"];
            $viaje['lugarOrigen'] =  $row["nombre_lugar"];
            $viaje['totalAsientos'] =  $row["cantidad"];
            $viaje['totalGeneral'] =  $row["general"];
            $viaje['totalFamiliar'] =  $row["familiar"];
            $viaje['totalSuit'] =  $row["suit"];
            $viajes[] = $viaje;
        }
    }


    function calcularFechaVencimiento($idViaje){
        $conn = getConexion();
        $sql="select (salida_viaje - interval 2 day) as fecha from viaje where id_viaje=$idViaje;";
        $fecha = "";

        $resultado = mysqli_query($conn,$sql);

        foreach($resultado as $row){
           $fecha = $row["fecha"]; //work properly, cause it implements Iterator
        }
        return $fecha;
    }

 ?>
