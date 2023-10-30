<?php
    include_once('conexion.php');

    $cliente = $_POST['cliente'];
    $consulta = "DELETE FROM embo_botellones WHERE cedula='$cliente'";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
    $consulta = "DELETE FROM embo_cliente WHERE cedula='$cliente'";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
?>