<?php
session_start();
include 'system/html/config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Acme&family=Actor&family=Andika&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&family=Jockey+One&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Serif:wght@600&family=Paytone+One&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
      rel="stylesheet"
    />
    <!-- CSS style -->
    <link rel="stylesheet" href="css/style.css" />
    <title>Craft Merch Customized - Home</title>
  </head>
  <body>
    <nav class="navbar">
      <img src="image/Icon/logo.png" alt="" width="70" />
      <div class="container-navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="product.php">Product</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact_us.php">Contact</a></li>
          <li id="search-icon">
            <a href="#"
              ><img src="image/Icon/search.png" alt="" width="20"
            /></a>
          </li>
        </ul>
      </div>
      <div class="d-flex align-i-center">
        <?php
        if (!isset($_SESSION['id_cust'])) {
          $hrefCart = "login.php";
          echo '
          <a href="login.php" class="link-1">Login</a>
          <a href="register.php" class="link-2">Register</a>
          ';
        }else {
          $hrefCart = "cart.php";
          echo '
            <img src="image/Icon/Profile.png" alt="" width="40" style="margin: 0 5px" />
            <p class="f-p-text" style="margin: 0">'. $_SESSION['nm_user'] .'</p>
          ';
        }
        ?>
        <img
          src="image/Icon/Line 1.png"
          alt=""
          width="0.8"
          style="margin: 0 5px"
        />
        <a href="<?= $hrefCart ?>"><img src="image/Icon/Buy.png" alt="" width="40" style="margin: 0 5px" /></a>
      </div>
    </nav>
    <div id="search-box" style="display: none; margin-left: 780px">
      <input type="text" placeholder="Search Here" id="search-input" />
    </div>
    <div id="search-box" style="display: none; margin-left: 780px">
      <input type="text" placeholder="Search Here" id="search-input" />
    </div>
    <div class="product-list" style="display: none">
      <ul>
        <li><a href="t-shirt.html">T-Shirt</a></li>
        <li><a href="headwear.html">Headwear</a></li>
        <li><a href="lanyard.html">Lanyard</a></li>
        <li><a href="totebag.html">Totebag</a></li>
      </ul>
    </div>
    <section
      class="container-fluid"
      style="padding: 60px 60px 350px 60px; height: 500px"
    >
      <div class="row">
        <div class="col-6 d-flex align-i-center justify-c-center">
          <div>
            <h1 class="h-text-1" style="padding-top: 150px">
              Crafted <br />
              Merch Customized
            </h1>
            <p class="p-text-1" style="padding-bottom: 20px">
              Custom Quality, Express Your Unique Style
            </p>
            <a href="#" class="link-3" style="">Shop Now</a>
          </div>
        </div>
        <div class="col-6">
          <img
            src="image/home/Ellipse 1.png"
            class="ellipse-1"
            alt=""
            width="450"
          />
          <img
            src="image/home/Ellipse 1.png"
            class="ellipse-2"
            alt=""
            width="450"
          />
          <div>
            <img src="image/home/image-1.png" class="image-home-1" alt="" />
            <img
              src="image/home/image-2.png"
              class="image-home-2"
              alt=""
              width="320"
            />
          </div>
        </div>
      </div>
    </section>
    <section
      class="container-fluid"
      style="
        padding: 4rem 0;
        background: linear-gradient(
          180deg,
          rgba(60, 115, 92, 0.622) 27.6%,
          rgba(216, 255, 241, 0) 100%
        );
      "
    >
      <div class="d-flex justify-c-center align-i-center">
        <img src="image/home/line.png" alt="" style="margin-right: 20px" />
        <h1 class="h-text-2">Our Categories Product</h1>
        <img src="image/home/line.png" alt="" style="margin-left: 20px" />
      </div>
      <div class="image-product-home">
        <div class="image-product">
          <div class="wrap-image">
            <img src="image/home/product-1.png" alt="" />
          </div>
          <h1 class="h-text-3" style="text-align: center">T-Shirt</h1>
        </div>
        <div class="image-product">
          <div class="wrap-image">
            <img src="image/home/product-2.png" alt="" />
          </div>
          <h1 class="h-text-3" style="text-align: center">Headwear</h1>
        </div>
        <div class="image-product">
          <div class="wrap-image">
            <img src="image/home/product-3.png" alt="" />
          </div>
          <h1 class="h-text-3" style="text-align: center">Lanyard</h1>
        </div>
        <div class="image-product">
          <div class="wrap-image">
            <img src="image/home/product-4.png" alt="" />
          </div>
          <h1 class="h-text-3" style="text-align: center">Totebag</h1>
        </div>
      </div>
      <p class="p-text-2">
        Terbuat dari material berkualitas sehingga awet dan nyaman saat dipakai.
        <br />
        Pilihan yang tepat untuk segala macam kebutuhan harian anda.
      </p>
      <div
        class="d-flex justify-c-center align-i-center"
        style="padding: 2rem 0"
      >
        <img src="image/home/line.png" alt="" style="margin-right: 20px" />
        <h1 class="h-text-2">We Print Your Idea</h1>
        <img src="image/home/line.png" alt="" style="margin-left: 20px" />
      </div>
      <p class="p-text-2">
        Pesan Merchandise custom dengan desain kamu sendiri <br />
        kini menjadi semakin mudah dan menyenangkan di <br />
        Crafted Merch Customized
      </p>
    </section>
    <footer>
      <div class="row">
        <div class="col-6">
          <h1 class="h-text-4">Crafted Merch Customized</h1>
          <p class="p-text-3">
            Custom Quality, Express Your Unique Style Pesan Merchandise custom
            dengan desain kamu sendiri kini menjadi semakin mudah dan
            menyenangkan di Crafted Merch Customized
          </p>
          <div class="container-icon-link">
            <a href="#">
              <div class="icon-link">
                <img src="image/Icon/twitter-black.png" alt="" width="15" />
              </div>
            </a>
            <a href="#">
              <div class="icon-link">
                <img src="image/Icon/facebook-black.png" alt="" width="10" />
              </div>
            </a>
            <a href="#">
              <div class="icon-link">
                <img src="image/Icon/instagram-black.png" alt="" width="15" />
              </div>
            </a>
          </div>
        </div>
        <div class="col-2">
          <h1 class="f-h-text">PRODUCT</h1>
          <p class="f-p-text">
            <a href="product.php?kategori=T-Shirt">T-Shirt</a>
          </p>
          <p class="f-p-text">
            <a href="product.php?kategori=Heardwear">Heardwear</a>
          </p>
          <p class="f-p-text">
            <a href="product.php?kategori=Lanyard">Lanyard</a>
          </p>
          <p class="f-p-text">
            <a href="product.php?kategori=Totebag">Totebag</a>
          </p>
        </div>
        <div class="col-2">
          <h1 class="f-h-text">HELP</h1>
          <p class="f-p-text"><a href="#">Contact Us</a></p>
        </div>
        <div class="col-2">
          <h1 class="f-h-text">FOR MORE INFO</h1>
          <p class="f-p-text-2"><a href="#"> info@craftedmerch</a></p>
          <p class="f-p-text-2"><a href="#"> 083786998766</a></p>
          <p class="f-p-text-2">
            <a href="#"> Jl. Ketintang wiyata, Surabaya</a>
          </p>
        </div>
      </div>
      <div class="d-flex justify-c-center" style="padding-top: 2rem">
        <img src="image/home/line 2.png" alt="" width="5000" />
      </div>
      <div class="d-flex justify-c-center" style="padding: 2rem 0">
        <p class="f-p-text-3">CraftedMerch ©2023, All Rights Reserved</p>
      </div>
    </footer>
    <script src="js/script.js"></script>
  </body>
</html>
