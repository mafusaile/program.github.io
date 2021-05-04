<?php
    require_once 'config/connect.php';
     $device_id = $_GET['id'];
     $querydevice = "SELECT * FROM `devices` WHERE `id` = $device_id";
     $device = mysqli_query($connect, $querydevice);
     $device = mysqli_fetch_assoc($device);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Изменение</title>
	    <link rel='stylesheet' href="style.css">
	</head>
	<body>
        <h3>Изменить данные:</h3>
        <form action='change/update.php' method='post'>
            <input type='hidden' name='id' value="<?= $device['id'] ?>">
            <input type='text' name='device' value="<?= $device['Наименование оборудования'] ?>">
			<input type='text' name='factorynumber' value="<?= $device['Заводской номер'] ?>">
            <input type='text' name='verificationdate' value="<?= $device['Дата очередной поверки'] ?>">
            <input type='text' name='certificate' value="<?= $device['№ свидетельства (аттестата)'] ?>">
			<input type='submit' value='Изменить'>
		</form>
    </body>
</html>