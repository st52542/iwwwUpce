<header>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Eshop</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <nav>
        <div>
            <h3><a href="index.php">Uvod</a>
                <a href=".\proVsechny\onas.php"> O nás</a>
                <a href=".\proVsechny\obchod.php"> Eshop</a>
                <a href=".\proVsechny\kontakt.php">Kontakt</a></h3>

            <?php
            if (!isset($_SESSION)) {
                session_start();
            }
            if (isset($_SESSION['email'])) {
                ?>
                <a href="..\vykonnePHP\odhlas.php">Odhlas</a>
                <a href="..\prihlaseny\objednavky.php">Objednavky</a>
                <?php
                if ($_SESSION['admin'] == 1) {
                    ?><a href="administrace/administrace.php">Administrace</a>
                <?php }
            } else {
                ?>
                <a href=".\proVsechny\prihlaseni.php"> Prihlaseni</a>
                <a href=".\proVsechny\registrace.php"> Registrace</a> <?php }
            ?>  
        </div>
    </nav>

</header>

