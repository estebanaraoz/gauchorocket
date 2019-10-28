<?php

// function traerViajeParaReserva(){

  include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");

  $conn = getConexion();
  $idViaje = $_GET['idViaje'];

  // echo $idViaje;

  $sql = "SELECT v.salida_viaje as salida_viaje,v.llegada_viaje as llegada_viaje,v.duracion,v.precio,v.id_tipo_viaje,l.nombre_lugar as lugar_origen,lu.nombre_lugar as lugar_destino, v.id_viaje
          FROM viaje v INNER JOIN lugar l
          on v.id_lugar_origen = l.id_lugar
          INNER JOIN lugar lu
          on v.id_lugar_destino = lu.id_lugar WHERE v.id_viaje= \"$idViaje\"";

          // echo $sql;
          $result = mysqli_query($conn, $sql)
                    or die("Error al realizar la consulta de búsqueda");

                    if (mysqli_num_rows($result) > 0) {

                      while($row = mysqli_fetch_assoc($result)) {
                          //En cada vuelta del while crea una variable que contiene cada viaje.
                          $viaje = Array();
                          // $viaje['idViaje'] =  $row["id_viaje"];
                          $viaje['salidaViaje'] =  $row["salida_viaje"];
                          $viaje['llegadaViaje'] =  $row["llegada_viaje"];
                          $viaje['duracion'] =  $row["duracion"];
                          $viaje['precio'] =  $row["precio"];
                          $viaje['idTipoViaje'] =  $row["id_tipo_viaje"];
                          $viaje['lugarOrigen'] =  $row["lugar_origen"];
                          $viaje['lugarDestino'] = $row["lugar_destino"];
                          $viaje['idViaje'] = $row["id_viaje"];
                          $viajes[] = $viaje;
                      }
                    }

// }


 ?>
