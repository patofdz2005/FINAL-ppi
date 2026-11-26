<?php
$con = mysqli_connect("db", "usuario", "123456", "tienda_peces");

if (mysqli_connect_errno()) {
    die("Falló la conexión con MySQL: " . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8mb4");
?>