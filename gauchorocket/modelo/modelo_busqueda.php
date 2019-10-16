<?php
include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");
    //Realiza conexion con la base de datos.
    $conn = getConexion();

    if(isset($_POST['buscar'])){
        $lugar = $_POST['lugar'];

        // Consulta
        $sql = "SELECT * FROM viaje WHERE id_lugar = '$lugar'";

        $result = mysqli_query($conn, $sql)
                  or die("Error al realizar la consulta de búsqueda");

        //Mensajes de respuesta.
        if (mysqli_num_rows($result) > 0) {

          while($row = mysqli_fetch_assoc($result)) {
              //En cada vuelta del while crea una variable que contiene cada viaje.
              $viaje = Array();
              $viaje['idViaje'] =  $row["id_viaje"];
              $viaje['salidaViaje'] =  $row["salida_viaje"];
              $viaje['llegadaViaje'] =  $row["llegada_viaje"];
              $viaje['duracion'] =  $row["duracion"];
              $viaje['precio'] =  $row["precio"];
              $viaje['idTipoViaje'] =  $row["id_tipo_viaje"];
              $viaje['idLugar'] =  $row["id_lugar"];
              $viajes[] = $viaje;
          }
          include($_SERVER["DOCUMENT_ROOT"]."/controlador/controlador_viajes.php");

        }else{
          echo "No hay resultados para la búsqueda";
        }
      }

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




 ?>
