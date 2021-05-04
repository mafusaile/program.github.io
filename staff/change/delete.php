<?php
require_once '../config/connect.php';
$id = $_GET['id'];
$delete = "DELETE FROM `workers` WHERE `workers`.`id` = '$id'";
mysqli_query($connect, $delete);
header("Location: ../staff.php");