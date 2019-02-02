<?php
            $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $id = $_GET['data'];
    echo $id;
    $sql = "DELETE FROM `uzivatel` WHERE iduzivatel = $id ";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: administraceUzivatelu.php');
    } else {
        echo "fail";
    }
?>
