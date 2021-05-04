<?php
    require_once 'config/connect.php';
     $gost_id = $_GET['id'];
     $querygost = "SELECT * FROM `gosts` WHERE `id` = $gost_id";
     $gost = mysqli_query($connect, $querygost);
     $gost = mysqli_fetch_assoc($gost);
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
            <input type='hidden' name='id' value="<?= $gost['id'] ?>">
            <input type='text' name='gostname' value="<?= $gost['Наименование ГОСТА'] ?>">
			<input type='text' name='appointment' value="<?= $gost['Назначение'] ?>">
            <input type='text' name='index' value="<?= $gost['Показатель'] ?>">
            <input type='text' name='laboratory' value="<?= $gost['Лаборатория'] ?>">
			<input type='submit' value='Изменить'>
		</form>
    </body>
</html>