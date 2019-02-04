<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "semestralka");
global $cena;
?>
<html lang="cs">
    <?php
    include('../spolecne/panel.php')
    ?>
    <section>
        <div class="center-wrapper">
            <div class="flex-wrap-tisk">
                <div>
                    <h2>Zakoupene zbozi</h2>
                    <?php
                    $objednavka = $_GET['objednavka'];
                    $sql = "SELECT * FROM nakup where objednavka = $objednavka ";
                    $res = mysqli_query($connect, $sql);

                    echo '<table>

                        <tr>
                            <th>nazev</th>
                            <th>cena</th>
                            
                        </tr>';

                    while ($r = mysqli_fetch_assoc($res)) {
                        $prom100 = $r["nakoupena_polozka_idnakoupena_polozka"];
                        $sql2 = "SELECT produkt_idprodukt FROM nakoupena_polozka where idnakoupena_polozka = $prom100";
                        $res2 = mysqli_query($connect, $sql2);
                        $r2 = mysqli_fetch_assoc($res2);
                        $prom1001 = $r2["produkt_idprodukt"];
                        $sql3 = "SELECT * FROM produkt where idprodukt = $prom1001 ";
                        $res3 = mysqli_query($connect, $sql3);
                        $r3 = mysqli_fetch_assoc($res3);
                        echo'<tr>
                            

                            <td>' . $r3["nazev"] . '</td>
                            <td>' . ($r3['cena'] / 100 * $r3["sleva"]) . '</td>
                                
                        </tr>';
                        $cena = ($r3['cena'] / 100 * $r3["sleva"]) + $cena;
                    }
                    echo '</table>';
                    $sql = "SELECT * FROM nakup where objednavka = $objednavka ";
                    $res = mysqli_query($connect, $sql);
                    $r = mysqli_fetch_assoc($res);
                    $promDop = $r["doprava_iddoprava"];
                    $sqlDop = "SELECT * FROM doprava where iddoprava = $promDop ";
                    $resDop = mysqli_query($connect, $sqlDop);
                    $rDop = mysqli_fetch_assoc($resDop);
                    $cena = $cena + $rDop["cena"];
                    echo "doprava: " . $rDop["popis"] . "  " . $rDop["cena"] . ",- CZK";
                    ?>
                    </br>
                    <?php
                    $promPlat = $r["platba_idplatba"];
                    $sqlPlat = "SELECT * FROM platba where idplatba = $promPlat ";
                    $resPlat = mysqli_query($connect, $sqlPlat);
                    $rPlat = mysqli_fetch_assoc($resPlat);
                    $cena = $cena / $rPlat["prevod"];
                    echo "Celkem: ".$cena . ",-" . $rPlat["popis"];
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>

