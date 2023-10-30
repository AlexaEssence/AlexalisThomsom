<?php
    include_once('conexion.php');

    $consulta = "SELECT * FROM embo_cliente";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
    $response = array();
    while($f = mysqli_fetch_array($rs)){
        $response[] = array(
            'cedula' => $f['cedula'],
            'nombre' => $f['nombre'],
            'correo' => $f['correo'],
            'zona' => $f['zona']
        );
    }
    $string = json_encode($response);
    echo $string;
?>