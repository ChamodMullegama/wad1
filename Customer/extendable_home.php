<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php

session_start();

?>

<head>
  <meta charset="utf-8">
  <title>Gallery Cafe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Images/logogc.png" type="image/x-icon">
  <link rel="stylesheet" href="../Styles/customer_header.css">
  <link rel="stylesheet" href="../Styles/index.css">
  <link rel="stylesheet" href="../Styles/footer.css">
  <script src="./js/custamer.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="..." crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>



<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">
    <img src="../Images/logogc.png" alt="" style="height: 30px; vertical-align: middle; margin-bottom: 8px;">
    Gallery Cafe
</label>
    <ul>
      <?php
      if (isset($_SESSION['customer_name'])) {
      ?>
        <li><a href="./extendable_home.php">HOME</a></li>
        <li><a href="./menu_and_order.php">MENU/ONLINE ORDER</a></li>
        <li><a href="./services.php">SERVICES</a></li>
        <li><a href="./gallery.php">GALLERY</a></li>
        <li><a href="./book.php">BOOK</a></li>
        <li><a href="./cart.php">CART</a></li>
        <li><a href="./submit_feedback.php">Review</a></li>
        <?php

        if (isset($_SESSION['customer_name']) && !empty($_SESSION['customer_name'])) {
          echo '<li><a href="./customer_logout.php"> ' . '<i class="fa fa-fw fa-user"></i>' . htmlspecialchars($_SESSION['customer_name']), ' / LOG OUT' . '</a></li>';
        }
        ?>
      <?php
      } else {
      ?>

        <li><a href="#">HOME</a></li>
        <li><a href="#">MENU/ONLINE ORDER</a></li>
        <li><a href="#">SERVICES</a></li>
        <li><a href="#">GALLERY</a></li>
        <li><a href="#">BOOK</a></li>
        <li><a href="#">CART</a></li>
        <li><a href="./customer_login.php">Login</a></li>
      <?php
      } ?>
    </ul>
  </nav>



  <div class="slider">
    <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav" />
    <input type="radio" name="slider" title="slide2" class="slider__nav" />
    <input type="radio" name="slider" title="slide3" class="slider__nav" />
    <input type="radio" name="slider" title="slide4" class="slider__nav" />
    <div class="slider__inner">
      <div class="slider__contents slider-1-image">
        <h2 class="slider__caption">Dishes</h2>
        <p class="slider__txt">Exploring different cuisines allows us to savor diverse flavors and culinary traditions from around the world</p>
      </div>
      <div class="slider__contents slider-2-image">
        <h2 class="slider__caption">services</h2>
        <p class="slider__txt">Exceptional services are the backbone of customer satisfaction, often exceeding expectations and leaving lasting impressions</p>
      </div>
      <div class="slider__contents slider-4-image">
        <h2 class="slider__caption">book your table </h2>
        <p class="slider__txt">Secure your delightful dining experience by reserving a table at our establishment today. Join us at [Your Restaurant Name] for an unforgettable culinary journey</p>
      </div>
      <div class="slider__contents slider-3-image">
        <h2 class="slider__caption">about us</h2>
        <p class="slider__txt">Welcome to Outer Clove Restaurant, where passion for exquisite flavors meets a commitment to unparalleled dining experiences</p>
      </div>
    </div>
  </div>


  <section id="menu">


    <h1 class="topic">Our<span class="topic_span">Category</span></h1>
    <div>
      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="./menu_and_order.php">
            <img src="../Images/burger-fries-cheese-onion-bread-cola-generated-by-artificial-intelligence.jpg" alt="Cinque Terre">
          </a>
          <div class="desc">Burgers & Sandwiches</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="./menu_and_order.php">
            <img src="../Images/pizza_.jpg" alt="Cinque Terre">
          </a>
          <div class="desc">Pizza</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="./menu_and_order.php">
            <img src="../Images/rice.jpg" alt="Cinque Terre">
          </a>
          <div class="desc">Rice</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="./menu_and_order.php">
            <img src="../Images/kottu.jpg" alt="Cinque Terre" alt="Cinque Terre">
          </a>
          <div class="desc">Kottu</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="./menu_and_order.php">
            <img src="../Images/Noodles.jpg" alt="Cinque Terre">
          </a>
          <div class="desc">Pasta</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="./menu_and_order.php">
            <img src="../Images/Soups_and_Salads.jpg" alt="Cinque Terre">
          </a>
          <div class="desc">Soups and Salads</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="./menu_and_order.php">
            <img src="../Images/Desserts.jpg" alt="Cinque Terre">
          </a>
          <div class="desc">Desserts</div>
        </div>
      </div>
      <div class="responsive">
        <div class="gallery">
          <a target="_blank" href="./menu_and_order.php">
            <img src="../Images/Beverages1.jpg" alt="Cinque Terre">
          </a>
          <div class="desc">Beverages</div>
        </div>
      </div>
  </section>

  <section id="services">
    <h1 class="topic">Our<span class="topic_span">Service</span></h1>

    <?php
    require '../Db/connection.php';
    $database = new connection();

    try {
      $conn = $database->getConnection();
      $fetch_sql = "SELECT * FROM services";
      $stmt = $conn->query($fetch_sql);
      $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
    }

    ?>
    <div class="services-container">
      <?php foreach ($services as $service) : ?>
        <div class="responsive">
          <div class="gallery">
            <div class="desc"><?php echo $service['service_name']; ?></div>
            <div class="desc"><?php echo $service['service_description']; ?></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section id="aboutus">

    <h1 class="topic">About<span class="topic_span">Us</span></h1>
    <div class="all">

      <div class="raw_1">

        <div class="container">
          <img src="../Images/cafe.jpeg" alt="Avatar" class="image">
          <div class="overlay">Gallery Cafe</div>
        </div>
        <div class="container">
          <img src="../Images/pexels-thomas-balabaud-1579739 (1).jpg" alt="Avatar" class="image">
          <div class="overlay">Tables</div>
        </div>
        <div class="container">
          <img src="../Images/home_page_2.jpg" alt="Avatar" class="image">
          <div class="overlay">Dishes</div>
        </div>

      </div>
      <div class="raw_2">
        <p>
          Nestled in the heart of Kandy, Sri Lanka, Gallery Cafe is a culinary oasis blending tradition with innovation. We're passionate about showcasing the vibrant flavors of Sri Lankan cuisine, sourcing the freshest local ingredients to craft dishes that marry heritage with contemporary tastes. Our inviting ambiance and skilled team ensure each visit is a sensorial journey, where every bite tells a story of culture and dedication to culinary excellence. At Outer Clove, we're committed to creating unforgettable dining experiences that celebrate the essence of Sri Lanka.
        </p>

        <h1 class="topic">Our<span class="topic_span">Team</span></h1>
        <div class="row_3">
          <div class="column">
            <div class="card">
              <img src="../Images/ceo.webp" alt="Jane" style="width:100%">
              <div class="container">
              <h2 class="team_name">kasun <br> Disanayake</h2>
                <p class="title">CEO & Founder</p>
                <p class="home_P">Visionary leader guiding our journey</p>
                <p class="home_P">kasun@gmail.com</p>
                <p class="home_P"><button class="button">Contact</button></p>
              </div>
            </div>
          </div>

          <div class="row_3">
            <div class="column">
              <div class="card">
                <img src="../Images/hr.jpg" alt="Jane" style="width:100%">
                <div class="container">
                  <h2 class="team_name">Chamod Ekanayake</h2>
                  <p class="title">HR Manager</p>
                  <p class="home_P">Trailblazing leader shaping our future</p>
                  <p class="home_P">chamod@gmail.com</p>
                  <p><button class="button">Contact</button></p>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="card">
                <img src="../Images/womanchef.jpeg" alt="John" style="width:100%">
                <div class="container">
                  <h2 class="team_name">Madumali Mullegama</h2>
                  <p class="title">Head Cheff</p>
                  <p class="home_P">Crafting culinary excellence daily</p>
                  <p class="home_P">madumali@gmail.com</p>
                  <p><button class="button">Contact</button></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <br><br><br>
      <section class="review">

        <div class="review" id="Review">
          <h1 class="topic">Customer<span class="topic_span">Review</span></h1>
          <div class="review_box">
            <?php
            try {
              $connectionObj = new connection();
              $conn = $connectionObj->getConnection();
              $sql = "SELECT name, comment FROM feedback";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $feedbackData = $stmt->fetchAll(PDO::FETCH_ASSOC);
              foreach ($feedbackData as $feedback) {
            ?>
                <div class="review_card">
                  <div class="review_profile">
                    <img src="../Images/customer.png" alt="Customer">
                  </div>
                  <div class="review_text">
                    <h2 class="name"><?php echo htmlspecialchars($feedback['name']); ?></h2>
                    <div class="review_icon">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <div class="review_social">
                      <i class="fa-brands fa-facebook-f"></i>
                      <i class="fa-brands fa-instagram"></i>
                      <i class="fa-brands fa-twitter"></i>
                      <i class="fa-brands fa-linkedin-in"></i>
                    </div>
                    <p><?php echo htmlspecialchars($feedback['comment']); ?></p>
                  </div>
                </div>
            <?php
              }
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            } finally {
              $conn = null;
            }
            ?>
          </div>
        </div>

      </section>
      <section>

      </section>
      <br><br><br>
      <?php
      include '../footer.php';
      ?>
</body>

</html>