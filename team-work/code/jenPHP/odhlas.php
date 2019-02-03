<?php

if (!isset($_SESSION)) {
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $query = "delete from nakoupena_polozka";
    mysqli_query($connect, $query);
}
session_unset();

header("location:../index.php");
exit();
?>
