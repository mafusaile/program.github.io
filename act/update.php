<?php
    require_once 'config/connect.php';
     $act_id = $_GET['id'];
     $queryact = "SELECT * FROM `acts` WHERE `id` = $act_id";
     $act = mysqli_query($connect, $queryact);
     $act = mysqli_fetch_assoc($act);
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
                <input type='hidden' name='id' value="<?= $act['id'] ?>">
                Акт №: <input type='number' name='actnumber' value="<?= $act['Номер акта отбора'] ?>"><br><br>
				Дата поступления: <input type='date' name='date' value="<?= $act['Дата поступления'] ?>"><br><br>
                Заказчик: <input type='text' name='customer' value="<?= $act['Заказчик'] ?>"><br><br>
                Место отбора: <input type='text' name='place' value="<?= $act['Место отбора'] ?>"><br><br>
				Кем отобраны образцы: <input type='text' name='selector' value="<?= $act['Кем отобраны пробы'] ?>"><br><br>
				Образцы отобраны в присутствии: <input type='text' name='present' value="<?= $act['В присутствии кого произведен отбор'] ?>"><br><br>
				Время отбора: <input type='time' name='selectiontime' value="<?= $act['Время отбора'] ?>">
				Время доставки в лабораторию: <input type='time' name='deliverytime' value="<?= $act['Время доставки'] ?>"><br><br>
                На соответствие требованиям: <input type='text' name='target' value="<?= $act['Документы на соответствие'] ?>"><br><br>
                Госты на отбор: <?php 
                                    $selectgosts = "SELECT * FROM `gosts` WHERE `Назначение` LIKE 'отбор проб'";
                                    $selectgost = mysqli_query($connect, $selectgosts);
                                    echo "<select class='select' name='selection' multiple>";
                                    while ($gost = mysqli_fetch_assoc($selectgost))
                                    {
                                    echo "<option value='" . $gost['Наименование ГОСТА'] . "'>" . $gost['Наименование ГОСТА'] . "</option>";
                                    }
                                    echo "</select>";
                                ?><br><br>
                Дополнительные сведения: <input type='text' name='additionally' value="<?= $act['Дополнительные сведения'] ?>"><br><br>
                Пробы принял:   <?php 
                                    $selectworkers = "SELECT * FROM `workers` WHERE `id` >= 1";
                                    $selectworker = mysqli_query($connect, $selectworkers);
                                    echo "<select class='select' name='position' multiple>";
                                    while ($worker = mysqli_fetch_assoc($selectworker)){
                                        echo "<option value='" . $worker['ДОЛЖНОСТЬ'] . "'>" . $worker['ДОЛЖНОСТЬ'] . "</option>";
                                    }
                                    echo "</select>";
                                ?>
                                <?php 
                                    $selectworkers = "SELECT * FROM `workers` WHERE `id` >= 1";
                                    $selectworker = mysqli_query($connect, $selectworkers);
                                    echo "<select class='select' name='workers' multiple>";
                                    while ($worker = mysqli_fetch_assoc($selectworker)){
                                        echo "<option value='" . $worker['ФИО'] . "'>" . $worker['ФИО'] . "</option>";
                                    }
                                    echo "</select>";
                                ?><br><br>              
			<input type='submit' value='Изменить'>
		</form>
    </body>
</html>