<?php
require_once 'config/connect.php';
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
            <div class='data' style='display:none'>
            <?php
                $actnumber = $_REQUEST['actnumber'];
                $date = $_REQUEST['date'];
                $selectacts = "SELECT * FROM `acts` WHERE `Номер акта отбора` = $actnumber AND `Дата поступления` = '$date'";
                $acts = mysqli_query($connect, $selectacts);
				$acts = mysqli_fetch_all($acts);
				foreach ($acts as $act){
							?>
            </div>
                <div class='print'>
                ГУ "Минский зональный ЦГиЭ"<br><br>
				<p style="text-align: center;"><b>Акт №:</b> <u><?= $act[1] ?></u></p>
                <p style="text-align: center;">отбора проб воды</p>
                <p style="text-align: center;">от <u><?= $act[2] ?></u></p>
                Заказчик (наименование обекта): <u><?= $act[3] ?></u><br><br>
                Место отбора образцов (адрес): <u><?= $act[4] ?></u><br><br>
				Кем отобраны образцы: <u><?= $act[5] ?></u><br><br>
				Образцы отобраны в присутствии: <u><?= $act[6] ?></u><br><br>
				Время отбора: <u><?= $act[7] ?></u><br><br>
				Время доставки в лабораторию: <u><?= $act[8] ?></u><br><br>
                с целью контроля соответствия требованиям: <u><?= $act[9] ?></u><br><br>
                <table id='table' style='width:1200px;border:none;'>
				            <tr style='text-align:left'>
					            <th style='text-align:left;border:none;font-weight:normal;margin:-10px;'>Отбор образцов (проб) произведен в соответствии с требованиями:</th>
                            </tr>
				            <tr>
                                <?php 
                                    $chemistry = $_REQUEST['chemistry'];
                                    $mb = $_REQUEST['mb'];
                                    $chemistrygosts = "SELECT * FROM `gosts` WHERE `Назначение` LIKE 'отбор проб / вода' AND `Лаборатория` LIKE '$chemistry'";
                                    $chemistrygosts = mysqli_query($connect, $chemistrygosts);
                                    foreach ($chemistrygosts as $chemistrygost){
							        ?>
                                    <tr>	
					                <td style='text-align:left;border:none;'><?= $chemistrygost['Наименование ГОСТА'] ?></td>
                                    </tr>
							<?php
                            }
						    ?>
                            </tr>
                            <tr>
                                <?php 
                                    $mb = $_REQUEST['mb'];
                                    $mbgosts = "SELECT * FROM `gosts` WHERE `Назначение` LIKE 'отбор проб / вода' AND `Лаборатория` LIKE '$mb'";
                                    $mbgosts = mysqli_query($connect, $mbgosts);
							        foreach ($mbgosts as $mbgost){
							        ?>
                                    <tr>	
					                <td style='text-align:left;border:none;'><?= $mbgost['Наименование ГОСТА'] ?></td>
                                    </tr>
							<?php
                            }
						    ?>
                            </tr>
				</table><br>
                Дополнительные сведения: <u><?= $act[10] ?></u><br><br>
                <table id='table'>
				    <tr>
                       <th>Идентификационный номер</th>
					   <th>Наименование проб</th>
					   <th>Объем пробы (л)</th>
                       <th>Проба отобрана в емкость:</th>
					   <th>Примечания</th>
                    </tr>
				    <tr>
                        <?php
                            $actnumber = $_REQUEST['actnumber'];
                            $date = $_REQUEST['date'];
                            $samples = "SELECT * FROM `sampleswater` WHERE `Номер акта отбора` = $actnumber AND `Дата` = '$date'";
						    $samples = mysqli_query($connect, $samples);
							$samples = mysqli_fetch_all($samples);
							foreach ($samples as $sample){
							?>	
								<tr>
					                <td><?= $sample[4] ?></td>
									<td><?= $sample[5] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
								</tr>
							<?php
							}
						?>
                    </tr>
				</table><br>
                Пробы принял: <u><?= $act[11].' '. $act[12] ?></u><br><br>
                </div>
                        <a href="update.php?id=<?=$act[0]?>">Изменить</a>
						<a href="change/delete.php?id=<?=$act[0]?>">Удалить</a>
                        <a href="directionchemistry.php?actnumber=<?=$act[1]?>&date=<?=$act[2]?>">Направление ф/х</a>
                        <a href="directionmb.php?actnumber=<?=$act[1]?>&date=<?=$act[2]?>">Направление м/б</a>
				<?php
				}
				?>            
            <input type='submit' onclick='javascript:window.print()' value='Печать'>
            <a class='backmain' href='../index.php'>Перейти на главную страницу</a>
            </div>
    </div><br>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" style='text-align:center'>
                    <input type='number' name="actnumber" placeholder='Номер акта'>
                    <input type='date' name="date" placeholder='Дата'>
                    <input type='checkbox' name="chemistry" value='ф/х'>ф/х
                    <input type='checkbox' name="mb" value='м/б'>м/б
					<input type='submit' value='Сформировать акт'>
	</form><br>
    </body>
</html>