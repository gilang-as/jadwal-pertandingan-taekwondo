<?php
include("config.php");  
$kategori=json_decode(file_get_contents("data/kategori.json"), true);
$sabuk=json_decode(file_get_contents("data/sabuk.json"), true);
//Halaman Turnamen
if($_GET["halaman"]=="turnamen"){
    //Detail Turnamen
    if(isset($_GET["id"])){
        include("view/turnamen-detail.php");
    //Daftar Turnamen
    }else{
        include("view/turnamen.php");
    }
}elseif($_GET["halaman"]=="pertandingan" && isset($_GET["id"])){
    include("view/pertandingan.php");
}elseif($_GET["halaman"]=="keluar"){
    session_destroy();
    header("Location:".$domain); 
//Halaman Pertama
}else{
    include("view/homepage.php");
}
?>