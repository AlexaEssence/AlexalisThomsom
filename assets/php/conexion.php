<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $password = '';
    $bdd = 'beenati';

    $con = new mysqli($servidor, $usuario, $password, $bdd);

    if($con->connect_error){
        die('Error conectando a la base de datos: '.$con->connect_error);
    }
?>