<!-- ПОДЛКЮЧЕНИЕ К БД, СОЗДАНИЕ ТАБЛИЦЫ -->

<?php

$serverName = 'localhost';
$userName = 'root';
$password = 'root';
$dbName = 'WSR';

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$con) {
  die("Подключение к серверу не удалось!" . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (mysqli_query($con, $sql)) {
  $con = mysqli_connect($serverName, $userName, $password, $dbName);

  $sql = "
          CREATE TABLE IF NOT EXISTS news(
              id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
              news_title VARCHAR(200) NOT NULL,
              news_date DATETIME  NOT NULL,
              news_text VARCHAR(500) NOT NULL
          );
  ";

  if (mysqli_query($con, $sql)) {
    return $con;
  } else {
    echo("Ошибка создания таблицы");
  }


} else {
  echo("Ошибка создания базы данных" . mysqli_error($con));
}
