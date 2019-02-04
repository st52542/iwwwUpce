<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
?>
<!DOCTYPE html>
<html lang="cs">
    <?php
    include('../spolecne/panel.php');
    ?>

</script>
<section>
    <div class="center-wrapper">
        <div class="flex-wrap">
            <div>
                <h2>Potvrzeni Objednavky</h2>
                <?php
                $sql = "SELECT * FROM nakoupena_polozka where platnost = 1";
                $res = mysqli_query($connect, $sql);
                $cena = 0;
                echo '<table>

                        <tr>
                            <th>mnozstvi</th>
                            <th>zbozi</th>
                            <th>cena</th>
                        </tr>';

                while ($r = mysqli_fetch_assoc($res)) {
                    $idPolozka = $r["idnakoupena_polozka"];
                    $sqlPoloz = "SELECT * FROM produkt where idprodukt=$r[produkt_idprodukt]";
                    $resPoloz = mysqli_query($connect, $sqlPoloz);
                    $rPoloz = mysqli_fetch_assoc($resPoloz);
                    echo'<tr>
                            <td>' . $r["mnozstvi"] . '</td>
                            <td>' . $rPoloz["nazev"] . '</td>
                            <td>' . ($rPoloz["cena"] / 100 * $rPoloz["sleva"]) . '</td>
                                <td><a href="../jenPHP/odeberPolozku.php?data=' . $idPolozka . '" class="btn btn-primary" role="button">Odeber</a> </td>
                                    
                        </tr>';
                    $cena = $cena + ($rPoloz["cena"] / 100 * $rPoloz["sleva"]);
                }
                echo '</table>';
                ?>

            </div>
            <div>
                <h3>Cena</h3>
                <?php echo $cena ?>
            </div>
            <form name="form" method="POST" action="">
                <h3>Vyber zpusob dopravy</h3>
                <div>
                    <?php
                    $sqldop2 = "SELECT * FROM doprava";
                    $resdop2 = mysqli_query($connect, $sqldop2);
                    ?>

                    <select class = "dropdown-select" name="doprava123"  id="dopravaa">
                        <?php while ($rdop2 = mysqli_fetch_assoc($resdop2)): ?>
                            <option value= "<?php echo $rdop2["iddoprava"]; ?>"> <?php echo $rdop2["popis"] . " cena: " . $rdop2["cena"]; ?></option>

                        <?php endwhile ?>

                    </select>

                </div>

                <h3>Vyber zpusob platby</h3>
                <div>
                    <?php
                    $sqlplat = "SELECT * FROM platba";
                    $resplat = mysqli_query($connect, $sqlplat);
                    ?>

                    <select class = "dropdown-select" name="platba123"  id="platba" >
                        <?php while ($rplat = mysqli_fetch_assoc($resplat)): ?>
                            <option value= "<?php echo $rplat["idplatba"]; ?>"> <?php echo $rplat["popis"] . " kurz: " . $rplat["prevod"]; ?></option>
                        <?php endwhile ?>
                    </select>

                </div>
                <div>
                    <h3>Poznamka</h3>
                    <input type="text" name="poznamka" class="form-control">
                </div>
                <input type='submit' value='Uloz' class="button" role="button"/>
            </form>
            <?php
            if ($_POST) {
                ?><a href = "../jenPHP/zprocesujObjednavku.php?doprava=<?php print_r($_POST['doprava123']) ?>&platba=<?php print_r($_POST['platba123']) ?>&poznamka=<?php print_r($_POST['poznamka']) ?>" class = "button" role = "button">Potvrd</a>

            <?php }
            ?>

        </div>
    </div>
</section>
<?php
include('../spolecne/konecStranky.php')
?>
</html>

