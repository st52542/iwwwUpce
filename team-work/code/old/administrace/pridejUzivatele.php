<form method="post" action="" >

    <table>

        <tr>
            <th>jmeno</th>
            <th>prijmeni</th>
            <th>email</th>
            <th>adresa</th>
            <th>heslo</th>
            <th>admin</th>
        </tr>
        <tr>
            <td><input type="text" name="jmeno"></td>
            <td><input type="text" name="prijmeni" > </td>
            <td><input type="text" name="email"> </td>
            <td><input type="text" name="adresa"> </td>
            <td><input type="text" name="heslo"> </td>
            <td><input type="text" name="admin"> </td>
            <td><input type="submit" name="proved" value="proved"></td>

        </tr>

    </table>
</form>

<?php
if (isset($_POST['proved'])) {
    $connect = mysqli_connect("localhost", "root", "", "semestralka");
    $jmeno = $_POST["jmeno"];
    $prijmeni = $_POST["prijmeni"];
    $email = $_POST["email"];
    $adresa = $_POST["adresa"];
    $heslo = mysqli_real_escape_string($connect, $_POST["heslo"]);
    $heslo = md5($heslo);
    $admin = $_POST["admin"];
    echo $jmeno;
    echo $prijmeni;
    echo $email;
    echo $adresa;
    echo $heslo;
    echo $admin;
    $sql = "INSERT INTO uzivatel (iduzivatel,jmeno,prijmeni,email,heslo,adresa,admin) VALUES(DEFAULT,'$jmeno', '$prijmeni','$email','$heslo','$adresa',$admin)";
    if (mysqli_query($connect, $sql)) {
        echo "successful";
        header('location: .\administraceUzivatelu.php');
    } else {
        echo "fail";
    }
}
?>