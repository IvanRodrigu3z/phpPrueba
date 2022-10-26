<?php 
    include('../db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM usuario WHERE id = $id";
        $result = mysqli_query($conexion, $query);
        if(!$result){
            die("error al eliminar");
        }
        $_SESSION['message'] = "Eliminado con exito";
        $_SESSION['color'] = "danger";

        header("Location: ../admin/index.php");
    }

?>