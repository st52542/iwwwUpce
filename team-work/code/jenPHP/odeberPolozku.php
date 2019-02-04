<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "semestralka");
$id = $_GET['data'];
echo $id;
$sql = "DELETE FROM `nakoupena_polozka` WHERE idnakoupena_polozka = $id ";
if (mysqli_query($connect, $sql)) {
    echo "successful";
    header('location: ../sMysql/vyberDopravyAPotvrzeni.php');
} else {
    echo "fail";
}
?>
