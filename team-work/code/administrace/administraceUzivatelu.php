<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
session_start();
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
                            <h3><a href="index.php">Uvod</a><a href="onas.php"> O nás</a><a href="prihlaseni.php"> Prihlaseni</a><a href="obchod.php"> Eshop</a>
                                <a href="kontakt.php">Kontakt</a> <a href=" /dashboard/semestralka/administrace/administracePolozek.php"> Administrace Polozek</a>
                                <a href=" /dashboard/semestralka/administrace/administraceUzivatelu.php"> Administrace Uzivatelu</a>
                                <a href=" /dashboard/semestralka/administrace/migraceDat.php"> Migrace Dat</a></h3>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
        <table>
            <tr>
                <th>IdUzivatele</th> 
                <th> Jmeno</th> 
                <th> Prijmeni</th>
                <th> Email</th>
                <th> Adresa</th>
                <th> Admin</th>
            </tr>
            <?php
            $sql = "SELECT iduzivatel, jmeno, prijmeni,email,adresa,admin FROM uzivatel";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["iduzivatel"] . "</td><td>" . $row["jmeno"] . "</td><td>" . $row["prijmeni"] . "</td><td>" . $row["email"] . "</td><td>"
                    . $row["adresa"] . "</td><td>" . $row["admin"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
        </table>
    </body>
</html>

