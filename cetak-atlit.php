<?php
// memanggil library FPDF
require('config.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'SISTEM INFORMASI REKAPITULASI PERTANDINGAN',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR ATLIT',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'Nama',1,0);
$pdf->Cell(85,6,'Jenis Kelamin',1,0);
$pdf->Cell(27,6,'Dojang',1,0);
$pdf->Cell(25,6,'Berat Badan',1,1);
 
$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$mahasiswa = mysqli_query($connect, "select * from tbl_atlit");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(20,6,$row['nama'],1,0);
    $pdf->Cell(85,6,$row['jekel'],1,0);
    $pdf->Cell(27,6,$row['dojang'],1,0);
    $pdf->Cell(25,6,$row['bb'],1,1); 
}
 
$pdf->Output();
?>