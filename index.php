<?php
  // ИМПОРТ ДРУГИХ ДОКУМЕНТОВ

  require_once("../WSR/php/connect_db.php");
  require_once("../WSR/php/news_add.php");
?>

<!DOCTYPE html>
<html lang="ru" class="page">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/normalize.min.css">
  <link rel="stylesheet" href="css/style.min.css">
  <title>Главная</title>
</head>

<body class="page-body">

  <!--=== Header ===-->
  <header class="header">
    <div class="header-top-wrapper container">
      <div class="header-logo-slogan-wrapper">
        <a class="header-logo-link" href="index.php"><img class="logo-img" src="img/Logo.png" alt="Логотип-Portal FOTO"
            width="203" height="56" /></a>
        <h1 class="header-main-slogan">профессиональная фототехника</h1>
      </div>

      <div class="contacts-login-wrapper">
        <div class="header-contacts-days-wrapper">
          <h2 class="contacts-days-title visually-hidden">Как связаться и дни работы</h2>
          <p class="header-contacts">
            <a class="contacts-tel-link" href="tel:+74959848271">+7(495)984-82-71</a><br>
            <a class="contacts-tel-link" href="tel:+74959026095">+7(495)902-60-95</a>
          </p>
          <p class="header-weekdays">Пн-Пт: с 10:00 до 19:00</p>
          <p class="header-weekdays">Сб-Вс: Выходной</p>
        </div>

        <div class="header-login-wrapper">
          <a class="login-link" href="">Вход с паролем</a>
          <a class="signin-link" href="">Регистрация</a><br>
          <a class="cart-link" href="">Моя корзина</a>
          <p class="products-counter">Товары: 0 шт.</p>
        </div>
      </div>

      <button class="modal-login-open-button" type="button"><span class="visually-hidden">login</span></button>
      <button class="modal-menu-open-button" type="button"><span class="visually-hidden">меню</span></button>
    </div>

    <div class="header-bottom-wrapper">
      <nav class="main-nav container">
        <ul class="list-reset main-nav-list">
          <li class="main-nav-item"><a class="main-nav-link" href="news.php">Новости</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="">О компании</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="">Оплата</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="">В кредит</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="">Доставка</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="">Гарантии</a></li>
          <li class="main-nav-item"><a class="main-nav-link" href="">Контакты</a></li>
        </ul>
        <form class="main-search-form ">
          <label class="visually-hidden" for="main-search">Поиск</label>
          <input class="main-search" type="text" id="main-search" placeholder="Название модели, раздела">
          <button class="main-search-button" type="submit">Найти</button>
        </form>
        <a class="mobile-cart-link" href=""><span class="visually-hidden">Моя корзина</span></a>
      </nav>
    </div>


  </header>

  <!--=== Main ===-->
  <main class="main container">

    <!-- Секция категорий -->
    <section class="products-categories">
      <h2 class="product-categories-title visually-hidden">Типы товаров</h2>
      <ul class="product-categories-list">
        <li class="product-categories-item active-category"><a class="product-categories-link"
            href="index.html">Фототехника</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="category-cameras.html">Цифровые
            фотоаппараты</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="category-lens.html">Объективы</a>
        </li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Фотоспышки</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Светофильтры</a></li>
        <li class="product-categories-item"><a class="product-categories-link"
            href="category-photo-bags.html">Фотосумки</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Штативы,
            моноподы</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Карты
            памяти</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Накамерный
            свет LED</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Микрофоны
            выносные</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Калибраторы и
            шкалы</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Подводные
            боксы</a></li>
        <li class="product-categories-item"><a class="product-categories-link" href="">Аксессуары и
            опции</a></li>
      </ul>

      <aside class="aside-advertisement">
        <a class="aside-advertisement-link" href=""><span class="visually-hidden">Баннер: Купить в
            кредит не выходя из
            дома</span></a>
      </aside>
    </section>

    <!-- Новостной блок -->
    <aside class="news-aside">
      <h2 class="news-main-title title">Новости</h2>

      <form class="news-search-form">
        <label class="visually-hidden" for="news-search">Поиск новостей:</label>
        <input class="news-search" type="text" id="news-search" placeholder="Новость">
        <button class="button news-search-button" type="submit">Найти</button>
      </form>

      <ul class="list-reset news-list">
        <li class="news-item add-news-item">
          <button class="add-news-button">Добавить новость</button>
        </li>

        <!--=== ВЫВОД НОВОСТЕЙ ИЗ БД ===-->
        <?php
          $result = mysqli_query($con, "SELECT * FROM news ORDER BY `id` DESC");
          $myrow = mysqli_fetch_assoc($result);

          do {
            printf('<li class="news-item">
                      <article class="news-body">
                        <div class="news-body-top">
                          <h3 class="news-title">%s</h3>
                          <time class="news-pubdate" datetime="2020-11-05">%s</time>
                        </div>
                        <p class="news-text">%s</p>
                      </article>
                    </li>',
                    $myrow['news_title'],
                    date('d F', strtotime($myrow['news_date'])),
                    $myrow['news_text']
              );
          } while ($myrow = mysqli_fetch_assoc($result));
        ?>
      </ul>
    </aside>

    <!-- Баннер -->
    <aside class="popular-producers-banner">
      <a class="popular-producers-link" href=""><img src="img/banner-img.jpg" alt="Баннер: Компания Bowens"></a>
    </aside>

    <!-- Секция товаров - "Новинки" -->
    <section class="products-novelty">
      <div class="title-wrapper">
        <h2 class="products-novelty-title title">Новинки</h2>

        <a class="all-link" href=""><span class="all-link-icon">🗎</span>все</a>
      </div>

      <ul class="list-reset products-novelty-list">
        <li class="products-novelty-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Meikon Sony A6000 16-50 подводный бокс для Sony Alpha A6000
                  Kit + 16-50</h3>
              </a>
              <ins class="product-price">27 200 <span class="product-price-currency">руб.</span></ins>
              <p class="product-supply-number">Товар №E7361 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-1.jpg" width="82" height="82"
                alt="Товар Meikon Sony A6000 16-50 подводный бокс для Sony Alpha A6000 Kit + 16-50">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
        <li class="products-novelty-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Meikon Sony A7/7R/7S 28-70 подводный бокс для Sony Alpha
                  A7/7R/7S Kit + 28-70
                </h3>
              </a>
              <ins class="product-price">27 200 <span class="product-price-currency">руб.</span></ins>
              <p class="product-supply-number">Товар №E7362 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-2.jpg" width="82" height="82"
                alt="Товар Meikon Sony A7/7R/7S 28-70 подводный бокс для Sony Alpha A7/7R/7S Kit + 28-70">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
        <li class="products-novelty-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Meikon Olympus E-M1 12-40 подводный бокс</h3>
              </a>
              <ins class="product-price">24 480 <span class="product-price-currency">руб.</span></ins>
              <p class="product-supply-number">Товар №E7363 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-3.jpg" width="82" height="82"
                alt="Товар Meikon Olympus E-M1 12-40 подводный бокс">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
        <li class="products-novelty-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Carl Zeiss Otus 1.4/85 ZE объектив для Canon</h3>
              </a>
              <ins class="product-price">337 500 <span class="product-price-currency">руб.</span></ins>
              <p class="product-supply-number">Товар №E7547 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-4.jpg" width="82" height="82"
                alt="Товар Carl Zeiss Otus 1.4/85 ZE объектив для Canon">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
        <li class="products-novelty-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Meikon Sony RX-100 III подводный бокс</h3>
              </a>
              <ins class="product-price">27 200 <span class="product-price-currency">руб.</span></ins>
              <p class="product-supply-number">Товар №E7594 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-5.jpg" width="82" height="82"
                alt="Товар Meikon Sony RX-100 III подводный бокс">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
        <li class="products-novelty-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Meikon G!1x Mark II подводный бокс для Canon Powershot G1x
                  Mark II (WP-DC53)
                </h3>
              </a>
              <ins class="product-price">27 200 <span class="product-price-currency">руб.</span></ins>
              <p class="product-supply-number">Товар №E7733 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-6.jpg" width="82" height="82"
                alt="Товар Meikon G!1x Mark II подводный бокс для Canon Powershot G1x Mark II (WP-DC53)">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
      </ul>
    </section>

    <!-- Секция товаров - "Лучшая цена" -->
    <section class="products-best-price">
      <div class="title-wrapper">
        <h2 class="products-best-price-title title">Лучшая цена</h2>
        <a class="all-link" href=""><span class="all-link-icon">🗎</span>все</a>
      </div>

      <ul class="list-reset products-best-price-list">
        <li class="best-price-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Carl Zeiss Makro-Planar T* 100 mm f/2 ZE (Canon) объектив
                </h3>
              </a>
              <ins class="product-price">139 400 руб.</ins>
              <p class="product-supply-number">Товар №E4402 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-7.jpg" width="82" height="82"
                alt="Товар Carl Zeiss Makro-Planar T* 100 mm f/2 ZE (Canon) объектив">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
        <li class="best-price-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Sigma AF 35mm f/1.4 DG HSM Art для Canon</h3>
              </a>
              <ins class="product-price">59 900 руб.</ins>
              <p class="product-supply-number">Товар №E6427 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-8.jpg" width="82" height="82"
                alt="Товар Sigma AF 35mm f/1.4 DG HSM Art для Canon">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
        <li class="best-price-item">
          <article class="product-card">
            <div class="product-info-wrapper">
              <a class="product-title-link" href="">
                <h3 class="product-title">Sony Alpha A7R Body</h3>
              </a>
              <ins class="product-price">97 900 руб.</ins>
              <p class="product-supply-number">Товар №E7234 Склад</p>
            </div>
            <div class="img-button-wrapper">
              <img class="product-img" src="img/product-img-9.jpg" width="82" height="82"
                alt="Товар Sony Alpha A7R Body">
              <a class="product-buy-button" href="">Купить</a>
            </div>
          </article>
        </li>
      </ul>
    </section>
  </main>

  <!--=== Footer ===-->
  <footer class="footer">
    <div class="footer-content-wrapper container">
      <p class="footer-email-text">О сотрудничестве и по другим вопросам:<br><a class="footer-email-link"
          href="mailto:danya.tvorun.88@mail.ru">danya.tvorun.88@mail.ru</a></p>

      <ul class="list-reset footer-socials-list">
        <li class="socials-item"><a class="socials-link socials-fb" href="https://ru-ru.facebook.com/"><img
              class="socials-img" src="/img/fb.png" width="35" height="35" alt="Facebook"><span
              class="visually-hidden">Facebook</span></a>
        </li>
        <li class="socials-item"><a class="socials-link socials-tw" href="https://twitter.com/"><img class="socials-img"
              src="/img/tw.png" width="35" height="35" alt="Facebook"><span class="visually-hidden">Facebook</span></a>
        </li>
        <li class="socials-item"><a class="socials-link socials-vk" href="https://vk.com/dancanadian"><img
              class="socials-img" src="/img/vk.png" width="35" height="35" alt="Вконтакте"><span
              class="visually-hidden">VK</span></a></li>
        <li class="socials-item"><a class="socials-link socials-ok" href="https://ok.ru/"><img class="socials-img"
              src="/img/odnoklassniki3.png" width="35" height="35" alt="Одноклассники"><span
              class="visually-hidden">OK</span></a></li>
      </ul>
    </div>
  </footer>

  <section class="modal modal-menu">
    <h2 class="modal-menu-title visually-hidden">Меню</h2>

    <button class="modal-menu-close-button" type="button"><span class="visually-hidden">Закрыть</span></button>
    <ul class="modal-main-nav-list">
      <li class="modal-main-nav-item"><a class="modal-main-nav-link" href="news.php">Новости</a></li>
      <li class="modal-main-nav-item"><a class="modal-main-nav-link" href="">О компании</a></li>
      <li class="modal-main-nav-item"><a class="modal-main-nav-link" href="">Оплата</a></li>
      <li class="modal-main-nav-item"><a class="modal-main-nav-link" href="">В кредит</a></li>
      <li class="modal-main-nav-item"><a class="modal-main-nav-link" href="">Доставка</a></li>
      <li class="modal-main-nav-item"><a class="modal-main-nav-link" href="">Гарантии</a></li>
      <li class="modal-main-nav-item"><a class="modal-main-nav-link" href="">Контакты</a></li>
    </ul>

    <ul class="modal-product-categories-list">
      <li class="modal-product-categories-item active-category"><a class="modal-product-categories-link"
          href="index.html">Фототехника</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link"
          href="category-cameras.html">Цифровые
          фотоаппараты</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link"
          href="category-lens.html">Объективы</a>
      </li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Фотоспышки</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Светофильтры</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link"
          href="category-photo-bags.html">Фотосумки</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Штативы,
          моноподы</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Карты
          памяти</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Накамерный
          свет LED</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Микрофоны
          выносные</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Калибраторы и
          шкалы</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Подводные
          боксы</a></li>
      <li class="modal-product-categories-item"><a class="modal-product-categories-link" href="">Аксессуары и
          опции</a></li>
    </ul>
  </section>

  <section class="modal modal-login">
    <h2 class="modal-login-title visually-hidden">Авторизация</h2>

    <button class="modal-login-close-button" type="button"><span class="visually-hidden">Закрыть</span></button>

    <ul class="modal-login-list">
      <li class="modal-login-item"><a class="modal-login-link modal-login-link" href="">Вход с паролем</a></li>
      <li class="modal-login-item"><a class="modal-login-link modal-signin-link" href="">Регистрация</a><br></li>
      <li class="modal-login-item">
        <p class="modal-products-counter">Товары: 0 шт.</p>
      </li>
    </ul>
  </section>

  <section class="news-admin-signin">
    <h2 class="admin-signin-title">Войти как администратор</h2>

    <form class="admin_signin_form admin-signin-form" method="POST">
      <label for="admin-login visually-hidden" class="admin-label visually-hidden"></label>
      <input class="admin-signin-input admin-login-input" name="admin_login" id="admin-login" type="text" placeholder="Логин">

      <label for="admin-password visually-hidden" class="admin-label visually-hidden"></label>
      <input class="admin-signin-input dmin-password-input" name="admin_password" id="admin-password" type="text" placeholder="Пароль">

      <button name="signin" class="admin-signin-button" type="submit" ">Войти</button>
      <button class="admin-sighin-close-buttom" type="button"><span class="visually-hidden">Закрыть</span></button>
    </form>
  </section>

  <?php
    // === АВТОРИЗАЦИЯ АДМИНА ===

    // ПРОБЛЕМА: Если ввести логин и пароль разных админов
    // (логин одного админа и пароль другого) - авторизация пройдет

    $login = textboxValue("admin_login");
    $password = textboxValue("admin_password");

    $result_admin_logins = mysqli_query($con, 'SELECT id FROM admins WHERE login="' . $login . '"');
    $result_admin_passwords = mysqli_query($con, 'SELECT id FROM admins WHERE password="' . $password . '"');

    if (mysqli_num_rows($result_admin_logins) > 0 &&
    mysqli_num_rows($result_admin_passwords) > 0) {
      printNewsModal();
    }
  ?>

  <script src="js/modal-menu.min.js"></script>
  <script src="js/modal-login.min.js"></script>
  <script src="js/modal-admin-signin.min.js"></script>
  <script src="js/modal-news-admin.min.js"></script>
</body>

</html>
