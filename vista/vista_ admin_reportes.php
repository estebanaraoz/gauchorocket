



<p><h2>Bienvenido administrador</h2></p>

<form class="" action="controlador_admin_reportes.php" method="post" name="Creportes"  > 

            <h3>Reportes</h3>
	<br>
		<label>Elegir mes y año</label> <input type="month"  name="mes" required><br>
		<label><input type="checkbox" name="ocupación" value="tasadeocupacion($conn,$fecha)"> Tasa de ocupación por viaje y equipo  </label><br>
		<label><input type="checkbox" name="fmensual"  value="facturacionmensual($conn,$fecha)"> Facturación Mensual</label><br>
		<label><input type="checkbox" name="masvendida" value="cabinamasvendida($conn,$fecha)"> Cabina más vendida</label><br>
		<label><input type="checkbox" name="fporcliente" value="facturacianporcliente($conn,$fecha)">Facturación por Cliente</label><br><br>        
  <input id="mostrar" name="mostrar" type="submit" class="btn btn-primary" value="Crear">
</form>

