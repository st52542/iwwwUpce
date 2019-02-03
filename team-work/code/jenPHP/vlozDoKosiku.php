<?php

$connect = mysqli_connect("localhost", "root", "", "semestralka");
session_start();
$pr = $_GET['id'];
$query = "INSERT INTO nakoupena_polozka (idnakoupena_polozka,mnozstvi,produkt_idprodukt) VALUES(DEFAULT,1, '$pr')";
mysqli_query($connect, $query);
header('location: ../sMysql/shop.php');
?>
