<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
?>
<!DOCTYPE html>
<html lang="cs">
    <?php
    include('../spolecne/panel.php');
    include('../spolecne/adminVsude.php');
    ?>
    <section>
        <div class="center-wrapper">
            <div class="flex-wrap">
                <div>
                    <h2>Objednavky</h2>
                    <?php
                    $sql = "SELECT DISTINCT `objednavka`,`poznamka`,`stav`,`datum_vytvoreni`,`uzivatel_iduzivatel`,`doprava_iddoprava`,`platba_idplatba` FROM nakup";
                    $res = mysqli_query($connect, $sql);

                    echo '<table>

                        <tr>
                            <th>idnakup</th>
                            <th>poznamka</th>
                            <th>stav</th>
                            <th>datum</th>
                            <th>uzivatel</th>
                            <th>doprava</th>
                            <th>platba</th>
                        </tr>';

                    while ($r = mysqli_fetch_assoc($res)) {
                        $acId = $r["objednavka"];
                        $sqlUziv = "SELECT email FROM uzivatel where iduzivatel=$r[uzivatel_iduzivatel]";
                        $resUziv = mysqli_query($connect, $sqlUziv);
                        $rUziv = mysqli_fetch_assoc($resUziv);
                        $sqlDop = "SELECT popis FROM doprava where iddoprava=$r[doprava_iddoprava]";
                        $resDop = mysqli_query($connect, $sqlDop);
                        $rDop = mysqli_fetch_assoc($resDop);
                        $sqlPlat = "SELECT popis FROM platba where idplatba=$r[platba_idplatba]";
                        $resPlat = mysqli_query($connect, $sqlPlat);
                        $rPlat = mysqli_fetch_assoc($resPlat);
                        echo'<tr>

                            <td>' . $acId . '</td>
                            <td>' . $r["poznamka"] . '</td>
                            <td>' . $r["stav"] . '</td>
                            <td>' . $r["datum_vytvoreni"] . '</td>
                            <td>' . $rUziv["email"] . '</td>
                            <td>' . $rDop["popis"] . '</td>
                            <td>' . $rPlat["popis"] . '</td>
                            <td><a href="../jenPHP/potvrObj.php?data=' . $acId . '"class="btn btn-primary" role="button">Potvrd objednavku</a> </td>
                            <td><a href="../jenPHP/nepltObj.php?data=' . $acId . '"class="btn btn-primary" role="button">&nbsp;Zneplatni Obejdnavku</a> </td>
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