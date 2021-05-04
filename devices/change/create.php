<?php
require_once '../config/connect.php';
$device = $_POST['device'];
$factorynumber = $_POST['factorynumber'];
$verificationdate = $_POST['verificationdate'];
$certificate = $_POST['certificate'];
$insert = "INSERT INTO `devices` (`id`, `Наименование оборудования`, `Заводской номер`, `Дата очередной поверки`, `№ свидетельства (аттестата)`) VALUES (NULL, '$device', '$factorynumber', '$verificationdate', '$certificate')";
mysqli_query($connect, $insert);
header("Location: ../devices.php");