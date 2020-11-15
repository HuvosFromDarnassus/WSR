<!-- ЗАНЕСЕНИЕ ДАННЫХ В БД, ОТОБРАЖНИЕ МОДАЛЬНОГО ОКНА -->

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

function printNewsModal() {
  echo('<section class="modal-news-admin admin-show">
      <h2 class="news-admin-title">Добавить новость</h2>
      <form class="news-admin-form" method="POST">
        <label class="news-admin-input visually-hidden" for="title-edit-input visually-hidden">Заголовок</label>
        <input class="news-admin-title-input" name="news_title" type="text" id="title-edit-input" placeholder="Заголовок новости">

        <label class="news-admin-input visually-hidden" for="text-edit-area visually-hidden">Текст</label>
        <textarea class="news-admin-text-area" name="news_text" id="text-edit-area" cols="50" rows="10" placeholder="Текст новости"></textarea>

        <button class="news-admin-button" name="create" type="submit">Подтвердить</button>
        <button class="modal-admin-close-button" type="button"><span class="visually-hidden">Закрыть</span></button>
      </form>
    </section>');
}
