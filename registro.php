<?php include('includes/header.php') ?>
<?php include('includes/menu.php') ?>


<div class="row m-0">
    <div class="col-md-7 mx-auto">
        <div class="card m-5 shadow">
            <div class="card-header">
                <h3 class="text-center">Registro de usuario</h3>
            </div>
            <div class="card-body p-5">
                <form action="crud/save.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre: </label>
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Ingrese su nombre" id="nombre" autofocus>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="apellido" class="form-label">Apellido: </label>
                                <input type="text" class="form-control mb-3" name="apellido" id="apellido" placeholder="Ingrese su apellido">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="documento" class="form-label">Documento: </label>
                                <input type="number" class="form-control mb-3" name="documento" id="documento" placeholder="Ingrese documento" id="nombre" autofocus>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mt-3">
                                <div class="form-floating">
                                    <select class="form-select" id="tipoUser" name="tipoUser">
                                        <option value="1">Administrador</option>
                                        <option value="2">estandar</option>
                                    </select>
                                    <label for="tipoUser">Tipo usuario:</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="correo" class="form-label">Correo: </label>
                                <input type="email" class="form-control mb-3" name="correo" id="correo" placeholder="Ingrese su apellido">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="contraseña" class="form-label">Contraseña: </label>
                                <input type="password" class="form-control mb-3" name="contraseña" id="contraseña" placeholder="Ingrese documento" id="nombre" autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-6">
                            <button type="submit" class="btn btn-success w-100" name="registrar">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>