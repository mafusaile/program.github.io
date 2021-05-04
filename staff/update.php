<?php
    require_once 'config/connect.php';
     $worker_id = $_GET['id'];
     $queryworker = "SELECT * FROM `workers` WHERE `id` = $worker_id";
     $worker = mysqli_query($connect, $queryworker);
     $worker = mysqli_fetch_assoc($worker);
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
            <input type='hidden' name='id' value="<?= $worker['id'] ?>">
            <input type='text' name='position' value="<?= $worker['ДОЛЖНОСТЬ'] ?>">
			<input type='text' name='fullname' value="<?= $worker['ФИО'] ?>">
			<input type='submit' value='Изменить'>
		</form>
    </body>
</html>