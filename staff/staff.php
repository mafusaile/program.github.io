<?php
	 require_once 'config/connect.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Сотрудники</title>
	    <link rel='stylesheet' href="style.css">
	</head>
	<body>
    <div id='wrapper'>
			<a class='backmain' href='../index.php'>Перейти на главную страницу</a>
			<div class='staff'>
			<h3>Добавление нового акта:</h3>
			<form action='change/create.php' method='post'>
                    <input type='text' name="position" placeholder='Должность'>
					<input type='text' name="fullname" placeholder='ФИО'>
					<input type='submit' value='Добавить'>
				</form><br>
                <table id='table'>
				    <tr>
                       <th>Должность</th>
					   <th>ФИО</th>
					   <th>Изменить</th>
					   <th>Удалить</th>
                    </tr>
				    <tr>
						<?php
						    $workers = mysqli_query($connect, $query);
							$workers = mysqli_fetch_all($workers);
							foreach ($workers as $worker){
							?>	
								<tr>
					                <td><?= $worker[1] ?></td>
									<td><?= $worker[2] ?></td>
									<td><a href="update.php?id=<?=$worker[0]?>">Изменить</a></td>
									<td><a href="change/delete.php?id=<?=$worker[0]?>">Удалить</a></td>
								</tr>
							<?php
							}
						?>
                    </tr>
				</table><br>
			</div>
    </body>
</html>