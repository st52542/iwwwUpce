<?php
$connect = mysqli_connect("localhost", "root", "", "semestralka");  
$file=fopen("vyrobciImport.csv","r");
while(($getData=fgetcsv($file,1000,","))!=FALSE){
    $sql= "INSERT INTO vyrobce(idvyrobce,nazev,adresa,popis)
VALUES (DEFAULT,'$getData[0]','$getData[1]','$getData[2]')";
    $result=mysqli_query($connect,$sql);
}
fclose($file);
header('location: ../zbytek/administrace.php');
?>