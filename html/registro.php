<?php
$mensaje = "";
$exito = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'conexion.php';

    $nombre = mysqli_real_escape_string($con, $_POST["nombre"]);
    $correo = mysqli_real_escape_string($con, $_POST["correo"]);
    $contrasena = $_POST["contrasena"];
    $confirmar = $_POST["confirmar"];
    $fecha = mysqli_real_escape_string($con, $_POST["fecha_nacimiento"]);
    $tarjeta = mysqli_real_escape_string($con, $_POST["numero_tarjeta"]);
    $direccion = mysqli_real_escape_string($con, $_POST["direccion_postal"]);

    if ($contrasena != $confirmar) {
        $mensaje = "Las contraseñas no coinciden";
    } else {
        // revisar que el correo no exista ya
        $sql = "SELECT id_usuario FROM usuarios WHERE correo='$correo';";
        $resultado = mysqli_query($con, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $mensaje = "Ese correo ya está registrado";
        } else {
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (nombre, correo, contrasena, fecha_nacimiento, numero_tarjeta, direccion_postal)
                    VALUES ('$nombre', '$correo', '$hash', '$fecha', '$tarjeta', '$direccion');";

            if (mysqli_query($con, $sql)) {
                $exito = true;
            } else {
                $mensaje = "Error al registrar: " . mysqli_error($con);
            }
        }
    }
    mysqli_close($con);
}

$titulo = 'Registro';
include 'cabecera.php';
?>

<div class="caja">
  <h6 class="caja-titulo text-start px-3">Formulario de registro</h6>

  <div class="p-3">

    <?php if ($exito) { ?>
      <div class="alert alert-success">
        ¡Cuenta creada! Ya puedes <a href="login.php">iniciar sesión</a>.
      </div>
    <?php } elseif ($mensaje != "") { ?>
      <div class="alert alert-danger"><?= $mensaje ?></div>
    <?php } ?>

    <form action="registro.php" method="post">

      <!-- SECCIÓN 1 -->
      <h5 class="seccion-titulo">Información necesaria</h5>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="nombre" class="etiqueta fw-bold">Nombre de usuario:</label>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="text" class="form-control" id="nombre" name="nombre" required>
          <span title="Es tu nombre acuatico (¿o vaquero?)">❓</span>
        </div>
      </div>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="correo" class="etiqueta fw-bold">Correo electrónico:</label>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
      </div>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="contrasena" class="etiqueta fw-bold">Elige tu contraseña:</label>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="password" class="form-control" id="contrasena" name="contrasena" required>
          <span title="Si pones algo debil como 'password' voy a borrar tu cuenta">⚠️</span>
        </div>
      </div>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="confirmar" class="etiqueta fw-bold">Verifica tu contraseña:</label>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="password" class="form-control" id="confirmar" name="confirmar" required>
          <span title="Escríbela otra vez a ver si tan seguro">⚠️</span>
        </div>
      </div>

      <!-- SECCIÓN 2 -->
      <h5 class="seccion-titulo mt-4">Sobre ti</h5>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="fecha_nacimiento" class="etiqueta fw-bold">Fecha de nacimiento:</label>
          <div class="small">Para saber si legalmente ya puedes comprar peces</div>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>
      </div>

      <!-- SECCIÓN 3 -->
      <h5 class="seccion-titulo mt-4">Envío y pago</h5>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="direccion_postal" class="etiqueta fw-bold">Dirección postal:</label>
          <div class="small">A dónde mandamos los mendigos peces</div>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="text" class="form-control" id="direccion_postal" name="direccion_postal" required>
        </div>
      </div>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="numero_tarjeta" class="etiqueta fw-bold">Número de tarjeta:</label>
          <div class="small">Mmmm si dinero que rico damelo ahora</div>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" maxlength="19" required>
          <span title="Porfavor no pongas tu tarjeta real te lo pido por el amor de dios">⚠️</span>
        </div>
      </div>

      <!-- SECCIÓN 4 -->
      <h5 class="seccion-titulo mt-4">Verificación</h5>

      <div class="row fila-form align-items-start mb-3">
        <div class="col-12 col-md-5">
          <label for="terminos" class="etiqueta fw-bold">Acepto los términos:</label>
          <div class="small">Aceptas que vendamos todos tus datos al gobierno de Yemen</div>
        </div>
        <div class="col-12 col-md-7 d-flex align-items-center gap-2">
          <input type="checkbox" class="form-check-input" id="terminos" required>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-7 offset-md-5">
          <button type="submit" class="btn btn-primary">Crear cuenta</button>
        </div>
      </div>

    </form>
  </div>
</div>

<?php include 'pie.php'; ?>