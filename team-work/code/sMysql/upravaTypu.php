<form method="post" action="" >

    <table>

        <tr>
            <th>IdTyp</th>
            <th>popis</th>
        </tr>
        <?php
        $var_value = $_GET['data'];
        $connect = mysqli_connect("localhost", "root", "", "semestralka");
        $sql = "SELECT * FROM typ where idtyp = $var_value";
        $res = mysqli_query($connect, $sql);
        while ($r = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <?php $delId = $r['idtyp']; ?>
                <td><?php echo $delId ?></td>
                <td><input type="text" name="popis" value="<?php echo $r['popis'] ?>"></td>
                <td><input type="submit" name="proved" value="proved"></td>

            </tr>


        <?php } ?>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
            $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $popis = $_POST["popis"];
    $id = $_GET['data'];
    echo $popis;
    echo $cena;
    echo $id;
    $sql = "UPDATE typ SET popis='$popis' WHERE idtyp=$id";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: administraceTypu.php');
    } else {
        echo "fail";
    }
}
?>