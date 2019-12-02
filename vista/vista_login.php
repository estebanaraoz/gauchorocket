<br><br>
<h2>Iniciar sesión</h2>
<form action="validar_login" method="POST">
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
