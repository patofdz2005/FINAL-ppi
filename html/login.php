<?php
session_start();
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';

    $correo = mysqli_real_escape_string($con, $_POST["correo"]);
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT * FROM usuarios WHERE correo='$correo';";
    $resultado = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($resultado);

    if ($row && password_verify($contrasena, $row["contrasena"])) {
        $_SESSION["id_usuario"] = $row["id_usuario"];
        $_SESSION["nombre"] = $row["nombre"];
        mysqli_close($con);
        header("Location: index.php");
        exit();
    } else {
        $mensaje = "Correo o contraseña incorrectos";
    }
    mysqli_close($con);
}

$titulo = 'Login';
include 'cabecera.php';
?>

<div class="caja">
  <h6 class="caja-titulo text-start px-3">Formulario de inicio de sesión</h6>

  <div class="p-3">

    <?php if ($mensaje != "") { ?>
      <div class="alert alert-danger"><?= $mensaje ?></div>
    <?php } ?>

    <form action="login.php" method="post">

      <h5 class="seccion-titulo">Datos de acceso</h5>
      <br>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="correo" class="etiqueta fw-bold">Correo:</label>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo" required>
        </div>
      </div>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="contrasena" class="etiqueta fw-bold">Contraseña:</label>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" required>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-7 offset-md-5">
          <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
      </div>

    </form>
  </div>
</div>

<?php include 'pie.php'; ?>