<?php
include './admin/config.php';

function getRecordBySlug($slug) {
    global $conn;
    
    $sql = "SELECT title, description FROM records WHERE slug = '$slug'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Контакты</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
  </head>
  <body class="sub_page">
    <div class="hero_area">
      <header class="header_section">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="/">
              <img src="images/logo.png" alt="" />
              <span> <?= getRecordBySlug('mag_name_main')['title']; ?> </span>
            </a>
            <div class="navbar-collapse" id="">
              <div class="custom_menu-btn">
                <button onclick="openNav()">
                  <span class="s-1"></span>
                  <span class="s-2"></span>
                  <span class="s-3"></span>
                </button>
              </div>
              <div id="myNav" class="overlay">
                <div class="overlay-content">
                  <a href="/">Главная</a>
                  <a href="about.php">О Нас</a>
                  <a href="contact.php">Контакты</a>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
    </div>

    <section class="contact_section layout_padding">
      <div class="container">
        <h2> Связаться </h2>
        <div class="row">
          <div class="col-md-7">
            <div class="form_container">
              <form action="submit.php" method="post" id="contact-form">
                <input type="text" placeholder="ФИО" name="name">
                <input type="email" placeholder="Email" name="email">
                <input type="text" placeholder="Сообщение" class="message_input" name="message">
                <button> Отправить </button>
              </form>
            </div>
          </div>
          <div class="col-md-5">
            <div class="contact_box">
              <a href="">
                <div class="img-box">
                  <img src="images/location.png" alt="">
                </div>
                <h6> <?= getRecordBySlug('contact_adress')['title']; ?> </h6>
              </a>
              <a href="">
                <div class="img-box">
                  <img src="images/call.png" alt="">
                </div>
                <h6> <?= getRecordBySlug('contact_tel')['title']; ?> </h6>
              </a>
              <a href="">
                <div class="img-box">
                  <img src="images/envelope.png" alt="">
                </div>
                <h6> <?= getRecordBySlug('contact_mail')['title']; ?> </h6>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="additional_info_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="info_box">
          <h3>Часы работы</h3>
          <p>Понедельник - Пятница: 8:00 - 19:00</p>
          <p>Суббота - Воскресенье: 10:00 - 16:00</p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="info_box">
          <h3>Проезд</h3>
          <p>На автобусе: 1, 2, 3*, 3А*, 4, 5, 6, 7*, 9, 15, 16, 22, 26, 33, 34, 34А, 35, 42, 45, 46, 46А, 47, 49, 51, 57, 58, 60, 61, 64, 65, 67*, 70*, 71, 75, 77, 78, 80*, 83, 90, 99 Остановка "Центральный рынок"</p>
          <p>На троллейбусе: 1*, 2*, 9*, 10, 12, 14, 22* Остановка "Центральный рынок"</p>
          <p>На трамвае: 1, 4, 10 Остановка "Центральный рынок"</p>
        </div>
      </div>
    </div>
  </div>
</section>

    <section class="map_section ">
  <div class="container">
    <h2>Мы находимся здесь</h2>
    <div class="row">
      <div class="col-md-12">
      <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Ac5e356fdda3dbcd583b9991cb65abb23ffeef6e432e1d5180ca9bf007b23ed52&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</section>

    <section class="container-fluid footer_section">
      <p> © 2024 Все права защищены.</p>
    </section>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
      function openNav() {
        document.getElementById("myNav").classList.toggle("menu_width");
        document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style");
      }
    </script>
    <script type="text/javascript">
      $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 35,
        navText: [],
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1000: {
            items: 3
          }
        }
      });
    </script>
  </body>
</html>
