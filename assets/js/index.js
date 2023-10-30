function cerrarSesion(){
    let cs = document.getElementById("cs").value
    $.ajax({
        url: 'assets/php/usuario.php',
        type: 'POST',
        data: {cs}
    })
    location.reload()
}

function guardarCliente(){
    let cedula = document.getElementById("cedula").value
    let nombre = document.getElementById("nombre").value
    let correo = document.getElementById("correo").value
    let zona = document.getElementById("zona").value

    if(!cedula || !nombre || !correo || !zona){
        alert("Todos los campos deben ser llenados.")
        return
    }

    if(cedula.length < 7 || cedula.length > 8){
        alert("La cédula debe estar entre 7 y 8 caracteres.")
        return
    }

    $.ajax({
        url: 'assets/php/insertarCliente.php',
        type: 'POST',
        data: {cedula, nombre, correo, zona},
        success: function(){
            mostrarCliente()
            mostrarClientes()
            mostrarModificarClientes()
        }
    })
}

function guardarRegistro(){
    let cantidad = document.getElementById("cantidad").value
    let cliente = document.getElementById("cliente").value

    if(!cliente || !cantidad){
        alert("Todos los campos deben ser llenados.")
        return
    }
    if(cantidad<1 || cantidad>999){
        alert("La cantidad debe ser entre 1 a 999.")
        return
    }

    $.ajax({
        url: 'assets/php/insertarBotellon.php',
        type: 'POST',
        data: {cantidad, cliente},
        success: function(){
            mostrarRegistros()
        }
    })
}

function mostrarCliente(){
    $.ajax({
        url: 'assets/php/buscarCliente.php',
        type: 'GET',
        success: function(response){
            let cl = JSON.parse(response)
            let html = ""
            cl.forEach(c => {
                html+=`<option value="${c.cedula}"> ${c.nombre} (${c.cedula}) </option>`
            })
            $("#cliente").html(html)
            $("#borrarCliente").html(html)
            $("#modificarCliente").html(html)
        }
    })
}

function mostrarRegistros(){
    $.ajax({
        url: 'assets/php/buscarBotellon.php',
        type: 'GET',
        success: function(response){
            let res = JSON.parse(response)
            let html = ""
            if(res.length === 0){
                $("#registros").html(html)
                return
            }
            res.forEach(r => {
                html+=`
                    <tr>
                        <td>${r.id}</td>
                        <td>${r.cantidad}</td>
                        <td>${r.fecha}</td>
                        <td>${r.hora}</td>
                        <td>${r.cedula}</td>
                        <td>${r.zona}</td>
                    </tr>
                `
                $("#registros").html(html)
            })
        }
    })
}

function mostrarClientes(){
    $.ajax({
        url: 'assets/php/buscarCliente.php',
        type: 'GET',
        success: function(response){
            let cl = JSON.parse(response)
            let html = ""
            if(cl.length === 0){
                return
            }
            cl.forEach(c => {
                html+=`
                    <tr>
                        <td>${c.cedula}</td>
                        <td>${c.nombre}</td>
                        <td>${c.correo}</td>
                        <td>${c.zona}</td>
                    </tr>
                `
                $("#clientes").html(html)
            })
        }
    })
}

function borrarClientes(){
    let cliente = document.getElementById("borrarCliente").value
    $.ajax({
        url: 'assets/php/borrarCliente.php',
        type: 'POST',
        data: {cliente},
        success: function(){
            mostrarCliente()
            mostrarClientes()
            mostrarRegistros()
            mostrarModificarClientes()
        }
    })
}

function modificarClientes(){
    let cedula = document.getElementById("modificarCliente").value
    let nombre = document.getElementById("modificarNombre").value
    let correo = document.getElementById("modificarCorreo").value
    let zona = document.getElementById("modificarZona").value

    if(!cedula || !nombre || !correo || !zona){
        alert("Todos los campos deben ser llenados.")
        return
    }

    $.ajax({
        url: 'assets/php/modificarCliente.php',
        type: 'POST',
        data: {cedula, nombre, correo, zona},
        success: function(){
            mostrarCliente()
            mostrarClientes()
            mostrarRegistros()
            mostrarModificarClientes()
        }
    })
}

function mostrarModificarClientes(){
    $.ajax({
        url: 'assets/php/buscarCliente.php',
        type: 'GET',
        success: function(response){
            let cls = JSON.parse(response)
            let cl = document.getElementById("modificarCliente").value
            cls.forEach(c => {
                if(c.cedula == cl){
                    $("#modificarNombre").val(c.nombre)
                    $("#modificarCorreo").val(c.correo)
                    $("#modificarZona").val(c.zona)
                }
            })
        }
    })
    if(document.readyState !== 'complete'){
        mostrarCliente()
        mostrarClientes()
        mostrarRegistros()
    }
}

function generarPDF(a){
    $.ajax({
        url: 'assets/php/'+a,
        type: 'GET',
        success: function(){
            window.open('assets/php/'+a)
        }
    })
}