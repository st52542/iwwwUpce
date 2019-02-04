<form method="post" action="" >

    <table>

        <tr>
            <th>IdPlatba</th>
            <th>popis</th>
            <th>prevod</th>
        </tr>
        <?php
        $var_value = $_GET['data'];
        $connect = mysqli_connect("localhost", "root", "", "semestralka");
        $sql = "SELECT * FROM platba where idplatba = $var_value";
        $res = mysqli_query($connect, $sql);
        while ($r = mysqli_fetch_assoc($res)) {
            ?>
            <tr>
                <?php $delId = $r['idplatba']; ?>
                <td><?php echo $delId ?></td>
                <td><input type="text" name="popis" value="<?php echo $r['popis'] ?>"></td>
                <td><input type="text" name="prevod" value="<?php echo $r['prevod'] ?>"> </td>
                <td><input type="submit" name="proved" value="proved"></td>

            </tr>


        <?php } ?>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
            $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $popis = $_POST["popis"];
    $prevod = $_POST["prevod"];
    $id = $_GET['data'];
    echo $popis;
    echo $prevod;
    echo $id;
    $sql = "UPDATE platba SET popis='$popis',prevod='$prevod' WHERE idplatba=$id";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: administracePlatby.php');
    } else {
        echo "fail";
    }
}
?>