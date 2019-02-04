<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");
$sql = "select * from vyrobce";
$result = mysqli_query($connect, $sql);
$json_arrry = array();
    $fp = fopen('php://output', 'w');
if ($fp && $result) {
    header('Content-Type: text/json');
    header('Content-Disposition: attachment; filename="export.json"');
    header('Pragma: no-cache');
    header('Expires: 0');
    while ($r = mysqli_fetch_assoc($result)) {
        $json_arrry[] = $r;
    }
    echo json_encode($json_arrry);
    die;
}
?>


