<?php
require_once '../config/connect.php';
$id = $_POST['id'];
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
$update = "UPDATE `acts` SET `Номер акта отбора` = '$actnumber', `Дата поступления` = '$date', `Заказчик` = '$customer', `Место отбора` = '$place', `Кем отобраны пробы` = '$selector', `В присутствии кого произведен отбор` = '$present', `Время отбора` = '$selectiontime', `Время доставки` = '$deliverytime', `Документы на соответсвие` = '$target', `Дополнительные сведения` = '$additionally', `Должность` = '$position', `Пробы принял` = '$workers' WHERE `acts`.`id` = $id";
mysqli_query($connect, $update);
header("Location: ../selectionact.php");