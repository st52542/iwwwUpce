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
                    $sql = "SELECT * FROM typ";
                    $res = mysqli_query($connect, $sql);

                    echo '<table>

                        <tr>
                            <th>id Typ</th>
                            <th>popis</th>
                        </tr>';

                    while ($r = mysqli_fetch_assoc($res)) {
                        $tyId = $r["idtyp"];
                        echo'<tr>

                            <td>' . $tyId . '</td>
                            <td>' . $r["popis"] . '</td>
                            <td><a href="upravaTypu.php?data=' . $tyId . '" class="btn btn-primary" role="button">Uprav</a> </td>
                            <td><a href="../jenPHP/smazTyp.php?data=' . $tyId . '" class="btn btn-primary" role="button">&nbsp;Odeber</a> </td>
                        </tr>';
                    }
                    echo '</table>';
                    ?>
                    <a href=pridejTyp.php class="btn btn-primary" role="button">&nbsp;pridej</a>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>