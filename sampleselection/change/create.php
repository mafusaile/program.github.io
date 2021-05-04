<?php
require_once '../config/connect.php';
$gostname = $_POST['gostname'];
$appointment = $_POST['appointment'];
$index = $_POST['index'];
$laboratory = $_POST['laboratory'];
$insert = "INSERT INTO `gosts` (`id`, `Наименование ГОСТА`, `Назначение`, `Показатель`, `Лаборатория`) VALUES (NULL, '$gostname', '$appointment', '$index', '$laboratory')";
mysqli_query($connect, $insert);
header("Location: ../sampleselection.php");