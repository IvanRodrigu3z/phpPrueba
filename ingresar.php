<?php
    include('db.php');

    if(isset($_POST['login'])){
        if(!empty($_POST['correo']) && !empty($_POST['contraseña'])){
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
    
            $query =  "SELECT id, correo, contraseña, idRol FROM usuario WHERE correo = '$correo'";
            $result = mysqli_query($conexion,$query);
    
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result);
                
                if($correo == $row['correo'] && password_verify($contraseña, $row['contraseña'])){
                    $rol = $row['idRol'];
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['rol'] = $rol;
    
                    if($rol == 1){
                        header('Location: admin/index.php');
                    } 
                    if($rol  == 2){
                        header('Location: userEstandar/index.php');
                    }
                }else{
                    $_SESSION['message'] = "Correo o contraseña incorrectos";
                    $_SESSION['color'] = "info";
                    header("Location: ingresar.php");
                    echo('noson correctos');
                }
            }
        } else{
            $_SESSION['message'] = "Correo y contraseña requeridos";
            $_SESSION['color'] = "info";
            header("Location: ingresar.php");
        }
    }


?>


<?php include('includes/header.php') ?>
<?php include('includes/menu.php') ?>

<div class="row m-0">
    <div class="col-4 m-auto">
        <div class="card mt-5 shadow">
            <div class="card-header">
                <h3 class="text-center">Inicio de sesión</h3>
            </div>
            <div class="card-body p-4">
                <?php if(isset($_SESSION['message'])){?>
                    <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php 
                    unset($_SESSION['message']);
                    unset($_SESSION['color']);
                } ?>
                <form action="ingresar.php" method="POST">
                    <div class="form-group">
                        <label for="correo" class="form-label">Correo: </label>
                        <input type="text" class="form-control mb-3" name="correo" placeholder="Ingrese su correo" id="correo" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="contraseña" class="form-label">Contraseña: </label>
                        <input type="password" class="form-control mb-3" name="contraseña" placeholder="Ingrese su contraseña" id="correo" autofocus>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-8">
                            <button type="submit" class="btn btn-success w-100" name="login">Ingresar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>