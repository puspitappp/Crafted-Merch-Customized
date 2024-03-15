<?php
include 'system/html/config/koneksi.php';
include 'system/html/config/appcode.php';
session_start();

if (isset($_GET['kategori'])) {
  $getKategori = "WHERE kategori = '". $_GET['kategori'] ."'";
}else {
  $getKategori = "";
}
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
      href="https://fonts.googleapis.com/css2?family=Acme&family=Actor&family=Andika&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Istok+Web:ital,wght@0,400;0,700;1,400;1,700&family=Jockey+One&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Judson&family=Just+Another+Hand&family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Noto+Serif:wght@600&family=Paytone+One&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
      rel="stylesheet"
    />
    <!-- CSS style -->
    <link rel="stylesheet" href="css/style.css" />
    <title>Craft Merch Customized - Product</title>
  </head>
  <body>
    <nav class="navbar" style="padding-bottom: 30px">
      <img src="image/Icon/logo.png" alt="" width="70" />
      <div class="container-navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="product.php">Product</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact_us.php">Contact</a></li>
          <li id="search-icon">
            <a href="#"><img src="image/Icon/search.png" alt="" width="20" /></a>
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
  <div id="search-box" style="display: none; margin-left: 780px;margin-top: -30px;">
    <input type="text" placeholder="Search Here" id="search-input" />
  </div>
    <div class="product-list" style="display: none; margin-top: -30px">
      <ul>
        <li><a href="t-shirt.html">T-Shirt</a></li>
        <li><a href="headwear.html">Headwear</a></li>
        <li><a href="lanyard.html">Lanyard</a></li>
        <li><a href="totebag.html">Totebag</a></li>
      </ul>
    </div>
    <section class="container-product">
      <div class="nav-product">
        <?php
        $kategori = mysqli_query($conn, "SELECT kategori FROM tb_product GROUP BY kategori");
        while ($row = mysqli_fetch_assoc($kategori)) {
          $active = "";
          error_reporting(0);
          if ($_GET['kategori'] == $row['kategori']) {
            $active = "active";
          }
        ?>
        <a href="product.php?kategori=<?= $row['kategori'] ?>" class="link-4 <?= $active ?>" style=""><?= $row['kategori'] ?></a>
        <?php } ?>
      </div>
      <!-- <div class="nav-product">
        <p class="f-p-text"><a href="#">Home</a></p>
        <img src="image/Icon/right.png" alt="" width="8" height="15" />
        <p class="f-p-text"><a href="#">Product</a></p>
        <img src="image/Icon/right.png" alt="" width="8" height="15" />
        <p class="f-p-text"><a href="#">T-shirt</a></p>
      </div> -->
      <div class="kolom-product">
        <div class="row">
          <?php
          $product = mysqli_query($conn, "SELECT * FROM tb_product $getKategori");
          while ($row = mysqli_fetch_assoc($product)) {
            $image = explode(" | ", $row['foto']);
          ?>
          <div class="col-4 d-flex justify-c-center">
            <div>
              <a href="detail-product.php?id_product=<?= $row['id_product'] ?>" style="text-decoration: none; color: black;">
              <div class="d-flex justify-c-center">
                <img src="<?= $image[3] ?>" alt="" height="400" />
              </div>
              </a>
              <div class="container-color-product">
                <?php
                $color = explode(" | ", $row['color']);
                if ($row['color'] == NULL) {
                  echo'
                      <span class="badge bg-success-transparent" style="margin:20px 0;">Tidak Ada Warna</span>
                      ';
                }elseif (count($color) == 0 || count($color) == 1 || count($color) == 2 || count($color) == 3 || count($color) == 4) {
                    for ($i=0; $i < count($color); $i++) { 
                        echo '
                        <div class="color-product" style="background-color: ' . $color[$i] .'"></div>
                        ';
                    }
                }else{
                    for ($i=0; $i < 6; $i++) { 
                        echo '
                        <div class="color-product" style="background-color: ' . $color[$i] .'"></div>
                        ';
                    }
                }
                ?>
              </div>
              <div class="info-product d-flex justify-c-center">
                <h1 class="h-text-8" style="width: 80%;">
                  <?= $row['name'] ?>
                </h1>
              </div>
              <h1 class="p-text-2" style="font-weight: 300">IDR <?= money($row['price']) ?></h1>
            
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <footer style="background-color: rgba(102, 195, 163, 0.111)">
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
