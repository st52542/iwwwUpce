<html lang="cs">
    <?php
    include('../spolecne/panel.php');
    $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $vy = $_GET['id'];
    $sql = "SELECT * FROM vyrobce WHERE idvyrobce=$vy";
    $res = mysqli_query($connect, $sql);
    ?>
    <section>
        <h3>Detail vyrobce</h3>
        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
            <div class="card">
                <p>nazev: <?php echo $r['nazev'] ?></p>
                <p>adresa: <?php echo $r['adresa'] ?></p>
                <p>popis: <?php echo $r['popis'] ?></p>
                <div class="center-wrapper">
                    <div class="flex-wrap">
                        <div>
                            <h3>Hodnoceni</h3>
                            <?php
                            $sql = "SELECT * FROM komentar where vyrobce_idvyrobce=$vy";
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
                        ?><a href = "../jenPHP/vlozKomentVyrobce.php?koment=<?php print_r($_POST['komentar']) ?>&vyrobce=<?php print_r($vy) ?>" class = "button" role = "button">Potvrd Komentar</a></br>
                    <?php }
                    ?>
                <?php }
                ?> 
            </div>

        <?php } ?>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>
