<?php
include 'header.php';
?>
<br>
<h1>Iniciar sesión</h1>
<br>
<form action="validarLogin.php" method="post">
  <div class="form-group">
    <label for="user">Nombre de usuario</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario" required>
  </div>
  <div class="form-group">
    <label for="pass">Contraseña</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
  </div>
  <br>
  <input id="login" name="login" type="submit" class="btn btn-primary" value="Iniciar Sesión">
</form>

<?php
include 'footer.php';
?>
