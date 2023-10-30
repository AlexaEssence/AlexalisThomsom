<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $zona = $_POST['zona'];

    $consulta = "UPDATE embo_cliente SET nombre='$nombre', correo='$correo', zona='$zona' WHERE cedula='$cedula'";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
?>