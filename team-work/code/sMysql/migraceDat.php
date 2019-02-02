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
        <a href="../jenPHP/exportJson.php"> Export do Json</a></br>
        <a href="../jenPHP/importJson.php"> Import z csv</a></br>
    </section>

    <?php
    include('.\spolecne\konecStranky.php')
    ?>
</html>