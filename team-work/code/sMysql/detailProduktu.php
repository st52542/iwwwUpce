<!DOCTYPE html>
<html lang="cs">
    <?php
    include('../spolecne/panel.php');
    $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $pr = $_GET['id'];
    $sql = "SELECT * FROM produkt WHERE idprodukt=$pr";
    $res = mysqli_query($connect, $sql);
    ?>
    <section>
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <div class="card">
                <?php
                $pomoc = $r['typ_idtyp'];
                $sqlVyrob = "SELECT nazev FROM vyrobce where idvyrobce=$r[vyrobce_idvyrobce]";
                $resVyrob = mysqli_query($connect, $sqlVyrob);
                $rVyrob = mysqli_fetch_assoc($resVyrob);
                ?>
                <?php echo '<img src="data:image/png;base64,' . base64_encode($r['fotka']) . '" width="250" height="250"/>' ?>
                <h3>nazev: <?php echo $r['nazev'] ?></a></h3>
                <p>cena: <?php echo $r['cena'] ?>,- CZK</p>
                <p>popis: <?php echo $r['popis'] ?></p>
                <p>Vyrobce: <a href="../sMysql/detailVyrobce.php?id=<?php echo $r['vyrobce_idvyrobce'] ?>"><?php echo $rVyrob['nazev'] ?></a></p>
                <div class="center-wrapper">
                    <div class="flex-wrap">
                        <div>
                            <h3>Hodnoceni</h3>
                            <?php
                            $sql = "SELECT * FROM komentar where produkt_idprodukt=$pr";
                            $res = mysqli_query($connect, $sql);

                            echo '<table>

                            <tr>
                            <th>uzivatel</th>
                            <th>komentar</th>
                            </tr>';

                            while ($r = mysqli_fetch_assoc($res)) {
                                $uziv = $r["uzivatel_iduzivatel"];
                                $sqls = "SELECT * FROM uzivatel where iduzivatel = $uziv";
                                $resUziv = mysqli_query($connect, $sqls);
                                $rUziv = mysqli_fetch_assoc($resUziv);
                                $idUziv = $rUziv["jmeno"];
                                echo'<tr>
                                <td>' . $idUziv . '</td>
                                <td>' . $r["text"] . '</td>
                                </tr>';
                            }
                            echo '</table>';
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION['email'])) {
                    ?>
                    <h3>Napis Komentar</h3>
                    <form name="form" method="POST" action="">
                        <input type="text" name="komentar" class="form-control">
                        <input type='submit' value='Vloz Komentar' class="button" role="button"/></br>
                    </form>
                    <?php
                    if ($_POST) {
                        ?><a href = "../jenPHP/vlozKomentProdukt.php?koment=<?php print_r($_POST['komentar']) ?>&produkt=<?php print_r($pr) ?>" class = "button" role = "button">Potvrd Komentar</a></br>
                        <?php }
                    ?>
                    <a href="../jenPHP/vlozDoKosiku.php?id=<?php echo $r['idprodukt']; ?>" class="button" role="button">Vloz do kosiku</a>


                <?php }
                ?> 
                    <a href="kategorieDetail.php?id=<?php echo $pomoc ?>"class="button" role="button">Zpet</a>
            </div>

        <?php } ?>
        
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>

</html>

