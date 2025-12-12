<?php
session_start();
include('../config.php');
require('fpdf/fpdf.php'); // path to fpdf.php

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'student') {
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];

// Fetch all results
$sql = "SELECT * FROM results WHERE student_id = $id ORDER BY term DESC";
$result = $conn->query($sql);

// Create FPDF object
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

// Title
$pdf->Cell(0,10,'Student Report Card',0,1,'C');
$pdf->Ln(5);

// Table header
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Subject',1);
$pdf->Cell(25,10,'Marks',1);
$pdf->Cell(25,10,'Grade',1);
$pdf->Cell(25,10,'Term',1);
$pdf->Ln();

// Table content
$pdf->SetFont('Arial','',12);

if ($result && $result->num_rows > 0) {
    while ($r = $result->fetch_assoc()) {
        $pdf->Cell(40,10,$r['subject'],1);
        $pdf->Cell(25,10,$r['marks'],1);
        $pdf->Cell(25,10,$r['grade'],1);
        $pdf->Cell(25,10,$r['term'],1);
        
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0,10,'No Results Found',1,1,'C');
}

// Output PDF
$pdf->Output('D', 'ReportCard.pdf');
?>