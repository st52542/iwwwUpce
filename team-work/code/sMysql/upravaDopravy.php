<form method="post" action="" >

    <table>

        <tr>
            <th>IdDoprava</th>
            <th>popis</th>
            <th>cena</th>
        </tr>
        <?php
        $var_value = $_GET['data'];
        $connect = mysqli_connect("localhost", "root", "", "semestralka");
        $sql = "SELECT * FROM doprava where iddoprava = $var_value";
        $res = mysqli_query($connect, $sql);
        while ($r = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <?php $delId = $r['iddoprava']; ?>
                <td><?php echo $delId ?></td>
                <td><input type="text" name="popis" value="<?php echo $r['popis'] ?>"></td>
                <td><input type="text" name="cena" value="<?php echo $r['cena'] ?>"> </td>
                <td><input type="submit" name="proved" value="proved"></td>

            </tr>


        <?php } ?>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
            $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $popis = $_POST["popis"];
    $cena = $_POST["cena"];
    $id = $_GET['data'];
    echo $popis;
    echo $cena;
    echo $id;
    $sql = "UPDATE doprava SET popis='$popis',cena='$cena' WHERE iddoprava=$id";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: administraceDopravy.php');
    } else {
        echo "fail";
    }
}
?>