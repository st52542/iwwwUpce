<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
?>
<!DOCTYPE html>
<html lang="cs">
    <?php
    include('../spolecne/panel.php');
    ?>
    <section>
        <div class="center-wrapper">
            <div class="flex-wrap">
                <div>
                    <h2>Kosik</h2>
                    <?php
                    $sql = "SELECT * FROM nakoupena_polozka";
                    $res = mysqli_query($connect, $sql);

                    echo '<table>

                        <tr>
                            <th>mnozstvi</th>
                            <th>produkt_idprodukt</th>
                        </tr>';

                    while ($r = mysqli_fetch_assoc($res)) {
                        $sqlPoloz = "SELECT nazev FROM produkt where idprodukt=$r[produkt_idprodukt]";
                        $resPoloz = mysqli_query($connect, $sqlPoloz);
                        $rPoloz = mysqli_fetch_assoc($resPoloz);
                        echo'<tr>
                            <td>' . $r["mnozstvi"] . '</td>
                            <td>' . $rPoloz["nazev"] . '</td>
                        </tr>';
                    }
                    echo '</table>';
                    ?>
                </div>
                <a href="vyberDopravyAPotvrzeni.php"class="btn btn-primary" role="button">Pokracuj</a>
            </div>
        </div>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>

