<?php

// function traerViajeParaReserva(){

  include($_SERVER["DOCUMENT_ROOT"]."/helpers/conexion.php");

  $conn = getConexion();
  $idViaje = $_GET['idViaje'];

  // echo $idViaje;

  $sql = "SELECT v.salida_viaje as salida_viaje,v.llegada_viaje as llegada_viaje,v.duracion,
		  v.precio,v.id_tipo_viaje,l.nombre_lugar as lugar_origen,lu.nombre_lugar as lugar_destino, v.id_viaje
          FROM viaje v INNER JOIN lugar l
          on v.id_lugar_origen = l.id_lugar
          INNER JOIN lugar lu
          on v.id_lugar_destino = lu.id_lugar WHERE v.id_viaje= \"$idViaje\";";

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
function getTipoDeServicio(){
  $conexion = getConexion();
  $query = "select * from servicio;";
  $resultado = mysqli_query($conexion,$query)
   or die("Error al realizar la consulta de búsqueda");
  $servicios = Array();

  if (mysqli_num_rows($resultado) > 0) {

      while($row = mysqli_fetch_assoc($resultado)) {

          $servicio['id'] =  $row["id_servicio"];
          $servicio['tipo'] =  $row["tipo_servicio"];
          $servicios[] = $servicio;
      }
  }
  return $servicios;
}


function getTipoDeCabina(){
  $conexion=getConexion();
  $idViaje = $_GET['idViaje'];
  $consulta="Select c.tipo_cabina as tipo_cabina from viaje inner join viaje_hecho_por v on viaje.id_viaje=v.id_viaje 
		  inner join nave n on v.id_nave=n.id_nave
          inner join nave_tiene_cabina t on n.id_nave=t.id_nave 
          inner join  cabina c on t.id_cabina=c.id_cabina where v.id_viaje= \"$idViaje\";";

  $resultadoCab = mysqli_query($conexion,$consulta)
   or die("Error al realizar la consulta de búsqueda");
  $cabinas = Array();

      if (mysqli_num_rows($resultadoCab) > 0) {

          while($row = mysqli_fetch_assoc($resultadoCab)) {

              $cabina['tipo_cabina'] =  $row["tipo_cabina"];
              $cabinas[] = $cabina;
          }
      }
      return $cabinas;
    }
  



 ?>
