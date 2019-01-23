<?php 
$connect = mysqli_connect("localhost", "root", "", "semestralka");
?>
<!DOCTYPE html>
<html lang="cs">
    <?php
    include('..\proVsechny\panel.php')
    ?>
    <section>
        <div>
            <h1>
                Administrace Uzivatelu
            </h1>
            <h3>
                Pokud nastala chyba a nemate tu co delat prosim neprodlene kontaktujte administratora </br>
                email: <a href="mailto:st52542%40student.upce.cz" >st52542@student.upce.cz</a>
            </h3>
        </div>
        <div>
            <h3>
                <a href="administracePolozek.php"> Administrace Polozek Eshopu</a></br>
                <a href="administraceUzivatelu.php"> Administrace Uzivatelu Eshopu</a></br>
                <a href="migraceDat.php"> Migrace dat</a></br>
            </h3>
        </div>
    </section>
    <section>
        <div class="center-wrapper">
            <div class="flex-wrap">
                <div>
                    <h2>Uzivatele</h2>
                    <?php
                    $sql = "SELECT * FROM uzivatel";
                    $res = mysqli_query($connect, $sql);

                    echo '<table>

                        <tr>
                            <th>IdUzivatel</th>
                            <th>jmeno</th>
                            <th>prijmeni</th>
                            <th>email</th>
                            <th>adresa</th>
                            <th>admin</th>
                        </tr>';

                        while($r = mysqli_fetch_assoc($res)){
                            $userId=$r["iduzivatel"];
                        echo'<tr>

                            <td>' . $userId . '</td>
                            <td>' . $r["jmeno"] . '</td>
                            <td>' . $r["prijmeni"] . '</td>
                            <td>' . $r["email"] . '</td>
                            <td>' . $r["adresa"] . '</td>
                            <td>' . $r["admin"] . '</td>
                            <td><a href="ZDE POKRACUJEM DOBROU">Uprav Uzivatele</a> </td>

                        </tr>';

                        }
                        echo '</table>';
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('..\proVsechny\konecStranky.php')
    ?>
</html>

