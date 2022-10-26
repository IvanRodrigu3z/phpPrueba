<?php include('../db.php') ?>
<?php include('../includes/header.php') ?>

<?php include('menu.php') ?> 

<div class="row m-0">

    <div class="col-md-8 mx-auto mt-5">
        <table class="table table-striped">
            <thead class="bg-dark text-white">
                <th>Nombres</th>
                <th>Documento</th>
                <th>correo</th>
                <th>Rol</th>
                <th>Fecha de Registro</th>
                <th></th>
            </thead>
            <?php 
                $query = "SELECT usuario.id, usuario.nombre, usuario.apellido, usuario.documento, usuario.correo, rol.nombre, usuario.fechaRegistro FROM usuario INNER JOIN rol ON usuario.idRol = rol.id";
                $result = mysqli_query($conexion, $query);
                while($row = mysqli_fetch_array($result)){ ?>
                <tr>
                    <td><?php echo ($row['nombre'] . " " . $row['apellido']) ?></td>
                    <td><?php echo $row['documento'] ?></td>
                    <td><?php echo $row['correo'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
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
