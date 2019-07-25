<?php
include("config.php");
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
//Halaman Pertama
}else{
    include("view/homepage.php");
}
?>