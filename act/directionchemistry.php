<?php
require_once 'config/connect.php';
$actnumber = $_GET['actnumber'];
$date = $_GET['date'];
$queryact = "SELECT * FROM `acts` WHERE `Номер акта отбора` = $actnumber AND `Дата поступления` = '$date'";
$act = mysqli_query($connect, $queryact);
$act = mysqli_fetch_assoc($act);
$samples = "SELECT * FROM `sampleswater` WHERE `Номер акта отбора` = $actnumber AND `Дата` = '$date' AND `Лаборатория` LIKE '%ф/х%'";
$samples = mysqli_query($connect, $samples);
$samples = mysqli_fetch_all($samples);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Акт отбора</title>
        <style>
            @media print{
                body{
                    visibility: hidden;
                }
                .print{
                    visibility: visible;
                }
            }
        </style>
        <link rel='stylesheet' href="style.css">
	</head>
	<body>
    <div id='wrapper'>
			<div class='content'>
                <input type='hidden' name='id' value="<?= $act['id'] ?>">
                <div class='print'>
                <p style="text-align: right;">Приложение 3</p> 
                <p style="text-align: right;">к приказу</p> 
                <p style="text-align: right;">Министерства здравоохранения</p> 
                <p style="text-align: right;">Республики Беларусь</p>
                <p style="text-align: right;">18.06.2012 г.  № 732</p>
                ГУ "Минский зональный ЦГиЭ"<br><br>
				<form action="<?= $_SERVER['SCRIPT_NAME'] ?>">
                <p style="text-align: center;"><b>Направление №:</b> <span name="actnumber"><u><?= $act['Номер акта отбора'] ?></u></span></p>
                <p style="text-align: center;">в лабораторию санитарно-химических и токсикологических методов исследования</p>
                <p style="text-align: center;">от <span name="date"><u><?= $act['Дата поступления'] ?></u></span></p>
                </form><br>
                Заказчик (наименование обекта): <u><?= $act['Заказчик'] ?></u><br><br>
                Место отбора образцов (адрес): <u><?= $act['Место отбора'] ?></u><br><br>
				Кем отобраны образцы: <u><?= $act['Кем отобраны пробы'] ?></u><br><br>
				Образцы отобраны в присутствии: <u><?= $act['В присутствии кого произведен отбор'] ?></u><br><br>
				Время: отбора <u><?= $act['Время отбора'] ?></u> доставки <u><?= $act['Время доставки'] ?></u><br><br>
                с целью контроля соответствия требованиям: <u><?= $act['Документы на соответствие'] ?></u><br><br>
                <table id='table' style='width:1200px;border:none;'>
				            <tr style='text-align:left'>
					            <th style='text-align:left;border:none;font-weight:normal;margin:-10px;'>Отбор образцов (проб) произведен в соответствии с требованиями:</th>
                            </tr>
				            <tr>
                                <?php 
                                    $chemistrygosts = "SELECT * FROM `gosts` WHERE `Назначение` LIKE 'отбор проб / вода' AND `Лаборатория` LIKE 'ф/х'";
                                    $chemistrygosts = mysqli_query($connect, $chemistrygosts);
                                    foreach ($chemistrygosts as $chemistrygost){
							        ?>
                                    <tr>	
					                <td style='text-align:left;border:none;'>-<?= $chemistrygost['Наименование ГОСТА'] ?></td>
                                    </tr>
							<?php
                            }
						    ?>
				</table><br>
                Дополнительные сведения: <u><?= $act['Дополнительные сведения'] ?></u><br><br>
                <table id='table'>
				    <tr>
                       <th>Идентификационный номер</th>
					   <th>Наименование проб</th>
					   <th>Объем пробы (л)</th>
                       <th>Проба отобрана в емкость:</th>
					   <th>Программа испытаний</th>
                    </tr>
				    <tr>
                        <?php
							foreach ($samples as $sample){
							?>	
								<tr>
					                <td><?= $sample[4] ?></td>
									<td><?= $sample[5] ?></td>
                                    <td>3,0л</td>
                                    <td>стеклянная тара</td>
                                    <td></td>
								</tr>
							<?php
							}
						?>
                    </tr>
				</table><br>
                Пробы принял: <u><?= $act['Должность'] ?> <?= $act['Пробы принял'] ?></u><br><br>
                </div>          
            <input type='submit' onclick='javascript:window.print()' value='Печать'>
            <a class='backmain' href='../index.php'>Перейти на главную страницу</a>
            </div>
    </div>
    </body>
</html>