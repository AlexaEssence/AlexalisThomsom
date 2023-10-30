<?php
    include_once('assets/php/usuario.php');
    
    if(!$_SESSION['usuario']){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embotelladora Thomsom</title>
    <link rel="stylesheet" href="assets/styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-danger-subtle bg-gradient" onload="mostrarCliente(); mostrarRegistros(); mostrarClientes(); mostrarModificarClientes();">
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid right">
        <i class="bi bi-droplet fs-3"></i>  
            <a class="navbar-brand fw-bolder" href="index.php">Embotelladora Thomsom</a>
            <button type="button" class="btn btn-danger" onclick="cerrarSesion();" name="cs" id="cs" value="cs">Cerrar sesión</button>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <h1 class="text-center mt-5">Tabla de registros</h1>
            <table class="table table-hover col col-12 col-sm-12">
                <thead>
                    <th>ID</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Cédula</th>
                    <th>Zona</th>
                </thead>
                <tbody id="registros">
                    
                </tbody>
            </table>
            <button type="button" class="btn btn-primary col col-3 col-sm-3 offset-9 offset-sm-9" onclick="generarPDF('generarBotellonPDF.php')">Guardar PDF</button>
            <h1 class="text-center mt-5">Tabla de clientes</h1>
            <table class="table table-hover col col-12 col-sm-12">
                <thead>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Zona</th>
                </thead>
                <tbody id="clientes">
                    
                </tbody>
            </table>
            <button type="button" class="btn btn-primary col col-3 col-sm-3 offset-9 offset-sm-9" onclick="generarPDF('generarClientePDF.php')">Guardar PDF</button>
        </div>
        <div class="row my-5 bg-info-subtle rounded-5 py-5">
            <h1 class="text-center col col-6 col-sm-6">Registros</h1>
            <h1 class="text-center col col-6 col-sm-6">Clientes</h1>
            <form class="col col-4 col-sm-4 offset-1 offset-sm-1">
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad">
                </div>
                <div class="mb-3">
                    <label for="cliente" class="form-label">Selecciona al cliente</label>
                    <select class="form-select" id="cliente" name="cliente">
                        
                    </select>
                </div>
                <button type="button" class="btn btn-success" onclick="guardarRegistro();">Enviar registro</button>
            </form>
            <form class="col col-4 col-sm-4 offset-2 offset-sm-2">
                <div class="mb-3">
                    <label for="cedula" class="form-label">Cédula</label>
                    <input type="number" class="form-control" id="cedula" name="cedula">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="correo">
                </div>
                <div class="mb-3">
                    <label for="zona" class="form-label">Selecciona la zona</label>
                    <select class="form-select" id="zona" name="zona">
                        <option value="Maracaibo">Maracaibo</option>
                        <option value="San Francisco">San Francisco</option>
                        <option value="Cabimas">Cabimas</option>
                        <option value="Machiques">Machiques</option>
                        <option value="Ciudad Ojeda">Ciudad Ojeda</option>
                    </select>
                </div>
                <button type="button" class="btn btn-success" onclick="guardarCliente();">Guardar cliente</button>
            </form>
        </div>
        <div class="row my-5 bg-warning-subtle rounded-5 p-5">
            <h1 class="col col-4 col-sm-4 offset-1 offset-sm-1 mb-3">Borrar cliente</h1>
            <h1 class="col col-4 col-sm-4 offset-2 offset-sm-2 mb-3">Modificar cliente</h1>
            <form class="col col-4 col-sm-4 offset-1 offset-sm-1">
                <div class="mb-3">
                    <label for="borrarCliente" class="form-label">Selecciona el cliente</label>
                    <select class="form-select" id="borrarCliente" name="borrarCliente">

                    </select>
                </div>
                <button type="button" class="btn btn-danger" onclick="borrarClientes();">Borrar cliente</button>
            </form>
            <form class="col col-4 col-sm-4 offset-2 offset-sm-2">
                <div class="mb-3">
                    <label for="modificarCliente" class="form-label">Selecciona el cliente</label>
                    <select class="form-select" id="modificarCliente" name="modificarCliente" onchange="mostrarModificarClientes();">

                    </select>
                    <div class="mb-3">
                        <label for="modificarNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="modificarNombre" name="modificarNombre">
                    </div>
                    <div class="mb-3">
                        <label for="modificarCorreo" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="modificarCorreo" name="modificarCorreo">
                    </div>
                    <div class="mb-3">
                        <label for="modificarZona" class="form-label">Selecciona la zona</label>
                        <select class="form-select" id="modificarZona" name="modificarZona">
                            <option value="Maracaibo">Maracaibo</option>
                            <option value="San Francisco">San Francisco</option>
                            <option value="Cabimas">Cabimas</option>
                            <option value="Machiques">Machiques</option>
                            <option value="Ciudad Ojeda">Ciudad Ojeda</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="modificarClientes();">Modificar cliente</button>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>