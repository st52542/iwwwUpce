<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
$sql = "SELECT * FROM produkt WHERE typ_idtyp=$wh";
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
        <h3><a href="../sMysql/detailProduktu.php?id=<?php echo $r['idprodukt'] ?>"><?php echo $r['nazev'] ?></a></h3>

        <p><?php echo $r['cena'] ?>,- CZK</p>
        <p>Vyrobce: <a href="../sMysql/detailVyrobce.php?id=<?php echo $r['vyrobce_idvyrobce'] ?>"><?php echo $rVyrob['nazev'] ?></a></p>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['email'])) {
            ?>
        <a href="../jenPHP/vlozDoKosiku.php">Vloz do kosiku</a>
        <?php }
        ?> 
    </div>

<?php } ?>