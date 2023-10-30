<?php
    include_once('conexion.php');

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $zona = $_POST['zona'];

    $consulta = "INSERT INTO embo_cliente (cedula, nombre, correo, zona) VALUES ('$cedula', '$nombre', '$correo', '$zona')";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
?>