<?php
    include_once('conexion.php');

    require('fpdf/fpdf.php');
    $consulta = "SELECT * FROM embo_cliente";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
    $pdf = new FPDF(); 
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',32);
    $pdf->Cell(50);
    $pdf->Cell(80, 10, 'Clientes', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',18);
    $wcell=array(32,44,65,51);
    $pdf->SetFillColor(240, 131, 225);

    $pdf->Cell($wcell[0],15,utf8_decode("CÉDULA"),1,0,'C',true);
    $pdf->Cell($wcell[1],15,'NOMBRE',1,0,'C',true);
    $pdf->Cell($wcell[2],15,'CORREO',1,0,'C',true);
    $pdf->Cell($wcell[3],15,'ZONA',1,0,'C',true);

    $pdf->SetFont('Arial','',12);
    $pdf->SetFillColor(236, 231, 122);

    while($f=mysqli_fetch_array($rs)) {
        $pdf->Ln();
        $pdf->Cell($wcell[0],15,$f['cedula'],1,0,'C', true);
        $pdf->Cell($wcell[1],15,utf8_decode($f['nombre']),1,0,'C', true);
        $pdf->Cell($wcell[2],15,utf8_decode($f['correo']),1,0,'C', true);
        $pdf->Cell($wcell[3],15,utf8_decode($f['zona']),1,0,'C', true);
        
    }

    $pdf->Output("I", "clientes.pdf");
?>