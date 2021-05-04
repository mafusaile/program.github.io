<?php
$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
$user = 'root'; //имя пользователя, по умолчанию это root
$password = 'root'; //пароль, по умолчанию пустой
$db_name = 'registration'; //имя базы данных
$connect = mysqli_connect($host, $user, $password, $db_name);
	 if(!$connect){
		 echo 'Error';
	 }
$query = "SELECT * FROM workers";