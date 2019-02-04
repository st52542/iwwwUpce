<form method="post" action="" >

    <table>

        <tr>
            <th>popis</th>
        </tr>
        <tr>
            <td><input type="text" name="popis"></td>
            <td><input type="submit" name="proved" value="proved"></td>

        </tr>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
    $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $popis = $_POST["popis"];
    echo $popis;
    echo $cena;
    $sql = "INSERT INTO typ (idtyp,popis) VALUES(DEFAULT,'$popis')";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: administraceTypu.php');
    } else {
        echo "fail";
    }
}
?>