<?php
    include("config.php");
    $data=json_decode(file_get_contents("data/kategori.json"), true);
//    print_r($data[0]["data"][0]["tingkatan"]);
include("view/dashboard.php");
?>