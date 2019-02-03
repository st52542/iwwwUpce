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
            </div>

        <?php } ?>
        <a href="shop.php"class="btn btn-primary" role="button">Zpet</a>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>
