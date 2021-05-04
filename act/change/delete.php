<?php
require_once '../config/connect.php';
$id = $_GET['id'];
$delete = "DELETE FROM `acts` WHERE `acts`.`id` = '$id'";
mysqli_query($connect, $delete);
header("Location: ../selectionact.php");