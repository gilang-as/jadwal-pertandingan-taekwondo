<?php
error_reporting(0);
session_start();
include("function.php");
include("library/fpdf181/fpdf.php");
$domain="http://project/japerta/";
$hostname="localhost";
$username="root";
$password="";
$database="taekwondo";
$connect = new mysqli($hostname, $username, $password, $database);
if (!$connect) {
    die ("connection failed: " . mysqli_connect_error());
} else {
    $connect->set_charset('utf8');
}
?>