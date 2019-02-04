<?php

$connect = mysqli_connect("localhost", "root", "", "semestralka");
$id = $_GET['data'];
echo $id;
$sql = "DELETE FROM `platba` WHERE idplatba = $id ";
if (mysqli_query($connect, $sql)) {
    echo "successful";
    header('location: ../sMysql/administracePlatby.php');
} else {
    echo "fail";
}
?>