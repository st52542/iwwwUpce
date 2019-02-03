<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "semestralka");
$doprava = $_GET['doprava'];
$platba = $_GET['platba'];
$poznamka = $_GET['poznamka'];
$uzivMail = $_SESSION['email'];
$sqls = "SELECT * FROM uzivatel where email = '$uzivMail'";
$resUziv = mysqli_query($connect, $sqls);
$rUziv = mysqli_fetch_assoc($resUziv);
$idUziv = $rUziv["iduzivatel"];
$sql = "SELECT * FROM nakoupena_polozka where platnost = 1";
$res = mysqli_query($connect, $sql);
$sqlO = "SELECT MAX(objednavka) FROM nakup limit 1";
$resO = mysqli_query($connect, $sqlO);
$rO = mysqli_fetch_assoc($resO);
$obj = $rO["MAX(objednavka)"]+1;
echo $obj;
while ($r = mysqli_fetch_assoc($res)) {
    $polozka = $r["idnakoupena_polozka"];
    $query = "INSERT INTO `nakup`(`idnakup`, `poznamka`, `stav`, `datum_vytvoreni`, `objednavka`,"
            . " `uzivatel_iduzivatel`, `nakoupena_polozka_idnakoupena_polozka`, `doprava_iddoprava`, `platba_idplatba`) VALUES (DEFAULT,'$poznamka',0,now(),'$obj','$idUziv','$polozka','$doprava','$platba')";
    mysqli_query($connect, $query);
    $sql100 = "UPDATE `nakoupena_polozka` SET `platnost`=0 where idnakoupena_polozka='$polozka'";
    mysqli_query($connect, $sql100);
}
header("location:../sMysql/mojeObjednavky.php");
?>
