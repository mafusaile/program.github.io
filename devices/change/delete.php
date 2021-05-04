<?php
require_once '../config/connect.php';
$id = $_GET['id'];
$delete = "DELETE FROM `devices` WHERE `devices`.`id` = '$id'";
mysqli_query($connect, $delete);
header("Location: ../devices.php");