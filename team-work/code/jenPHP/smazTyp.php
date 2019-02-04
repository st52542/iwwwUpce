<?php

$connect = mysqli_connect("localhost", "root", "", "semestralka");
$id = $_GET['data'];
echo $id;
$sql = "DELETE FROM `typ` WHERE idtyp = $id ";
if (mysqli_query($connect, $sql)) {
    echo "successful";
    header('location: ../sMysql/administraceTypu.php');
} else {
    echo "fail";
}
?>