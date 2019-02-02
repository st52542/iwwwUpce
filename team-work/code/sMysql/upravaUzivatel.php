<form method="post" action="" >

    <table>

        <tr>
            <th>IdUzivatel</th>
            <th>jmeno</th>
            <th>prijmeni</th>
            <th>email</th>
            <th>adresa</th>
            <th>admin</th>
        </tr>
        <?php
        $var_value = $_GET['data'];
        $connect = mysqli_connect("localhost", "root", "", "semestralka");
        $sql = "SELECT * FROM uzivatel where iduzivatel = $var_value";
        $res = mysqli_query($connect, $sql);
        while ($r = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <?php $userId = $r['iduzivatel']; ?>
                <td><?php echo $userId ?></td>
                <td><input type="text" name="jmeno" value="<?php echo $r['jmeno'] ?>"></td>
                <td><input type="text" name="prijmeni" value="<?php echo $r['prijmeni'] ?>"> </td>
                <td><input type="text" name="email" value="<?php echo $r['email'] ?>"> </td>
                <td><input type="text" name="adresa" value="<?php echo $r['adresa'] ?>"> </td>
                <td><input type="text" name="admin" value="<?php echo $r['admin'] ?>"> </td>
                <td><input type="submit" name="proved" value="proved"></td>

            </tr>


        <?php } ?>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
            $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $jmeno = $_POST["jmeno"];
    $prijmeni = $_POST["prijmeni"];
    $email = $_POST["email"];
    $adresa = $_POST["adresa"];
    $admin = $_POST["admin"];
    $id = $_GET['data'];
    echo $jmeno;
    echo $prijmeni;
    echo $email;
    echo $adresa;
    echo $admin;
    echo $id;
    $sql = "UPDATE uzivatel SET jmeno='$jmeno',prijmeni='$prijmeni',email='$email',adresa='$adresa',admin='$admin' WHERE iduzivatel=$id";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: administraceUzivatelu.php');
    } else {
        echo "fail";
    }
}
?>