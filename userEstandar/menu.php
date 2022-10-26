<?php 
    $id = $_SESSION['userId'];
    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_array($result);
    $usuario = $row['nombre'];

?>

<nav class="navbar navbar-expand-lg bg-info p-4">
  <div class="container">
    <a class="navbar-brand text-white" href="#"><i class="fa-solid fa-house"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
          <li class="nav-item">
            <p class="text-white text-justify-center m-0">Bienbenido <?php echo $usuario; ?></p>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white px-4" href="../salir.php">Salir <i class="fa-sharp fa-solid fa-arrow-right-from-bracket"></i></a>
          </li>
      </ul>
    </div>
  </div>
</nav>