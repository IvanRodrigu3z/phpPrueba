<?php
    include('../db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM usuario WHERE id = $id";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $documento = $row['documento'];
            $correo = $row['correo'];
            $fechaRegistro = $row['fechaRegistro'];
        }
    }

    if(isset($_POST['update'])){
        if($_SESSION['rol'] == "Administrador"){
            $id = $_SESSION['userId'];
        }else{
            $id = $_GET['id'];
        }

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $documento = $_POST['documento'];
        $correo = $_POST['correo'];
        $rol = $_SESSION['rol'];

        $query = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', documento = '$documento', correo = '$correo' WHERE id = $id";
        $result = mysqli_query($conexion, $query);

        $_SESSION['message'] = "Usuario actualizado con exito";
        $_SESSION['color'] = "info";

        if($rol == 1){
            header('Location: ../admin/index.php');
        }

        if($rol == 2){
            header('Location: ../userEstandar/index.php');
        }

    }
?>

<?php include('../includes/header.php'); ?>

<?php 
    if($_SESSION['rol'] == 1){
        include('../admin/menu.php');
    }
   
?>

    
    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card m-3">
                    <div class="card-header text-center">
                        <h3>Editar</h3>
                    </div>
                    <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST" class="p-3">
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
    
    