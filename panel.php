<?php
    include("config.php");
    $kategori=json_decode(file_get_contents("data/kategori.json"), true);
    $sabuk=json_decode(file_get_contents("data/sabuk.json"), true);
//    print_r($data[0]["data"][0]["tingkatan"]);
include("view/dashboard.php");
?>