<?php
    include('../db.php');

    $name = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $email = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $rol = $_POST['tipoUser'];
    $fechaRegistro = date("y-m-d");
    
    $query = "CALL registrar_usuario('$name','$apellido','$documento','$email','$contraseña','$rol','$fechaRegistro');";
    $result = mysqli_query($conexion, $query);
    if(!$result){
        die('fallo al registrar');
    }

    $_SESSION['message'] = "Guardado correctamente";
    $_SESSION['color'] = "success";
    header("Location: ../ingresar.php")
?>