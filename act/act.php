<?php
require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Акт отбора</title>
        <link rel='stylesheet' href="style.css">
	</head>
	<body>
    <div id='wrapper'>
			<div class='content'>
            <form action='change/createact.php' method='post'>
				Акт №: <input type='number' name='actnumber' class='short'><br><br>
				Дата поступления: <input type='date' name='date'><br><br>
                Заказчик: <input type='text' name='customer' class='long'><br><br>
                Место отбора: <input type='text' name='place' class='long'><br><br>
				Кем отобраны образцы: <input type='text' name='selector' class='long'><br><br>
				Образцы отобраны в присутствии: <input type='text' name='present' class='long'><br><br>
				Время отбора: <input type='time' name='selectiontime'>
				Время доставки в лабораторию: <input type='time' name='deliverytime'><br><br>
                Дополнительные сведения: <input type='text' name='additionally' class='long'><br><br>
                Пробы принял:   <?php 
                                    $selectworkers = "SELECT * FROM `workers` WHERE `id` >= 1";
                                    $selectworker = mysqli_query($connect, $selectworkers);
                                    echo "<select class='select' name='position'>";
                                    while ($worker = mysqli_fetch_assoc($selectworker)){
                                        echo "<option value='" . $worker['ДОЛЖНОСТЬ'] . "'>" . $worker['ДОЛЖНОСТЬ'] . "</option>";
                                    }
                                    echo "</select>";
                                ?>
                                <?php 
                                    $selectworkers = "SELECT * FROM `workers` WHERE `id` >= 1";
                                    $selectworker = mysqli_query($connect, $selectworkers);
                                    echo "<select class='select' name='workers'>";
                                    while ($worker = mysqli_fetch_assoc($selectworker)){
                                        echo "<option value='" . $worker['ФИО'] . "'>" . $worker['ФИО'] . "</option>";
                                    }
                                    echo "</select>";
                                ?><br><br>              
            <input type='submit' value='Добавить пробы'>
            <a class='backmain' href='../index.php'>Перейти на главную страницу</a>
            </form> 
            </div>
    </div>
    </body>
</html>