<?php
    include('../db.php');

    $name = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $email = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $rol = $_POST['tipoUser'];
    $fechaRegistro = date("y-m-d");

    $queryVerifyEmail = "SELECT correo FROM usuario";
    $result = mysqli_query($conexion, $queryVerifyEmail);
    $emailList = mysqli_fetch_all($result, MYSQLI_NUM);

    //valida que los campos esten llenos
    if(!empty($name) && !empty($apellido) && !empty($documento) && !empty($email) && !empty($contraseña)){ 
        $existeEmail = false;
        for($i = 0; $i <= count($emailList); $i++){ //valida si esta registrado el correo
            if($emailList[$i][0] == $email){
                $existeEmail = true;
            }
        }
    
        if($existeEmail){ //en caso de que exista el correo
            $_SESSION['message'] = "El correo ingresado ya se encuentra registrado";
            $_SESSION['color'] = "warning";
            header('Location:../registro.php');
        } else{ //en caso que no este registrado, prosigue a registrar
            $query = "CALL registrar_usuario('$name','$apellido','$documento','$email','$contraseña','$rol','$fechaRegistro');";
            $result = mysqli_query($conexion, $query);
    
            if(!$result){
                die('fallo al registrar');
            }
            $_SESSION['message'] = "Guardado correctamente";
            $_SESSION['color'] = "success";
            header("Location: ../ingresar.php");
        }

    }else{
        $_SESSION['message'] = "Todos los campos son obligatorios";
        $_SESSION['color'] = "warning";
        $_SESSION['border'] = "border-danger";
        header('Location:../registro.php');
    }
    



    //print_r($emailList);

    // if(!$existEmail){
    //     $_SESSION['message'] = "El correo ingresado ya se encuentra registrado";
    //     $_SESSION['color'] = "warning";
    //     header('Location:../registro.php');
    // }

?>