
<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
session_start();
if (isset($_SESSION["username"])) {
    header("location:entry.php");
}
if (isset($_POST["register"])) {
    if (empty($_POST["jmeno"]) && empty($_POST["prijmeni"]) && empty($_POST["email"]) && empty($_POST["heslo"]) && empty($_POST["adresa"])) {
        echo '<script>alert("Vyplnte prosim vsechny pole")</script>';
    } else {
        $jmeno = mysqli_real_escape_string($connect, $_POST["jmeno"]);
        $prijmeni = mysqli_real_escape_string($connect, $_POST["prijmeni"]);
        $email = mysqli_real_escape_string($connect, $_POST["email"]);
        $heslo = mysqli_real_escape_string($connect, $_POST["heslo"]);
        $adresa = mysqli_real_escape_string($connect, $_POST["adresa"]);
        $heslo = md5($heslo);
        $query = "INSERT INTO uzivatel (iduzivatel,jmeno,prijmeni,email,heslo,adresa,admin) VALUES(DEFAULT,'$jmeno', '$prijmeni','$email','$heslo','$adresa','0')";
        if (mysqli_query($connect, $query)) {
            echo '<script>alert("Registrace je kompletni")</script>';
        } else {
            echo '<script>alert("neco se nepovedlo")</script>';
        }
    }
}
?>  

