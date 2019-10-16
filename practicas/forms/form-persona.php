<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="procesa-persona.php" method="post">
      Nombre y apellido: <input type="text" name="nombre" value=""> <br>
      Edad: <input type="number" name="edad" value=""> <br>
      Fecha de nacimiento: <input type="date" name="fechanac" value=""> <br>
      Sexo: <select class="" name="sexo">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="Indefinido">Indefinido</option>
      </select> <br>
      Ocupacion: <input type="text" name="ocupacion" value=""> <br>
      <button type="submit" name="button">Enviar</button>
    </form>
  </body>
</html>
