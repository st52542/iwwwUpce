<?php

$var_value = $_GET['data'];
$connect = mysqli_connect("localhost", "root", "", "semestralka");
$id = $_GET['data'];
$sql = "UPDATE nakup SET stav = 0 WHERE idnakup=$id";
if (mysqli_query($connect, $sql)) {
    echo "successful";
    header('location: ../sMysql/administraceObj.php');
} else {
    echo "fail";
}
?>