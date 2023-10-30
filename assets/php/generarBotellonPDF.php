<?php
    include_once('conexion.php');

    require('fpdf/fpdf.php');
    $consulta = "SELECT embo_botellones.*, embo_cliente.zona FROM embo_botellones INNER JOIN embo_cliente ON embo_botellones.cedula = embo_cliente.cedula";
    $rs = mysqli_query($con, $consulta) or die("Error con la base de datos: ".mysqli_error($con));
    $pdf = new FPDF(); 
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',32);
    $pdf->Cell(80);
    $pdf->Cell(30, 10, 'Registros', 0, 0, 'C');
    $pdf->Ln(20);
    $pdf->SetFont('Arial','B',18);
    $wcell=array(22,35,30,30,32,42);
    $pdf->SetFillColor(240, 131, 225);

    $pdf->Cell($wcell[0],10,"ID",1,0,'C',true);
    $pdf->Cell($wcell[1],10,'CANTIDAD',1,0,'C',true);
    $pdf->Cell($wcell[2],10,'FECHA',1,0,'C',true);
    $pdf->Cell($wcell[3],10,'HORA',1,0,'C',true);
    $pdf->Cell($wcell[4],10,'CLIENTE',1,0,'C',true);
    $pdf->Cell($wcell[5],10,'ZONA',1,0,'C',true);

    $pdf->SetFont('Arial','',12);
    $pdf->SetFillColor(236, 231, 122);

    while($row=mysqli_fetch_array($rs)) {
        $pdf->Ln();
        $pdf->Cell($wcell[0],10,$row[0],1,0,'C', true);
        $pdf->Cell($wcell[1],10,$row[1],1,0,'C', true);
        $pdf->Cell($wcell[2],10,$row[2],1,0,'C', true);
        $pdf->Cell($wcell[3],10,$row[3],1,0,'C', true);
        $pdf->Cell($wcell[4],10,utf8_decode($row[4]),1,0,'C', true);
        $pdf->Cell($wcell[5],10,utf8_decode($row[5]),1,0,'C', true);
    }

    $pdf->Output("I", "clientes.pdf");
?>