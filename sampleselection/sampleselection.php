<?php
	 require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ГОСТЫ</title>
	    <link rel='stylesheet' href="style.css">
	</head>
	<body>
    <div id='wrapper'>
	<a class='backmain' href='../index.php'>Перейти на главную страницу</a>
			<div class='gosts'>
			<h3>Добавление нового ГОСТА:</h3>
				<form action='change/create.php' method='post'>
                    <input type='text' name="gostname" placeholder='Наименование ГОСТа'>
					<input type='text' name="appointment" placeholder='Назначение'>
					<input type='text' name="index" placeholder='Показатель'>
					<input type='text' name="laboratory" placeholder='Лаборатория'>
					<input type='submit' value='Добавить'>
				</form><br><br>
                <table id='table'>
				    <tr>
					   <th>Наименование ГОСТа</th>
					   <th>Назначение</th>
					   <th>Показатель</th>
					   <th>Лаборатория</th>
					   <th>Изменить</th>
					   <th>Удалить</th>
                    </tr>
				    <tr>
						<?php
						    $gosts = mysqli_query($connect, $query);
							$gosts = mysqli_fetch_all($gosts);
							foreach ($gosts as $gost){
							?>	
								<tr>
					                <td><?= $gost[1] ?></td>
									<td><?= $gost[2] ?></td>
									<td><?= $gost[3] ?></td>
									<td><?= $gost[4] ?></td>
									<td><a href="update.php?id=<?=$gost[0]?>">Изменить</a></td>
									<td><a href="change/delete.php?id=<?=$gost[0]?>">Удалить</a></td>
								</tr>
							<?php
							}
						?>
                    </tr>
				</table><br>
			</div>
    </body>
</html>