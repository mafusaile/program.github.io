<?php
	 require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Оборудование</title>
	    <link rel='stylesheet' href="style.css">
	</head>
	<body>
    <div id='wrapper'>
	<a class='backmain' href='../index.php'>Перейти на главную страницу</a><br><br>
			<div class='device'>
                <table id='table'>
				    <tr>
                       <th>Номер</th>
					   <th>Наименование оборудования</th>
					   <th>Заводской номер</th>
					   <th>Дата очередной поверки</th>
					   <th>№ свидетельства (аттестата)</th>
					   <th>Изменить</th>
					   <th>Удалить</th>
                    </tr>
				    <tr>
						<?php
						    $devices = mysqli_query($connect, $query);
							$devices = mysqli_fetch_all($devices);
							foreach ($devices as $device){
							?>	
								<tr>
								    <td><?= $device[0] ?></td>
					                <td><?= $device[1] ?></td>
									<td><?= $device[2] ?></td>
									<td><?= $device[3] ?></td>
									<td><?= $device[4] ?></td>
									<td><a href="update.php?id=<?=$device[0]?>">Изменить</a></td>
									<td><a href="change/delete.php?id=<?=$device[0]?>">Удалить</a></td>
								</tr>
							<?php
							}
						?>
                    </tr>
				</table><br>
				<h3>Добавление нового прибора:</h3>
				<form action='change/create.php' method='post'>
                    <input type='text' name="device" placeholder='Наименование оборудования'>
					<input type='text' name="factorynumber" placeholder='Заводской номер'>
					<input type='text' name="verificationdate" placeholder='Дата очередной поверки'>
					<input type='text' name="certificate" placeholder='№ свидетельства (аттестата)'>
					<input type='submit' value='Добавить'>
				</form>
			</div>
    </body>
</html>