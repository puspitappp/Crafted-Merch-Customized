<?php
include 'system/html/config/koneksi.php';
include 'system/html/config/appcode.php';
session_start();

$id_cust = $_SESSION['id_cust'];

if (isset($_POST['checkout'])) {
  $updateData = mysqli_query($conn, "UPDATE tb_cart SET
                                            status = 'pay'
                                            WHERE id_customer = '" . $_SESSION['id_cust'] . "'"
                                    );
if ($updateData) {
  $msg_status = "Kamu telah Checkout !";
} else {
    $msg_status = "Kamu gagal Checkout !";
}
echo '
<script>
    alert("' . $msg_status . '");
    window.location.href="product.php";
</script>
';
}
?>
<!DOCTYPE html>
<html
  lang="en"
  dir="ltr"
  data-nav-layout="vertical"
  data-theme-mode="light"
  data-header-styles="light"
  data-menu-styles="light"
  data-toggled="close"
>
  <head>
    <!-- Meta Data -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Sash – Bootstrap 5 Admin &amp; Dashboard Template</title>
    <meta
      name="Description"
      content="Bootstrap Responsive Admin Web Dashboard HTML5 Template"
    />
    <meta name="Author" content="Spruko Technologies Private Limited" />
    <meta
      name="keywords"
      content="admin dashboard,dashboard design htmlbootstrap admin template,html admin panel,admin dashboard html,admin panel html template,bootstrap dashboard,html admin template,html dashboard,html admin dashboard template,bootstrap dashboard template,dashboard html template,bootstrap admin panel,dashboard admin bootstrap,bootstrap admin dashboard"
    />

    <!-- Favicon -->
    <link
      rel="icon"
      href="system/assets/images/brand-logos/favicon.ico"
      type="image/x-icon"
    />

    <!-- Choices JS -->
    <script src="system/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Main Theme Js -->
    <script src="system/assets/js/main.js"></script>

    <!-- Bootstrap Css -->
    <link
      id="style"
      href="system/assets/libs/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Style Css -->
    <link href="system/assets/css/styles.min.css" rel="stylesheet" />

    <!-- Icons Css -->
    <link href="system/assets/css/icons.css" rel="stylesheet" />

    <!-- Node Waves Css -->
    <link href="system/assets/libs/node-waves/waves.min.css" rel="stylesheet" />

    <!-- Simplebar Css -->
    <link href="system/assets/libs/simplebar/simplebar.min.css" rel="stylesheet" />

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="system/assets/libs/flatpickr/flatpickr.min.css" />
    <link
      rel="stylesheet"
      href="system/assets/libs/@simonwep/pickr/themes/nano.min.css"
    />

    <!-- Choices Css -->
    <link
      rel="stylesheet"
      href="system/assets/libs/choices.js/public/assets/styles/choices.min.css"
    />

    <link
      rel="stylesheet"
      href="system/assets/libs/sweetalert2/sweetalert2.min.css"
    />
  </head>

  <body>

    <!-- Loader -->
    <div id="loader">
      <img src="system/assets/images/media/loader.svg" alt="" />
    </div>
    <!-- Loader -->

    <div class="page">
      <div class="main-content app-content" style="margin-block-start: 0px; margin-inline-start: 0px;">
        <div class="container-fluid">
          <!-- PAGE-HEADER -->
          <div class="page-header">
            <h1 class="page-title my-auto">Cart</h1>
            <div>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                  <a href="javascript:void(0)">Cart</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
              </ol>
            </div>
          </div>
          <!-- PAGE-HEADER END -->

          <!-- Start::row-1 -->
          <form action="" method="post">
            <div class="row daftar_cart">
              <div class="col-xxl-9">
                <div class="card custom-card" id="cart-container-delete">
                  <div class="card-header">
                    <div class="card-title">Cart Items</div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered text-nowrap">
                        <thead>
                          <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = mysqli_query($conn, "SELECT a.*, b.name, b.price FROM tb_cart a
                                                        JOIN tb_product AS b ON a.id_product = b.id_product WHERE id_customer = '". $id_cust ."' AND a.status = 'cart'");
                          while ($row = mysqli_fetch_assoc($query)) {
                            $id_cart = $row['id_cart'];
                            $id_product = $row['id_product'];
                          ?>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <div class="me-3">
                                  <span class="avatar avatar-xxl bg-light">
                                    <img
                                      src="system/assets/images/ecommerce/orders/12.jpg"
                                      alt=""
                                    />
                                  </span>
                                </div>
                                <div>
                                  <div class="mb-1 fs-14 fw-semibold">
                                    <a href="javascript:void(0);"
                                      ><?= $row['name'] ?></a
                                    >
                                  </div>
                                  <div class="mb-1">
                                    <span
                                      class="me-1 d-inline-flex align-items-center"
                                      >Size:</span
                                    ><span class="fw-semibold text-muted"
                                      ><?= $row['size'] ?></span
                                    >
                                  </div>
                                  <div class="mb-1">
                                    <span
                                      class="me-1 d-inline-flex align-items-center"
                                      >Color:</span
                                    ><span class="fw-semibold text-muted"
                                      ><?= $row['color'] ?><span
                                        class="badge bg-success-transparent ms-3"
                                        >In Offer</span
                                      ></span
                                    >
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td>
                              <div class="fw-semibold fs-14">Rp.<?= money($row['price']) ?></div>
                            </td>
                            <td class="product-quantity-container">
                              <div class="input-group border rounded flex-nowrap">
                                <button
                                  type="button" name=""
                                  class="btn btn-icon btn-light input-group-text flex-fill border-0 ubah_data_qty_kurang" data-no_id="<?= $id_cart ?>" data-id_prd="<?= $id_product ?>"
                                >
                                  <i class="ri-subtract-line"></i>
                                </button>
                                <input
                                  type="text"
                                  class="form-control form-control-sm border-0 text-center w-100"
                                  value="<?= $row['qty'] ?>"
                                />
                                <button
                                  type="button"
                                  class="btn btn-icon btn-light input-group-text flex-fill border-0 ubah_data_qty_tambah" data-no_id="<?= $id_cart ?>" data-id_prd="<?= $id_product ?>"
                                >
                                  <i class="ri-add-line"></i>
                                </button>
                              </div>
                            </td>
                            <td>
                              <div class="fs-14 fw-semibold"><?= money($row['biaya']) ?></div>
                            </td>
                            <td>
                              <a
                                href="wishlist.html"
                                class="btn btn-icon btn-success me-1 d-none"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                data-bs-title="Add To Wishlist"
                                ><i class="ri-heart-line"></i
                              ></a>
                              <button
                                type="button"
                                class="btn btn-icon btn-danger deleteData"
                                data-id_hapus="<?= $id_cart ?>"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                data-bs-title="Remove From cart"
                              >
                                <i class="ri-delete-bin-line"></i>
                              </button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card custom-card d-none" id="cart-empty-cart">
                  <div class="card-header">
                    <div class="card-title">Empty Cart</div>
                  </div>
                  <div class="card-body">
                    <div class="cart-empty text-center">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="svg-muted"
                        width="24"
                        height="24"
                        viewbox="0 0 24 24"
                      >
                        <path
                          d="M18.6 16.5H8.9c-.9 0-1.6-.6-1.9-1.4L4.8 6.7c0-.1 0-.3.1-.4.1-.1.2-.1.4-.1h17.1c.1 0 .3.1.4.2.1.1.1.3.1.4L20.5 15c-.2.8-1 1.5-1.9 1.5zM5.9 7.1 8 14.8c.1.4.5.8 1 .8h9.7c.5 0 .9-.3 1-.8l2.1-7.7H5.9z"
                        />
                        <path
                          d="M6 10.9 3.7 2.5H1.3v-.9H4c.2 0 .4.1.4.3l2.4 8.7-.8.3zM8.1 18.8 6 11l.9-.3L9 18.5z"
                        />
                        <path
                          d="M20.8 20.4h-.9V20c0-.7-.6-1.3-1.3-1.3H8.9c-.7 0-1.3.6-1.3 1.3v.5h-.9V20c0-1.2 1-2.2 2.2-2.2h9.7c1.2 0 2.2 1 2.2 2.2v.4z"
                        />
                        <path
                          d="M8.9 22.2c-1.2 0-2.2-1-2.2-2.2s1-2.2 2.2-2.2c1.2 0 2.2 1 2.2 2.2s-1 2.2-2.2 2.2zm0-3.5c-.7 0-1.3.6-1.3 1.3 0 .7.6 1.3 1.3 1.3.8 0 1.3-.6 1.3-1.3 0-.7-.5-1.3-1.3-1.3zM18.6 22.2c-1.2 0-2.2-1-2.2-2.2s1-2.2 2.2-2.2c1.2 0 2.2 1 2.2 2.2s-.9 2.2-2.2 2.2zm0-3.5c-.8 0-1.3.6-1.3 1.3 0 .7.6 1.3 1.3 1.3.7 0 1.3-.6 1.3-1.3 0-.7-.5-1.3-1.3-1.3z"
                        />
                      </svg>
                      <h3 class="fw-bold mb-1">Your Cart is Empty</h3>
                      <h5 class="mb-3">Add some items to make me happy :)</h5>
                      <a
                        href="#"
                        class="btn btn-primary btn-wave m-3"
                        data-abc="true"
                        >continue shopping <i class="bi bi-arrow-right ms-1"></i
                      ></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xxl-3">
                <div class="card custom-card">
                  <div class="card-header justify-content-between">
                    <div class="card-title">Price Details</div>
                  </div>
                  <?php
                  $queryCart = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(biaya) AS ttl_ksl FROM tb_cart WHERE id_customer = '". $id_cust ."' AND status = 'cart'"));
                  $query = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_customer = '". $id_cust ."' AND status = 'cart'");
                  $totalQuery = mysqli_num_rows($query);
                  ?>
                  <div class="card-body p-0">
                    <div class="p-4 border-bottom border-block-end-dashed">
                      <div
                        class="d-flex align-items-center justify-content-between mb-3"
                      >
                        <div class="text-muted">Sub Total</div>
                        <div class="fw-semibold fs-14">Rp.<?= money($queryCart['ttl_ksl']) ?></div>
                      </div>
                      <div
                        class="d-flex align-items-center justify-content-between mb-0"
                      >
                        <div class="text-muted">Total Items</div>
                        <div class="fw-semibold fs-14 text-success">
                          <?= $totalQuery ?> Items
                        </div>
                      </div>
                    </div>
                    <div class="py-3 px-4">
                      <div
                        class="d-flex align-items-center justify-content-between"
                      >
                        <div class="fw-semibold fs-18">Total :</div>
                        <div class="fw-semibold fs-18">Rp.<?= money($queryCart['ttl_ksl']) ?></div>
                      </div>
                    </div>
                    <div class="p-3 border-top text-center">
                      <button type="submit" name="checkout" class="btn btn-primary m-1"
                        >Checkout</button
                      >
                      <a href="product.php" class="btn btn-light m-1"
                        >Countinue Shopping</a
                      >
                    </div>
                  </div>
                </div>
              </div>
          </form>
          </div>
          <!--End::row-1 -->
        </div>
      </div>
      <!-- End::app-content -->
    </div>

    <!-- Scroll To Top -->
    <div class="scrollToTop">
      <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="system/assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="system/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="system/assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="system/assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="system/assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="system/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="system/assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="system/assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

    <!-- Custom-Switcher JS -->
    <script src="system/assets/js/custom-switcher.min.js"></script>

    <!-- Sweetalerts JS -->
    <script src="system/assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Internal Cart JS -->
    <script src="system/assets/js/cart.js"></script>

    <!-- Custom JS -->
    <script src="system/assets/js/custom.js"></script>

    <!-- jQuery -->
    <script src="system/html/vendors/jquery/dist/jquery.min.js"></script>
  </body>
</html>

<script type="text/javascript">
  $(document).ready(function() {
      $(document).on("click", ".sentData", function() {
        var id_cart = $(this).data('id_cart');
        console.log(id_cart);
        $.ajax({
            type: "POST",
            url: "ajax/ajax_cart.php",
            data: {
                "sent_data": id_cart
            },
            cache: true,
            beforeSend: function(response) {
                // $(".preloader-it").show();
            },
            success: function(result) {
                // $(".preloader-it").hide();
                $(".data_cart").html(result);
                localStorage.setItem('sentData', true); // Menandai bahwa data telah dikirim
                localStorage.setItem('id_cart', id_cart);
            }
        });
      });

      $(document).on("click", ".ubah_data_qty_kurang", function() {
        var no_id = $(this).data('no_id');
        var id_prd = $(this).data('id_prd');
        // console.log(qty);
        // var uom = $(".uom_" + no_id).val();
        $.ajax({
            type: "POST",
            url: "system/html/ajax/ajax_cart.php",
            data: {
                "ubah_data_qty_kurang": no_id,
                "id_product": id_prd
            },
            cache: true,
            success: function(result) {
                $(".daftar_cart").html(result);
            }
        });
      });

      $(document).on("click", ".ubah_data_qty_tambah", function() {
        var no_id = $(this).data('no_id');
        var id_prd = $(this).data('id_prd');
        // console.log(qty);
        // var uom = $(".uom_" + no_id).val();
        $.ajax({
            type: "POST",
            url: "system/html/ajax/ajax_cart.php",
            data: {
                "ubah_data_qty_tambah": no_id,
                "id_product": id_prd
            },
            cache: true,
            success: function(result) {
                $(".daftar_cart").html(result);
            }
        });
      });

      $(document).on("click", ".deleteData", function() {
        var id_hapus = $(this).data('id_hapus');
        // $(".id_hapus2").val(id_hapus);
        // console.log(id_hapus);
        $.ajax({
            type: "POST",
            url: "system/html/ajax/ajax_cart.php",
            data: {
                "del_cart": id_hapus
            },
            cache: true,
            beforeSend: function(response) {
                $(".preloader-it").show();
            },
            success: function(result) {
                $(".preloader-it").hide();
                $(".daftar_cart").html(result);
            }
        });
      });
  });
</script>
