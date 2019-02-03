<!DOCTYPE html>
<html lang="cs">
    <?php
    include('../spolecne/panel.php')
    ?>
    <section>
        <div class="center-wrapper">
            <div class="flex-wrap">
                <?php
                 global $wh;
                $wh = $_GET['id'];
                include '../jenPHP/vykresleniPolozky.php';
                ?>
            </div>

        </div>
        <a href="shop.php"class="btn btn-primary" role="button">Zpet</a>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>