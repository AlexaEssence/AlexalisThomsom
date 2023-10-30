<?php
    include_once('conexion.php');

    $cantidad = $_POST['cantidad'];
    $cliente = $_POST['cliente'];
    $consulta = "INSERT INTO embo_botellones (cantidad, fecha, hora, cedula) VALUES ('$cantidad', CURDATE(), CURRENT_TIME(), '$cliente')";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
?>