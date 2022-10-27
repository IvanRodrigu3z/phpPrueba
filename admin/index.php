<?php include('../db.php') ?>

<?php include('../includes/header.php') ?>
<?php include('menu.php') ?> 

<div class="container">
    <div class="row m-0 ">
        <!-- MAS INFORMACION -->
        <div class="col-2 mt-5">
            <div class="row justify-content-between">
                <?php 
                    $query = "SELECT count(*) FROM usuariosoctubre";
                    $octubre = mysqli_query($conexion, $query);
                    $usuariosOctubre = mysqli_fetch_array($octubre); 

                    $query2 = "SELECT * FROM cantidadusuariosstandar";
                    $estandar = mysqli_query($conexion, $query2);
                    $usuariosStandar = mysqli_fetch_array($estandar); 

                    $query3 = "SELECT count(*) FROM usuario";
                    $total = mysqli_query($conexion, $query3);
                    $totalUsers = mysqli_fetch_array($total); 
                ?>
                <div class="col-offset-3 mb-4">
                    <div class="card text-left text-white bg-success shadow">
                        <div class="card-body">
                            <span class="card-title small m-0">Cantidad de usuario este mes: </span>
                            <span class="card-text text-center "> <?php echo $usuariosOctubre['count(*)'] ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col-offset-3 mb-4">
                    <div class="card text-left text-white bg-primary shadow">
                        <div class="card-body">
                            <span class="card-title small m-0">Cantidad de usuario estandar: </span>
                            <span class="card-text text-center "> <?php echo $usuariosStandar['count(*)'] ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col-offset-3 mb-4">
                    <div class="card text-left text-white bg-info shadow">
                        <div class="card-body">
                            <span class="card-title small m-0">Total usuarios registrados: </span>
                            <span class="card-text text-center "> <?php echo $totalUsers['count(*)'] ?> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LISTADO DE USUARIOS REGISTRADOS -->
        <div class="col-md-10 mx-auto mt-5">
            <?php if(isset($_SESSION['message'])){?>
                <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show p-2 small" role="alert">
                    <?= $_SESSION['message']; ?>
                    <button type="button" class="btn-close pt-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['color']);
            }?>
            <table class="table table-striped shadow">
                <thead class="bg-dark text-white">
                    <th>Nombres</th>
                    <th>Documento</th>
                    <th>correo</th>
                    <th>Rol</th>
                    <th>Fecha de Registro</th>
                    <th></th>
                </thead>
                <?php 
                    $query = "SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.documento, usuario.correo, rol.nombreRol, usuario.fechaRegistro FROM usuario INNER JOIN rol ON usuario.idRol = rol.id";
                    $result = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_array($result)){ ?>
                    <tr>
                        <td><?php echo ($row['nombre'] . " " . $row['apellido']) ?></td>
                        <td><?php echo $row['documento'] ?></td>
                        <td><?php echo $row['correo'] ?></td>
                        <td><?php echo $row['nombreRol'] ?></td>
                        <td><?php echo $row['fechaRegistro'] ?></td>
                        <td>
                            <a href="../crud/edit.php?id=<?php echo $row['id']?>" class="mx-2"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="../crud/delete.php?id=<?php echo $row['id']?>" class="text-danger mx-2"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </div>
    </div>
</div>

<?php include('../includes/footer.php') ?>
