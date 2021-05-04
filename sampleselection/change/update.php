<?php
require_once '../config/connect.php';
$id = $_POST['id'];
$gostname = $_POST['gostname'];
$appointment = $_POST['appointment'];
$index = $_POST['index'];
$laboratory = $_POST['laboratory'];
$update = "UPDATE `gosts` SET `Наименование ГОСТА` = '$gostname', `Назначение` = '$appointment', `Показатель` = '$index', `Лаборатория` = '$laboratory' WHERE `gosts`.`id` = '$id'";
mysqli_query($connect, $update);
header("Location: ../sampleselection.php");