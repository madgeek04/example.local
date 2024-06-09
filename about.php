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
    <title>О Нас</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
  </head>
  <body  class="sub_page">
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
    <section class="about_section layout_margin">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5 offset-md-1">
            <div class="detail-box">
              <div class="heading_container">
                <h2><?= getRecordBySlug('mag_about_1')['title']; ?></h2>
                <hr>
              </div>
              <p> <?= getRecordBySlug('mag_about_1')['description']; ?> </p>
            </div>
          </div>
          <div class="col-md-6 px-0">
            <div class="img-box">
              <img src="images/about-img.jpg" alt="">
            </div>
          </div>
        </div>
      </div>

      <div class="detail-box mt-5">
  <div class="heading_container">
    <h2>Наша история</h2>
    <hr>
  </div>
  <p>Наша история началась в далеком 2005 году, когда мы решили открыть свою первую кофейню в уютном уголке города. С тех пор мы постоянно развиваемся, стремясь предложить нашим клиентам лучший кофе и неповторимую атмосферу.</p>
</div>
<div class="detail-box mt-5">
  <div class="heading_container">
    <h2>Философия компании</h2>
    <hr>
  </div>
  <p>Мы верим в то, что хороший кофе - это не просто напиток, а настоящий опыт. Наша цель - подарить каждому клиенту не только вкусный кофе, но и момент наслаждения и уюта. Мы гордимся своими высокими стандартами качества и заботимся о каждой чашке, чтобы ваше время у нас было незабываемым.</p>
</div>
<div class="detail-box mt-5">
  <div class="heading_container">
    <h2>Наша команда</h2>
    <hr>
  </div>
  <p>Наша команда - это настоящие профессионалы своего дела, любящие кофе не меньше, чем вы. Мы с удовольствием подберем для вас идеальный напиток, расскажем интересные истории о кофе и сделаем все возможное, чтобы ваш визит в нашу кофейню стал приятным и запоминающимся событием.</p>
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
