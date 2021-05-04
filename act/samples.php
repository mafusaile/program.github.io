<?php
require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Пробы</title>
        <link rel='stylesheet' href="style.css">
	</head>
	<body>
    <div id='wrapper'>
			<a class='backmain' href='../index.php'>Перейти на главную страницу</a>
			<div class='content'>
			<h3>Добавление новой пробы:</h3>
            <form action='change/createsample.php' method='post'>
                    <input type='number' name="actnumber" class='short' placeholder='Номер акта'>
					<input type='date' name="date" placeholder='Дата'>
					<input type='text' name="laboratory" class='short' placeholder='Лаборатория'>
                    <input type='number' name="samplenumber" class='short' placeholder='Идентификационный номер'>
					<input type='text' name="samplename" placeholder='Наименование образца'>
					<input type='submit' value='Добавить'>
				</form><br>
				<a href="selectionact.php">Сформировать акт отбора</a>
            </div>
    </div>
    </body>
</html>