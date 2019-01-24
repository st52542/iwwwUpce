<form method="post" action="" >

    <table>

        <?php
        $var_value = $_GET['data'];
        $connect = mysqli_connect("localhost", "root", "", "semestralka");
        $sql = "SELECT * FROM uzivatel where iduzivatel = $var_value";
        $res = mysqli_query($connect, $sql);
        while ($r = mysqli_fetch_assoc($res)) {
            echo '<table>

                        <tr>
                            <th>IdUzivatel</th>
                            <th>jmeno</th>
                            <th>prijmeni</th>
                            <th>email</th>
                            <th>adresa</th>
                            <th>admin</th>
                            <th>heslo</th>
                        </tr>';
            echo'<tr>
                            <td>' . $r["iduzivatel"] . '</td>
                            <td>' . $r["jmeno"] . '</td>
                            <td>' . $r["prijmeni"] . '</td>
                            <td>' . $r["email"] . '</td>
                            <td>' . $r["adresa"] . '</td>
                            <td>' . $r["admin"] . '</td>
                <td><input type="text" name="heslo"> </td>
                <td><input type="submit" name="proved" value="proved"></td>
                        </tr>';
            ?>
        <?php } ?>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
    $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $heslo = mysqli_real_escape_string($connect, $_POST["heslo"]);
    $heslo = md5($heslo);
    $id = $_GET['data'];
    echo $id;
    $sql = "UPDATE uzivatel SET heslo='$heslo' WHERE iduzivatel=$id";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: .\administraceUzivatelu.php');
    } else {
        echo "fail";
    }
}
?>