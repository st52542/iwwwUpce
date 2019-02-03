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
                    <h2>Potvrzeni Objednavky</h2>
                    <?php
                    $sql = "SELECT * FROM nakoupena_polozka";
                    $res = mysqli_query($connect, $sql);
                    $cena = 0;
                    echo '<table>

                        <tr>
                            <th>mnozstvi</th>
                            <th>produkt_idprodukt</th>
                        </tr>';

                    while ($r = mysqli_fetch_assoc($res)) {
                        $sqlPoloz = "SELECT * FROM produkt where idprodukt=$r[produkt_idprodukt]";
                        $resPoloz = mysqli_query($connect, $sqlPoloz);
                        $rPoloz = mysqli_fetch_assoc($resPoloz);
                        echo'<tr>
                            <td>' . $r["mnozstvi"] . '</td>
                            <td>' . $rPoloz["nazev"] . '</td>
                        </tr>';
                        $cenaPomoc = ($rPoloz["cena"] / 100 * $rPoloz["sleva"]);
                        $cena = $cena + $cenaPomoc;
                    }
                    echo '</table>';
                    ?>
                </div>
                <h3>Vyber zpusob dopravy</h3>
                <div>
                    <?php
                    $pomocCenaDoprava=0;
                    $combo ="<select name='select_catalog'>";
                    $sqldop = "SELECT * FROM doprava";
                    $resdop = mysqli_query($connect, $sqldop);
                    while ($rdop = mysqli_fetch_assoc($resdop)) {
                        $combo .= "<option value= '".$rdop['iddoprava']."'>" . $rdop["popis"] . " cena: " . $rdop["cena"] . "</option>";
                    }
                    $combo .= "</select>";
                    echo $combo;
                    echo $_POST['select_catalog'];
                    $cena = $cena + $pomocCenaDoprava;
                    ?>
                    <select name='select_catalog'>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select>

                </div>
                <h3>Vyber zpusob platby</h3>
                <div>
                    <?php
                    $comboplat = "<select>";
                    $sqlplat = "SELECT * FROM platba";
                    $resplat = mysqli_query($connect, $sqlplat);
                    while ($rplat = mysqli_fetch_assoc($resplat)) {
                        $comboplat .= "<option>" . $rplat["popis"] . " kurz: " . $rplat["prevod"] . ",- CZK" . "</option>";
                    }
                    $comboplat .= "</select>";
                    echo $comboplat;
                    ?>
                </div>
                <h3>Cena</h3>
                <div>
                    <?php
                    echo $cena;
                    ?>
                </div>
                <a href="../index.php"class="btn btn-primary" role="button">Potvrd</a>
            </div>
        </div>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>

