<?php

$connect = mysqli_connect("localhost", "root", "", "semestralka");
$id = $_GET['data'];
echo $id;
$sql = "DELETE FROM `doprava` WHERE iddoprava = $id ";
if (mysqli_query($connect, $sql)) {
    echo "successful";
    header('location: ../sMysql/administraceDopravy.php');
} else {
    echo "fail";
}
?>