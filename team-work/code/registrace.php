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
<!DOCTYPE html>  
<html>  
    <head>  
        <title>Eshop</title> 
    </head>  
    <body>  
        <br /><br />  
        <?php
        ?>
        <!DOCTYPE html>
    <html lang="cs">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Eshop</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <!--<link href="reset.css" rel="stylesheet"/>-->
            <!--<link href="main.css" rel="stylesheet"/>-->
        </head>
        <body>
            <div class="background-first">
                <div class="menu-index">
                    <nav>
                        <ul>
                            <div class="container" style="width:1000px;text-align: center">
                                <h3><a href="index.php">Uvod</a><a href="onas.php"> O nás</a><a href="prihlaseni.php"> Prihlaseni</a><a href="obchod.php"> Eshop</a> <a href="kontakt.php">Kontakt</a></h3>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div>
        </body>
    </html>
    <div class="container" style="width:500px;text-align: center">  
        <h3 align="center">Registrace</h3>  
        <br />  
        <form method="post">  
            <label>Vlozte jmeno</label>  
            <input type="text" name="jmeno" class="form-control" />  
            <br /> 
            <label>Vlozte prijmeni</label> 
            <input type="text" name="prijmeni" class="form-control" />  
            <br /> 
            <label>Vlozte email</label> 
            <input type="text" name="email" class="form-control" />  
            <br />  
            <label>vlozte heslo</label>  
            <input type="password" name="heslo" class="form-control" />  
            <br />  
            <label>vlozte adresu</label>  
            <input type="text" name="adresa" class="form-control" />  
            <br />  
            <input type="submit" name="register" value="Register" class="btn btn-info" />  
            <br />  
            <p align="center"><a href="prihlaseni.php">Prihlaseni</a></p>  
        </form>   
    </div>  
</body>  
</html> 

