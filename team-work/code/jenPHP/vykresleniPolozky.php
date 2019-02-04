<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
$sql = "SELECT * FROM produkt WHERE typ_idtyp=$wh and v_nabidce = 1";
$res = mysqli_query($connect, $sql);
?>

<?php while ($r = mysqli_fetch_assoc($res)) { ?>
    <div class="card">
        <?php
        $sqlVyrob = "SELECT nazev FROM vyrobce where idvyrobce=$r[vyrobce_idvyrobce]";
        $resVyrob = mysqli_query($connect, $sqlVyrob);
        $rVyrob = mysqli_fetch_assoc($resVyrob);
        ?>
        <?php echo '<img src="data:image/png;base64,' . base64_encode($r['fotka']) . '" width="150" height="150"/>' ?>
        <h3><a href="../sMysql/detailProduktu.php?id=<?php echo $r['idprodukt'] ?>"class="btn btn-primary" role="button"><?php echo $r['nazev'] ?></a></h3>
        <p>cena: <?php echo ($r['cena']/ 100 * $r["sleva"]) ?>,- CZK</p>
        <p>Vyrobce: <a href="../sMysql/detailVyrobce.php?id=<?php echo $r['vyrobce_idvyrobce'] ?>"class="btn btn-primary" role="button"><?php echo $rVyrob['nazev'] ?></a></p>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['email'])) {
            ?>
        <a href="../jenPHP/vlozDoKosiku.php?id=<?php echo $r['idprodukt'] ?>" class="btn btn-primary" role="button">Vloz do kosiku</a>
        <?php }
        ?> 
    </div>

<?php } ?>
