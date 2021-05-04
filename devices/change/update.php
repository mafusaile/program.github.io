<?php
require_once '../config/connect.php';
$id = $_POST['id'];
$device = $_POST['device'];
$factorynumber = $_POST['factorynumber'];
$verificationdate = $_POST['verificationdate'];
$certificate = $_POST['certificate'];
$update = "UPDATE `devices` SET `Наименование оборудования` = '$device', `Заводской номер` = '$factorynumber', `Дата очередной поверки` = '$verificationdate', `№ свидетельства (аттестата)` = '$certificate' WHERE `devices`.`id` = '$id'";
mysqli_query($connect, $update);
header("Location: ../devices.php");