<?php
require_once '../config/connect.php';
$index = $_POST['index'];
$gost = $_POST['gost'];
$coefficient = $_POST['coefficient'];
$date = $_POST['date'];
$insert = "INSERT INTO `coefficients` (`id`, `ПОКАЗАТЕЛЬ`, `ГОСТ`, `КОЭФФИЦИЕНТ`, `ДАТА ОЧЕРЕДНОГО ПОСТРОЕНИЯ ГРАФИКА`) VALUES (NULL, '$index', '$gost', '$coefficient', '$date')";
mysqli_query($connect, $insert);
header("Location: ../coefficients.php");