<br>
<h2>Formulario de Acompañantes</h2>
<br><br>
<br><br>
    <h2>Ingrese Acompañantes</h2>
    <form action="modelo/modelo_validar_reserva.php" method="POST">
        <div class="form-group">
            <label for="user">Nombre de usuario</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario" required>
        </div>
        <div class="form-group">
            <label for="pass">email</label>
            <input type="email" class="form-control" id="pass" name="mail" placeholder="Contraseña" required>
        </div>
        <br>
        <input id="login" name="ingresar" type="submit" class="btn btn-primary" value="Ingreso Acompañante">
    </form>