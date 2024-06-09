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
    <title>Главная</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/responsive.css" rel="stylesheet" />
  </head>
  <body>
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
                  <a href="index.php">Главная</a>
                  <a href="about.php">О Нас</a>
                  <a href="contact.php">Контакты</a>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class=" slider_section position-relative">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-4 offset-md-1">
              <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"> 01 </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"> 02 </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"> 03 </li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"> 04 </li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="img-box b-1">
                      <img src="images/slider-img.png" alt="" />
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box b-2">
                      <img src="images/hot-1.png" alt="" />
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box b-3">
                      <img src="images/hot-2.png" alt="" />
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="img-box b-4">
                      <img src="images/hot-3.png" alt="" />
                    </div>
                  </div>
                </div>
                <div class="carousel_btn-box">
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
            <div class=" col-md-5 offset-md-1">
              <div class="detail-box">
                <h1> <?= getRecordBySlug('mag_name_1')['title']; ?> </h1>
                <p>
                    <?= getRecordBySlug('mag_name_1')['description']; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <section class="about_section">
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
    </section>
    <section class="dish_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="dish_container">
              <div class="box">
                <img src="images/dish.jpg" alt="">
              </div>
              <div class="box">
                <img src="images/dish.jpg" alt="">
              </div>
              <div class="box">
                <img src="images/dish.jpg" alt="">
              </div>
              <div class="box">
                <img src="images/dish.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <hr>
                <h2><?= getRecordBySlug('mag_desc_2')['title']; ?></h2>
              </div>
              <p><?= getRecordBySlug('mag_desc_2')['description']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="app_section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="img-box">
              <img src="images/man-with-phone.png" alt="">
            </div>
          </div>
          <div class="col-md-6 offset-md-2">
            <div class="detail-box">
              <h2>
              <?= getRecordBySlug('mag_banner_1')['title']; ?>
              </h2>
              <p><?= getRecordBySlug('mag_banner_1')['description']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="client_section layout_padding">
      <div class="container">
        <div class="heading_container">
          <hr>
          <h2>Отзывы</h2>
        </div>

        <?php 
            $sql = "SELECT title, description FROM records WHERE slug LIKE 'client_say_%'";
            $result = $conn->query($sql);
            
        ?>

        <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <!-- <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
            <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
            <li data-target="#carouselExample2Indicators" data-slide-to="3"></li> -->

            <?php 
                if ($result->num_rows > 0) {
                    $count = 0;
                    while($row = $result->fetch_assoc()) {
                        echo "<li data-target='#carouselExample2Indicators' data-slide-to='".$count."'></li>";
                        $count++;
                    }
                } else {
                    echo "0 results";
                }
            ?>
          </ol>
          <div class="carousel-inner">
            
          <?php 
                $sql = "SELECT title, description FROM records WHERE slug LIKE 'client_say_%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $first = true;
                
                    while($row = $result->fetch_assoc()) {
                        $active_class = $first ? 'active' : '';
                        echo '<div class="carousel-item ' . $active_class . '">
                                <div class="box ">
                                  <div class="client_id">
                                    <h4>' . $row["title"] . '</h4>
                                  </div>
                                  <div class="detail-box">
                                    <p>' . $row["description"] . '</p>
                                  </div>
                                </div>
                              </div>';
                        
                        $first = false;
                    }
                } else {
                    echo "Отзывы от клиентов не найдены";
                }
          ?>
            
          </div>
        </div>
      </div>
    </section>
    <section class="contact_section layout_padding-bottom ">
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
