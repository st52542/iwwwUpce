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
                    <h2>Doprava</h2>
                    <?php
                    $sql = "SELECT * FROM platba";
                    $res = mysqli_query($connect, $sql);

                    echo '<table>

                        <tr>
                            <th>id Platba</th>
                            <th>popis</th>
                            <th>prevod</th>
                        </tr>';

                    while ($r = mysqli_fetch_assoc($res)) {
                        $delId = $r["idplatba"];
                        echo'<tr>

                            <td>' . $delId . '</td>
                            <td>' . $r["popis"] . '</td>
                            <td>' . $r["prevod"] . '</td>
                            <td><a href="upravaPlatby.php?data=' . $delId . '" class="btn btn-primary" role="button">Uprav</a> </td>
                            <td><a href="../jenPHP/smazPlatbu.php?data=' . $delId . '" class="btn btn-primary" role="button">&nbsp;Odeber</a> </td>
                        </tr>';
                    }
                    echo '</table>';
                    ?>
                    <a href=pridejPlatbu.php class="btn btn-primary" role="button">&nbsp;pridej</a>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>