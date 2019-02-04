<header>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Drogerie</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../spolecne/layout.css">
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
                <a href="/dashboard/jenPHP/odhlas.php">Odhlas</a>
                <a href="/dashboard/sMysql/mojeObjednavky.php">Objednavky</a>
                <a href="/dashboard/sMysql/kosik.php">Kosik</a>
                <?php
                if ($_SESSION['admin'] == 1) {
                    ?><a href="/dashboard/zbytek/administrace.php">Administrace</a>
                <?php
                }
            } else {
                ?>
                <a href="/dashboard/zbytek/prihlaseni.php"> Prihlaseni</a>
                <a href="/dashboard/zbytek/registrace.php"> Registrace</a> <?php }
            ?>  
        </div>
    </nav>

</header>

