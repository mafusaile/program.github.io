<?php
require_once '../config/connect.php';
$id = $_GET['id'];
$delete = "DELETE FROM `coefficients` WHERE `coefficients`.`id` = '$id'";
mysqli_query($connect, $delete);
header("Location: ../coefficients.php");