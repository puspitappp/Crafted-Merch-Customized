<?php
include 'system/html/config/koneksi.php';
include 'system/html/config/appcode.php';
session_start();
if (isset($_POST['addCart'])) {
  if (!isset($_SESSION['id_cust'])) {
    header("Location:login.php");
  }else{
    $id_cart = generate_cart();
    $id_cust = $_SESSION['id_cust'];
    $id_product = $_GET['id_product'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $qty = $_POST['qtyCart'];
  
    $queryData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_product WHERE id_product = '". $id_product ."'"));
  
    $biaya = $queryData['price'] * $qty;
    
    $queryData2 = mysqli_query($conn, "SELECT id_cart FROM tb_cart WHERE id_customer = '". $_SESSION['id_cust'] ."' AND id_product = '" . $_GET['id_product'] . "'");
    $jumlahData2 = mysqli_num_rows($queryData2);
    // var_dump($jumlahData2);
    if ($jumlahData2 >= 1) {
      $queryUpdate = mysqli_query($conn, "UPDATE tb_cart SET
                                              color = '" . $color . "',
                                              size = '" . $size . "',
                                              qty = '" . $qty . "',
                                              biaya = '" . $biaya . "'
                                              WHERE id_customer = '" . $id_cust . "' AND id_product = '" . $id_product . "'"
                                      );
                                      if ($queryUpdate) {
                                          $msg_status = "Ubah Data berhasil !";
                                      } else {
                                          $msg_status = "Ubah Data gagal !";
                                      }
    }else{
      $queryAdd = mysqli_query($conn, "INSERT INTO tb_cart (`id_cart`, `id_customer`, `id_product`, `color`, `size`, `qty`, `biaya`, `status`) VALUES
                                        (
                                          '" . $id_cart . "',
                                          '" . $id_cust . "',
                                          '" . $id_product . "',
                                          '" . $color . "',
                                          '" . $size . "',
                                          '" . $qty . "',
                                          '" . $biaya . "',
                                          'cart'
                                        )");
                                        if ($queryAdd) {
                                          $msg_status = "Insert berhasil";
                                        }else{
                                          $msg_status = "Insert gagal";
                                        }
    }
    
    echo'
      <script>
          alert("' . $msg_status . '");
          window.location.href="product.php";
      </script>
      ';
  }
}

// var_dump($_GET['id_product']);
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_product WHERE id_product = '". $_GET['id_product'] ."'"));
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
    <!-- Bootstrap Css -->
    <!-- <link id="style" href="system/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" > -->

    <!-- Style Css -->
    <!-- <link href="system/assets/css/styles.min.css" rel="stylesheet" > -->

    <!-- Choices Css -->
    <link rel="stylesheet" href="system/assets/libs/choices.js/public/assets/styles/choices.min.css">

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
        <p class="f-p-text"><a href="#">Home</a></p>
        <img src="image/Icon/right.png" alt="" width="8" height="15" />
        <p class="f-p-text"><a href="#">Product</a></p>
        <!-- <p class="f-p-text">Product</p> -->
        <img src="image/Icon/right.png" alt="" width="8" height="15" />
        <p class="f-p-text"><a href="#"><?= $data['kategori'] ?></a></p>
        <!-- <p class="f-p-text">T-shirt</p> -->
      </div>
      <div class="kolom-product" style="padding-left: 80px">
        <form action="" method="post">
          <div class="row">
            <div class="col-6 d-flex justify-c-center">
              <div class="row">
                <div class="col-4 d-flex flex-wrap">
                  <?php
                  $image = explode(" | ", $data['foto']);
                  for ($i=0; $i < 3; $i++) { 
                    echo '
                    <div>
                      <img src="'. $image[$i] .'" alt="" />
                    </div>
                      ';
                  }
                  ?>
                  <!-- <div>
                    <img src="image/product/kaospanjang1-1.png" alt="" />
                  </div>
                  <div>
                    <img src="image/product/kaospanjang3.png" alt="" />
                  </div>
                  <div>
                    <img src="image/product/kaospanjang1-1.png" alt="" />
                  </div> -->
                </div>
                <div class="col-6 d-flex" style="align-items: center;justify-content: center;">
                  <img src="<?= $image[3] ?>" alt="" width="400"/>
                </div>
              </div>
            </div>
            <div class="col-6">
              <h1
                class="h-text-8"
                style="text-align: left; font-size: 24px; font-weight: 500"
              >
                <?= $data['name'] ?>
              </h1>
              <div class="d-flex star-product">
                <img src="image/Icon/star-100.png" alt="" />
                <img src="image/Icon/star-100.png" alt="" />
                <img src="image/Icon/star-100.png" alt="" />
                <img src="image/Icon/star-100.png" alt="" />
                <img src="image/Icon/star-50.png" alt="" />
                <p class="f-p-text" style="margin-bottom: 0">
                  4.5/<span style="color: rgba(0, 0, 0, 0.6)">5</span>
                </p>
              </div>
              <h1 class="p-text-2" style="font-weight: 300; text-align: left">
                IDR <?= money($data['price']) ?>
              </h1>
              <p
                class="f-p-text"
                style="color: rgba(0, 0, 0, 0.6); margin: 10px 0; width: 67%;"
              >
                <?= $data['description'] ?>
              </p>
              <div class="color-detail">
                <img src="image/product/Line 4.png" alt="" />
                <p
                  class="f-p-text"
                  style="color: rgba(0, 0, 0, 0.6); margin: 15px 0 0 0"
                >
                  Select Colors :
                </p>
                <div class="d-flex">
                  <?php
                  $color = explode(" | ", $data['color']);
                  if ($data['color'] == NULL) {
                    echo'
                        <span class="badge bg-success-transparent" style="margin:20px 0;">Tidak Ada Warna</span>
                        ';
                  }else{
                      for ($i=0; $i < count($color); $i++) { 
                        echo '
                          <div class="form-check form-check-lg">
                            <input class="form-check-input" style="background-color: ' . $color[$i] .';" type="radio" name="color" id="Radio-lg" value="'. $color[$i] .'">
                          </div>
                          ';
                      }
                  }
                  ?>
                </div>
                <img src="image/product/Line 4.png" alt="" />
              </div>
              <div class="size-detail">
                <p
                  class="f-p-text"
                  style="color: rgba(0, 0, 0, 0.6); margin: 15px 0 0 0"
                >
                  Choose Size :
                </p>
                <div class="d-flex">
                  <input type="hidden" name="size" value="<?= $data['size'] ?>">
                  <button class="button-1"><?= $data['size'] ?></button>
                </div>
                <img src="image/product/Line 4.png" alt="" />
              </div>
              <div class="add-detail">
                <input type="hidden" class="dataCart" name="qtyCart">
                <div class="d-flex align-i-center add-1">
                  <a href=""
                  ><img src="image/Icon/minus.png" alt="" width="20"
                  /></a>
                  <p
                    class="f-p-text qtyCart"
                    style="
                      color: rgba(0, 0, 0, 0.6);
                      margin: 0;
                      font-size: 25px;
                      height: 39px;
                    "
                  >100</p>
                  <a href=""
                    ><img src="image/Icon/plus.png" alt="" width="20" height="20"
                  /></a>
                </div>
                <div class="">
                  <button class="button-2 add_cart" type="submit" name="addCart">Add Cart</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <section class="container-product">
      <div
        class="d-flex justify-c-evenly"
        style="background-color: rgba(102, 195, 163, 0.275)"
      >
        <button class="button-3" data-target="collapsibleContent1">
          Product Details
        </button>
        <button class="button-3 active" data-target="collapsibleContent2">
          Rating & Reviews
        </button>
        <button class="button-3" data-target="collapsibleContent3">FAQs</button>
      </div>
      <div class="collapsibleContent">
        <div class="d-flex nav-rating">
          <h1 class="h-text-9">All Reviews</h1>
          <button class="button-4" style="border-radius: 50%; padding: 10px">
            <img src="image/Icon/sort.png" alt="" width="25" height="25" />
          </button>
          <button class="button-4">Latest</button>
          <button
            class="button-4"
            style="background-color: black; color: white"
          >
            Write a Review
          </button>
        </div>
        <div class="nav-content">
          <div class="row d-flex justify-c-around">
            <div class="col-6">
              <div class="container-content">
                <div class="d-flex star-product">
                  <img src="image/Icon/star-100.png" alt="" />
                  <img src="image/Icon/star-100.png" alt="" />
                  <img src="image/Icon/star-100.png" alt="" />
                  <img src="image/Icon/star-100.png" alt="" />
                  <img
                    src="image/Icon/star-50.png"
                    alt=""
                    style="margin-right: auto"
                  />
                  <img src="image/Icon/options.png" alt="" />
                </div>
                <div class="d-flex">
                  <h1 class="h-text-9" style="margin-right: 5px">
                    Samantha D.
                  </h1>
                  <img src="image/Icon/verified.png" alt="" />
                </div>
                <p class="f-p-text">
                  "I absolutely love this t-shirt! The design is unique and the
                  fabric feels so comfortable. As a fellow designer, I
                  appreciate the attention to detail. It's become my favorite
                  go-to shirt."
                </p>
                <p class="f-p-text">Posted on August 14, 2023</p>
              </div>
            </div>
            <div class="col-6">
              <div class="container-content">
                <div class="d-flex star-product">
                  <img src="image/Icon/star-100.png" alt="" />
                  <img src="image/Icon/star-100.png" alt="" />
                  <img src="image/Icon/star-100.png" alt="" />
                  <img src="image/Icon/star-100.png" alt="" />
                  <img
                    src="image/Icon/star-50.png"
                    alt=""
                    style="margin-right: auto"
                  />
                  <img src="image/Icon/options.png" alt="" />
                </div>
                <div class="d-flex">
                  <h1 class="h-text-9" style="margin-right: 5px">Alex M.</h1>
                  <img src="image/Icon/verified.png" alt="" />
                </div>
                <p class="f-p-text">
                  "The t-shirt exceeded my expectations! The colors are vibrant
                  and the print quality is top-notch. Being a UI/UX designer
                  myself, I'm quite picky about aesthetics, and this t-shirt
                  definitely gets a thumbs up from me."
                </p>
                <p class="f-p-text">Posted on August 15, 2023</p>
              </div>
            </div>
          </div>
          <div class="d-flex justify-c-center">
            <button class="button-5">Load More Reviews</button>
          </div>
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
          <p class="f-p-text"><a href="#">T-Shirt</a></p>
          <p class="f-p-text"><a href="#">Heardwear</a></p>
          <p class="f-p-text"><a href="#">Lanyard</a></p>
          <p class="f-p-text"><a href="#">Totebag</a></p>
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
    <!-- <script src="js/script.js"></script> -->
    <script src="system/html/vendors/jquery/dist/jquery.min.js"></script>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    // console.log(dataCart);
    $(document).on("click", ".add_cart", function() {
      var dataCart = $(".qtyCart").text();
      $(".dataCart").val(dataCart);
    });
  });
</script>