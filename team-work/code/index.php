
<!DOCTYPE html>
<html lang="cs">
    <header>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Drogerie</title>
            <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="spolecne/layout.css">
        </head>
        <nav>
            <div>
                <h3><a href="/index.php">Uvod</a>
                    <a href="/dashboard/zbytek/onas.php"> O nás</a>
                    <a href="/dashboard/sMysql/shop.php"> Eshop</a>
                    <a href="/dashboard/zbytek/kontakt.php">Kontakt</a></h3>

                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION['email'])) {
                    ?>
                <h3><a href="/dashboard/jenPHP/odhlas.php">Odhlas</a>
                    <a href="/dashboard/sMysql/mojeObjednavky.php">Objednavky</a>
                    <a href="/dashboard/sMysql/kosik.php">Kosik</a></h3>
                    <?php
                    if ($_SESSION['admin'] == 1) {
                        ?><h3><a href="/dashboard/zbytek/administrace.php">Administrace</a></h3>
                        <?php
                    }
                } else {
                    ?>
                        <h3><a href="/dashboard/zbytek/prihlaseni.php"> Prihlaseni</a>
                            <a href="/dashboard/zbytek/registrace.php"> Registrace</a></h3> <?php }
                ?>  
            </div>
        </nav>
    </header>

    <section>
        <div>
            <h1>
                Vitejte v Eshopu Drogerie
            </h1>
            <h2>
                Vyberte polozku v menu kam chcete jit dale
            </h2>
        </div>
    </section>
    <?php
    include('spolecne/konecStranky.php')
    ?>
</html>

