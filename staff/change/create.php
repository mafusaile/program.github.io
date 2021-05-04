<?php
require_once '../config/connect.php';
$position = $_POST['position'];
$fullname = $_POST['fullname'];
$insert = "INSERT INTO `workers` (`id`, `ДОЛЖНОСТЬ`, `ФИО`) VALUES (NULL, '$position', '$fullname')";
mysqli_query($connect, $insert);
header("Location: ../staff.php");