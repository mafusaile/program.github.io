<?php
require_once '../config/connect.php';
$actnumber = $_POST['actnumber'];
$selectacts = "SELECT * FROM `acts` WHERE `Номер акта отбора` = $actnumber";
header("Location: ../selectionact.php");