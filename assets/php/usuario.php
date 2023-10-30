<?php
    include_once('conexion.php');

    session_start();
    $consulta = "SELECT * FROM embo_usuario";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
    $f = mysqli_fetch_array($rs);

    if(isset($_POST['Sesion']) && $_POST['Sesion'] == 'S'){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        if($usuario == $f[0] && $password = $f[1]){
            if(!isset($_SESSION['usuario'])){
                $_SESSION['usuario'] = [];
            }
            $_SESSION['usuario'] = [$usuario, $password];
            header("Location: index.php");
        }
    }

    if(isset($_POST['cs']) && $_POST['cs'] == 'cs'){
        session_destroy();
    }

?>