<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "semestralka");
$kom=$_GET['koment'];
$id = $_GET['produkt'];
$uzivMail = $_SESSION['email'];
$sqls = "SELECT * FROM uzivatel where email = '$uzivMail'";
$resUziv = mysqli_query($connect, $sqls);
$rUziv = mysqli_fetch_assoc($resUziv);
$idUziv = $rUziv["iduzivatel"];
echo $kom;
echo $id;
echo $idUziv;
$sK = "INSERT INTO `komentar`(`idkomentar`, `text`, `uzivatel_iduzivatel`, `produkt_idprodukt`, `vyrobce_idvyrobce`) VALUES (DEFAULT,'$kom','$idUziv','$id',NULL)";
mysqli_query($connect, $sK);
header("location:../index.php");
?>

