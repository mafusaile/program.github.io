<?php
require_once '../config/connect.php';
$actnumber = $_POST['actnumber'];
$samplenumber = $_POST['samplenumber'];
$samplename = $_POST['samplename'];
$date = $_POST['date'];
$laboratory = $_POST['laboratory'];
$insert = "INSERT INTO `samples` (`id`, `Номер акта отбора`, `Дата`, `Лаборатория`, `Идентификационный номер`, `Наименование пробы`) VALUES (NULL, '$actnumber', '$date', '$laboratory', '$samplenumber', '$samplename')";
mysqli_query($connect, $insert);
header("Location: ../samples.php");