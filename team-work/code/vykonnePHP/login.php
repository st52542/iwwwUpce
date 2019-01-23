<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
session_start();
if (isset($_POST["prihlaseni"])) {
    if (empty($_POST["jmeno"]) && empty($_POST["heslo"])) {
        echo '<script>alert("Vyplnte vsechny pole")</script>';
    } else {
        $email = mysqli_real_escape_string($connect, $_POST["email"]);
        $heslo = mysqli_real_escape_string($connect, $_POST["heslo"]);
        $heslo = md5($heslo);
        $query = "SELECT * FROM uzivatel WHERE email = '$email' AND heslo = '$heslo'";
        $result = mysqli_query($connect, $query);
        if ($r = mysqli_fetch_assoc($result)) {
            echo $r["email"];
            $_SESSION['email'] = $r["email"];
            $_SESSION['admin'] = $r["admin"];
            header('location: ../index.php');
        } else {
            echo '<script>alert("spatne uzivatelske udaje")</script>';
        }
    }
}
?>  
