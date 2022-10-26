<?php
    include('../db.php');

    $id = $_SESSION['userId'];
    $query = "SELECT * FROM usuario WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $documento = $row['documento'];
        $correo = $row['correo'];
        $fechaRegistro = $row['fechaRegistro'];
    }
?>

<?php include('../includes/header.php'); ?>
<?php include('menu.php'); ?>

<div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
            <?php if(isset($_SESSION['message'])){?>
                    <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show mt-3" role="alert">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php session_unset();}?>
                <div class="card m-3">
                    <div class="card-header text-center">
                        <h3>Editar</h3>
                    </div>
                    <form action="../crud/edit.php?id=<?php echo $id ?>" method="POST" class="p-3">
                        <div class="form-group my-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="form-group my-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $apellido; ?>">
                        </div>
                        <div class="form-group my-3">
                            <label for="documento" class="form-label">Documento:</label>
                            <input type="number" id="documento" name="documento" class="form-control" value="<?php echo $documento; ?>">
                        </div>
                        <div class="form-group my-3">
                            <label for="correo" class="form-label">Correo:</label>
                            <input type="text" id="correo" name="correo" class="form-control" value="<?php echo $correo; ?>">
                        </div>
                        <div class="form-group my-3">
                            <label for="fechaRegistro" class="form-label">Fecha de registro:</label>
                            <input type="date" id="fechaRegistro" name="fechaRegistro" class="form-control" value="<?php echo $fechaRegistro; ?>" disabled>
                        </div>
                        <button type="submit" class="btn btn-success w-100" name="update">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('../includes/footer.php') ?>