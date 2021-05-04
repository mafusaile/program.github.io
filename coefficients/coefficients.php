<?php
	 require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Коэффициенты</title>
	    <link rel='stylesheet' href="style.css">
	</head>
	<body>
    <div id='wrapper'>
	<a class='backmain' href='../index.php'>Перейти на главную страницу</a><br><br>
			<div class='coefficients'>
                <table id='table'>
				    <tr>
					   <th>Показатель</th>
					   <th>ГОСТ</th>
					   <th>Коэффициент</th>
					   <th>Дата очередного построения графика</th>
					   <th>Изменить</th>
					   <th>Удалить</th>
                    </tr>
				    <tr>
						<?php
						    $coefficients = mysqli_query($connect, $query);
							$coefficients = mysqli_fetch_all($coefficients);
							foreach ($coefficients as $coefficient){
							?>	
								<tr>
					                <td><?= $coefficient[1] ?></td>
									<td><?= $coefficient[2] ?></td>
									<td><?= $coefficient[3] ?></td>
									<td><?= $coefficient[4] ?></td>
									<td><a href="update.php?id=<?=$coefficient[0]?>">Изменить</a></td>
									<td><a href="change/delete.php?id=<?=$coefficient[0]?>">Удалить</a></td>
								</tr>
							<?php
							}
						?>
                    </tr>
				</table><br>
				<h3>Добавление нового прибора:</h3>
				<form action='change/create.php' method='post'>
                    <input type='text' name="index" placeholder='Показатель'>
					<input type='text' name="gost" placeholder='ГОСТ'>
					<input type='text' name="coefficient" placeholder='Коэффициент'>
					<input type='date' name="date" placeholder='Дата очередного построения графика'>
					<input type='submit' value='Добавить'>
				</form>
			</div>
    </body>
</html>