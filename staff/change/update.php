<?php
require_once '../config/connect.php';
$id = $_POST['id'];
$position = $_POST['position'];
$fullname = $_POST['fullname'];
$update = "UPDATE `workers` SET `ДОЛЖНОСТЬ` = '$position', `ФИО` = '$fullname' WHERE `workers`.`id` = '$id'";
mysqli_query($connect, $update);
header("Location: ../staff.php");