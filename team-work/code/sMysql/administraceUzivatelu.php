<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
?>
<!DOCTYPE html>
<html lang="cs">
    <?php
    include('../spolecne/panel.php');
    include('../spolecne/adminVsude.php');
    ?>
    <section>
        <div class="center-wrapper">
            <div class="flex-wrap">
                <div>
                    <h2>Uzivatele</h2>
                    <?php
                    $sql = "SELECT * FROM uzivatel";
                    $res = mysqli_query($connect, $sql);

                    echo '<table>

                        <tr>
                            <th>IdUzivatel</th>
                            <th>jmeno</th>
                            <th>prijmeni</th>
                            <th>email</th>
                            <th>adresa</th>
                            <th>admin</th>
                        </tr>';

                    while ($r = mysqli_fetch_assoc($res)) {
                        $userId = $r["iduzivatel"];
                        echo'<tr>

                            <td>' . $userId . '</td>
                            <td>' . $r["jmeno"] . '</td>
                            <td>' . $r["prijmeni"] . '</td>
                            <td>' . $r["email"] . '</td>
                            <td>' . $r["adresa"] . '</td>
                            <td>' . $r["admin"] . '</td>
                            <td><a href="upravaUzivatel.php?data=' . $userId . '" class="btn btn-primary" role="button">Uprav</a> </td>
                            <td><a href="../jenPHP/smazUzivatele.php?data=' . $userId . '" class="btn btn-primary" role="button">&nbsp;Odeber</a> </td>
                            <td><a href="zmenHesloUzivatele.php?data=' . $userId . '" class="btn btn-primary" role="button">&nbsp;Reset Hesla</a> </td>
                        </tr>';
                    }
                    echo '</table>';
                    ?>
                    <a href=pridejUzivatele.php class="btn btn-primary" role="button">&nbsp;pridej</a>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('../spolecne/konecStranky.php')
    ?>
</html>

