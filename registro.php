<?php include('db.php') ?>
<?php include('includes/header.php') ?>
<?php include('includes/menu.php') ?>


<div class="row m-0">
    <div class="col-md-7 mx-auto">
        <div class="card m-5 shadow">
            <div class="card-header">
                <h3 class="text-center">Registro de usuario</h3>
            </div>
            <div class="card-body p-5">
                <?php if(isset($_SESSION['message'])){?>
                    <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible  p-2 small fade show" role="alert">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php 
                    unset($_SESSION['message']);
                    unset($_SESSION['color']);
                } ?>
                <form action="crud/save.php" method="POST">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre: </label>
                                <input type="text" class="form-control mb-3 <?php   ?> " name="nombre" placeholder="Ingrese su nombre" id="nombre" autofocus>
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
                            <div class="form-group">
                                <label for="tipoUser" class="form-label">Tipo usuario:</label>
                                    <select class="form-select" id="tipoUser" name="tipoUser">
                                        <option value="2">Estandar</option>
                                        <option value="1">Administrador</option>
                                    </select>
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
                                <label for="contrase??a" class="form-label">Contrase??a: </label>
                                <input type="password" class="form-control mb-3" name="contrase??a" id="contrase??a" placeholder="Ingrese documento" id="nombre" autofocus>
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