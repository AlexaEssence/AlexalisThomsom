<?php
    include_once('conexion.php');

    $consulta = "SELECT embo_botellones.*, embo_cliente.zona FROM embo_botellones INNER JOIN embo_cliente ON embo_botellones.cedula = embo_cliente.cedula";
    $rs = mysqli_query($con, $consulta) or die("Error con la Base de Datos: ".mysqli_error($con));
    $response = array();
    while($f = mysqli_fetch_array($rs)){
        $response[] = array(
            'id' => $f['id'],
            'cantidad' => $f['cantidad'],
            'fecha' => $f['fecha'],
            'hora' => $f['hora'],
            'cedula' => $f['cedula'],
            'zona' => $f['zona']
        );
    }
    $string = json_encode($response);
    echo $string;
?>