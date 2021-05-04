<?php
require_once '../config/connect.php';
$actnumber = $_POST['actnumber'];
$date = $_POST['date'];
$customer = $_POST['customer'];
$place = $_POST['place'];
$selector = $_POST['selector'];
$present = $_POST['present'];
$selectiontime = $_POST['selectiontime'];
$deliverytime = $_POST['deliverytime'];
$target = $_POST['target'];
$additionally = $_POST['additionally'];
$position = $_POST['position'];
$workers = $_POST['workers'];
$insert = "INSERT INTO `acts` (`id`, `Номер акта отбора`, `Дата поступления`, `Заказчик`, `Место отбора`, `Кем отобраны пробы`, `В присутствии кого произведен отбор`, `Время отбора`, `Время доставки`, `Документы на соответсвие`, `Дополнительные сведения`, `Должность`, `Пробы принял`) VALUES (NULL, '$actnumber', '$date', '$customer', '$place', '$selector', '$present', '$selectiontime', '$deliverytime', '$target', '$additionally', '$position', '$workers')";
mysqli_query($connect, $insert);
header("Location: ../samples.php");