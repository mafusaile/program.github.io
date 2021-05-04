<?php
require_once '../config/connect.php';
$id = $_POST['id'];
$index = $_POST['index'];
$gost = $_POST['gost'];
$coefficient = $_POST['coefficient'];
$date = $_POST['date'];
$update = "UPDATE `coefficients` SET `ПОКАЗАТЕЛЬ` = '$index', `ГОСТ` = '$gost', `КОЭФФИЦИЕНТ` = '$coefficient', `ДАТА ОЧЕРЕДНОГО ПОСТРОЕНИЯ ГРАФИКА` = '$date' WHERE `coefficients`.`id` = '$id'";
mysqli_query($connect, $update);
header("Location: ../coefficients.php");