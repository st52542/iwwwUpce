<form method="post" action="" >

    <table>

        <tr>
            <th>popis</th>
            <th>cena</th>
        </tr>
        <tr>
            <td><input type="text" name="popis"></td>
            <td><input type="text" name="cena" > </td>
            <td><input type="submit" name="proved" value="proved"></td>

        </tr>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
    $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $popis = $_POST["popis"];
    $cena = $_POST["cena"];
    echo $popis;
    echo $cena;
    $sql = "INSERT INTO doprava (iddoprava,popis,cena) VALUES(DEFAULT,'$popis', '$cena')";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: administraceDopravy.php');
    } else {
        echo "fail";
    }
}
?>