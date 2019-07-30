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
$pdf->Cell(190,7,'DAFTAR TURNAMEN',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'Nama',1,0);
$pdf->Cell(85,6,'Lokasi',1,0);
$pdf->Cell(27,6,'Penyelenggara',1,0);
$pdf->Cell(25,6,'Tanggal',1,1);
 
$pdf->SetFont('Arial','',10);
 
include 'koneksi.php';
$mahasiswa = mysqli_query($connect, "select * from tbl_turnamen");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(20,6,$row['nama'],1,0);
    $pdf->Cell(85,6,$row['lokasi'],1,0);
    $pdf->Cell(27,6,$row['penyelenggara'],1,0);
    $pdf->Cell(25,6,$row['tanggal'],1,1); 
}
 
$pdf->Output();
?>