<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prueba php</title>
  </head>
  <body>
    <!-- Números del 1 al 100 uno abajo del otro -->
    <?php
      for ($i=1; $i <= 100; $i++) {
        echo "$i<br>";
      }
      
      echo "<br><br><br>con while<br><br><br>";
      $i = 1;
      while ($i <= 100) {
        echo "$i<br>";
        $i++;
      }
    ?>
  </body>
</html>
