<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "semestralka");
$objednavka = $_GET['objednavka'];
?>
<html lang="cs">
    <?php
    include('../spolecne/panel.php')
    ?>
    <section>
        <div class="center-wrapper">
            <div class="flex-wrap">
                <div>
                    <h2>Zakoupene zbozi</h2>
                    <?php
                    $uzivMail = $_SESSION['email'];
                    $sqls = "SELECT * FROM uzivatel where email = '$uzivMail'";
                    $resUziv = mysqli_query($connect, $sqls);
                    $rUziv = mysqli_fetch_assoc($resUziv);
                    $idUziv = $rUziv["iduzivatel"];
                    $sql = "SELECT DISTINCT objednavka,datum_vytvoreni,stav FROM nakup where uzivatel_iduzivatel = $idUziv ";
                    $res = mysqli_query($connect, $sql);

                    echo '<table>

                        <tr>
                            <th>cislo objednavky</th>
                            <th>datum</th>
                            <th>stav</th>
                            
                        </tr>';

                    while ($r = mysqli_fetch_assoc($res)) {
                        echo'<tr>
                            <td>' . $r["objednavka"] . '</td>
                            <td>' . $r["datum_vytvoreni"] . '</td>
                            <td>' . $r["stav"] . '</td>
                            <td><a href="../sMysql/detailObjednavky.php?objednavka=' . $r["objednavka"] . '"class="btn btn-primary" role="button">Detail Objednavky</a> </td>
                        </tr>';
                    }
                    echo '</table>';
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>

