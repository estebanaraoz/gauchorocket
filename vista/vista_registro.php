<br><br>
<h2 class="">Crear una cuenta</h2>
<form action="validar_registro" method="POST">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
    <div class="row">
        <div class="col">
            <label for="user">Nombre de usuario</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario" required>
        </div>
        <div class="col">
            <label for="pass">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
        </div>
    </div>
    <br>
    <input id="registrarse" name="registrarse" type="submit" class="btn btn-primary" value="Registrarse">
</form>
