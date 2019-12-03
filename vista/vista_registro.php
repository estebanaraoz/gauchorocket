<!-- The Band Section -->
<!-- <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band"> -->
    <br><br>
    <h2 class="">Crear una cuenta</h2>
    <form action="modelo/modelo_validar_registro.php" method="post">
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
<!-- </div> -->
