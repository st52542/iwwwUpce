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
        <a href="../jenPHP/exportJson.php" class="button" role="button"> Export do Json</a></br>
        <a href="../jenPHP/importJson.php" class="button" role="button"> Import z csv</a></br>
    </section>

    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>