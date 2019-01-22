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
        $vyseldek = mysqli_num_rows($result);
        if ($vyseldek == 1) {
            $query = "SELECT * FROM uzivatel WHERE email = '$email' AND heslo = '$heslo'AND admin=0";
            $result = mysqli_query($connect, $query);
            $vyseldek = mysqli_num_rows($result);
            if ($vyseldek == 1) {
                echo '<script>alert("jsi prihlasen")</script>';
                $_SESSION['username'] = $r["username"];
                $_SESSION['userType'] = $r["userType"];
            } else {
                echo '<script>alert("Vitej admine")</script>';
                $_SESSION['username'] = $r["username"];
                $_SESSION['userType'] = $r["userType"];
            }


            header('location: ../index.php');
        } else {
            echo '<script>alert("spatne uzivatelske udaje")</script>';
        }
    }
}
?>  
<!DOCTYPE html>  
<html>  
    <head>  
        <title>Eshop</title> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>  
    <body>  
        <br /><br />  
        <nav>
            <ul>
                <div class="container" style="width:1000px;text-align: center">
                    <h3><a href="index.php">Uvod</a><a href="onas.php"> O nás</a><a href="prihlaseni.php"> Prihlaseni</a><a href="obchod.php"> Eshop</a> <a href="kontakt.php">Kontakt</a></h3>
                </div>
            </ul>
        </nav>
        <div class="container" style="width:500px;">    
            <h3 align="center">Prihlaseni</h3>  
            <br />  
            <form method="post">  
                <label>zadejte email</label>  
                <input type="text" name="email" class="form-control" />  
                <br />  
                <label>zadejte heslo</label>  
                <input type="password" name="heslo" class="form-control" />  
                <br />  
                <input type="submit" name="prihlaseni" value="Prihlaseni" class="btn btn-info" />  
                <br />  
                <p align="center"><a href="registrace.php">Registrace</a></p>  
            </form>  
        </div>  
    </body>  
</html> 

