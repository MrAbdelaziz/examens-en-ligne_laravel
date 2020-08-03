<?php
require_once('includes/fpdf/fpdf.php');
require_once('includes/fpdi/fpdi.php');

$pdf = new FPDI('L', 'pt');

$pdf->SetTopMargin(0);
$pdf->SetLeftMargin(0);
$pdf->SetRightMargin(0);
$pdf->SetAutoPageBreak(0);

$pageCount = $pdf->setSourceFile('certificate.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->addPage('L', [792, 612]);
$pdf->useTemplate($tplIdx);

$pdf->SetFont('Arial', 'B', 36);
$pdf->SetTextColor(37, 62, 100);
$name=strtoupper($name);
$pdf->ln(250);
$pdf->Cell(0,45,"      ".$name,0,0,'L');

$pdf->SetFont('Arial', 'B', 18);
$pdf->SetTextColor(37, 62, 100);
$name=strtoupper($name);
$pdf->ln(187);
$pdf->Cell(0,80,"          " . $date,0,0,'L');

$pdf->Addfont('Times New Roman','','timesbd.php');
if(strlen($examname)>30){
$pdf->SetFont('Times New Roman', '', 15);
$pdf->SetTextColor(255, 255, 255);
$examname=ucfirst($examname);
$pdf->ln(-370);
$pdf->Cell(0,45,"                              ".$examname,0,0,'L');
}else{
$pdf->SetFont('Times New Roman', '', 35);
$pdf->SetTextColor(255, 255, 255);
$examname=ucfirst($examname);
$pdf->ln(-370);
$pdf->Cell(0,45,"             ".$examname,0,0,'L');
}

$pdf->Output('D', 'certificate.pdf');