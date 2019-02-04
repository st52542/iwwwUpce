<form method="post" action="" >

    <table>

        <tr>
            <th>popis</th>
            <th>prevod</th>
        </tr>
        <tr>
            <td><input type="text" name="popis"></td>
            <td><input type="text" name="prevod" > </td>
            <td><input type="submit" name="proved" value="proved"></td>

        </tr>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
    $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $popis = $_POST["popis"];
    $prevod = $_POST["prevod"];
    echo $popis;
    echo $prevod;
    $sql = "INSERT INTO platba (idplatba,popis,prevod) VALUES(DEFAULT,'$popis', '$prevod')";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: administracePlatby.php');
    } else {
        echo "fail";
    }
}
?>