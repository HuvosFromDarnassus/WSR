<?php
require_once("../WSR/php/connect_db.php");

if (isset($_POST['create'])) {
  header("Location: ../index.php");
  createData();
  exit();
}

function createData() {

  $newsTitle = textboxValue("news_title");
  $newsText = textboxValue("news_text");

  if($newsTitle && $newsText) {

      $sql = "INSERT INTO news (news_title, news_text) VALUES ('$newsTitle', '$newsText')";

      if (mysqli_query($GLOBALS['con'], $sql)) {
          echo("Запись успешно добавлена");
      } else {
        echo("Ошибка записи в таблицу");
      }

  } else {
    echo("Заполните поля ввода");
  }
}

function textboxValue($value) {
  $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
  if(empty($textbox)) {
      return false;
  } else {
      return $textbox;
  }
}
