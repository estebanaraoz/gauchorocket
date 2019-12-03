<?php
    function getLugares(){
        $conexion = getConexion();
        $query = "select * from lugar; ";
        $resultado = mysqli_query($conexion,$query);
        $lugares = Array();

        if (mysqli_num_rows($resultado) > 0) {

            while($row = mysqli_fetch_assoc($resultado)) {

                $lugar['id'] =  $row["id_lugar"];
                $lugar['nombre'] =  $row["nombre_lugar"];
                $lugares[] = $lugar;
            }
        }
        return $lugares;
    }

    function getLugaresOrbitales(){
        $conexion = getConexion();
        $query = "SELECT * FROM lugar WHERE id_lugar <= 2; ";
        $resultado = mysqli_query($conexion,$query);
        $lugares = Array();

        if (mysqli_num_rows($resultado) > 0) {

            while($row = mysqli_fetch_assoc($resultado)) {

                $lugar['id'] =  $row["id_lugar"];
                $lugar['nombre'] =  $row["nombre_lugar"];
                $lugares[] = $lugar;
            }
        }
        return $lugares;
    }
?>
