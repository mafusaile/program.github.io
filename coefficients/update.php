<?php
    require_once 'config/connect.php';
     $coefficient_id = $_GET['id'];
     $querycoefficient = "SELECT * FROM `coefficients` WHERE `id` = $coefficient_id";
     $coefficient = mysqli_query($connect, $querycoefficient);
     $coefficient = mysqli_fetch_assoc($coefficient);
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
            <input type='hidden' name='id' value="<?= $coefficient['id'] ?>">
            <input type='text' name="index" value="<?= $coefficient['ПОКАЗАТЕЛЬ'] ?>">
			<input type='text' name="gost" value="<?= $coefficient['ГОСТ'] ?>">
			<input type='text' name="coefficient" value="<?= $coefficient['КОЭФФИЦИЕНТ'] ?>">
			<input type='date' name="date" value="<?= $coefficient['ДАТА ОЧЕРЕДНОГО ПОСТРОЕНИЯ ГРАФИКА'] ?>">
			<input type='submit' value='Изменить'>
		</form>
    </body>
</html>