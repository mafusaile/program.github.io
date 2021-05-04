<?php
require_once '../config/connect.php';
$id = $_GET['id'];
$delete = "DELETE FROM `gosts` WHERE `gosts`.`id` = '$id'";
mysqli_query($connect, $delete);
header("Location: ../sampleselection.php");