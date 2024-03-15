<?php
include 'config/koneksi.php';
include 'config/appcode.php';

$name = "";
$kategori = "";
$size = "";
$qty = "";
$price = "";
$description = "";
$color = "";
$date = "";
$time = "";
$status = "";

if ($_GET['id_product'] !== "new") {
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_product WHERE id_product = '". $_GET['id_product'] ."'"));
    $name = $data['name'];
    $kategori = $data['kategori'];
    $size = $data['size'];
    $qty = $data['qty'];
    $price = $data['price'];
    $description = $data['description'];
    $color = explode(" | ", $data['color']);
    $create_at = explode(" ", $data['created_at']);
    $date = $create_at[0];
    $time = $create_at[1];
    $status = $data['status'];
}

if (isset($_POST['save'])) {
    $id_product = generate_product();
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $colorSelect = $_POST['color'];
    $color = "";
    for ($i=0; $i < count($colorSelect); $i++) { 
        if ($colorSelect[$i] == end($colorSelect)) {
            $color .= $colorSelect[$i];
        }else {
            $color .= $colorSelect[$i] . " | ";
        }
    }
    
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = $_POST['description'];
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $path_photo = "";
    if (isset($_FILES['photo']['name'])) {
        for ($i = 0; $i < count($_FILES['photo']['name']); $i++) {
            $foto = $_FILES['photo']['name'][$i];
            $img_ext = "pdf, PDF, jpeg, JPEG, png, PNG, gif, GIF, bmp, BMP, svg, SVG";
            $max_size = 10 * 1024 * 1024;

            if ($_FILES['photo']['name'][$i] !== "") {
                $sumber = $_FILES['photo']['tmp_name'][$i];
                $tujuan = '../../image/product/' . $_FILES['photo']['name'][$i];

                move_uploaded_file($sumber, $tujuan);
                $path_photo = $path_photo . "image/product/" . $_FILES['photo']['name'][$i] . " | ";
            }
        }
    }

    if ($_GET['id_product'] == "new") {
        $addData = mysqli_query($conn, "INSERT INTO tb_product
                                        (`id_product`, `name`, `kategori`, `size`, `color`, `description`, `price`, `qty`, `status`, `created_at`, `foto`)
                                        VALUES
                                        (
                                            '". $id_product ."',
                                            '". $name ."',
                                            '". $kategori ."',
                                            '". $size ."',
                                            '". $color ."',
                                            '". $description ."',
                                            '". $price ."',
                                            '". $qty ."',
                                            '". $status."',
                                            '". $date . ' ' . $time ."',
                                            '". $path_photo ."'
                                        )");
        if ($addData) {
            $msg_status = "Simpan Data berhasil !";
        } else {
            $msg_status = "Simpan Data gagal !";
        }
    }else {
        $path_photo = "";
        if (isset($_FILES['photo']['name'])) {
            for ($i = 0; $i < count($_FILES['photo']['name']); $i++) {
                $foto = $_FILES['photo']['name'][$i];
                $img_ext = "pdf, PDF, jpeg, JPEG, png, PNG, gif, GIF, bmp, BMP, svg, SVG";
                $max_size = 10 * 1024 * 1024;

                if ($_FILES['photo']['name'][$i] !== "") {
                    $sumber = $_FILES['photo']['tmp_name'][$i];
                    $tujuan = '../../image/product/' . $_FILES['photo']['name'][$i];

                    move_uploaded_file($sumber, $tujuan);
                    $path_photo = $path_photo . "image/product/" . $_FILES['photo']['name'][$i] . " | ";
                }
            }
        }

        $link_photo = "";
        if ($path_photo !== "") {
            $link_photo = "foto='" . $path_photo . "',";
        }

        $updateData = mysqli_query($conn, "UPDATE tb_product SET
                                            name = '" . $name . "',
                                            kategori = '" . $kategori . "',
                                            size = '" . $size . "',
                                            color = '" . $color . "',
                                            description = '" . $description . "',
                                            price = '" . $price . "',
                                            qty = '" . $qty . "',
                                            status = '" . $status . "',
                                            " . $link_photo . "
                                            created_at = '" . $date . ' ' . $time . "'
                                            WHERE id_product = '" . $_GET['id_product'] . "'"
                                    );
        if ($updateData) {
            $msg_status = "Ubah Data berhasil !";
        } else {
            $msg_status = "Ubah Data gagal !";
        }
    }
    echo '
        <script>
            alert("' . $msg_status . '");
            window.location.href="product.php";
        </script>
        ';
}


if ($_GET['id_product'] == "new") {
    $title = "Add Product";
}else {
    $title = "Update Product";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Sash – Bootstrap 5  Admin &amp; Dashboard Template </title>
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
	<meta name="keywords" content="admin dashboard,dashboard design htmlbootstrap admin template,html admin panel,admin dashboard html,admin panel html template,bootstrap dashboard,html admin template,html dashboard,html admin dashboard template,bootstrap dashboard template,dashboard html template,bootstrap admin panel,dashboard admin bootstrap,bootstrap admin dashboard">

    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">

    <!-- Choices JS -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

    <!-- Main Theme Js -->
    <script src="../assets/js/main.js"></script>

    <!-- Bootstrap Css -->
    <link id="style" href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

    <!-- Style Css -->
    <link href="../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../assets/libs/node-waves/waves.min.css" rel="stylesheet" >

    <!-- Simplebar Css -->
    <link href="../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="../assets/libs/quill/quill.snow.css">
    <link rel="stylesheet" href="../assets/libs/quill/quill.bubble.css">

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../assets/libs/prismjs/themes/prism-coy.min.css">

    <!-- Filepond CSS -->
    <link rel="stylesheet" href="../assets/libs/filepond/filepond.min.css">
    <link rel="stylesheet" href="../assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
    <link rel="stylesheet" href="../assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.css">
    <link rel="stylesheet" href="../assets/libs/dropzone/dropzone.css">

    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="../assets/libs/flatpickr/flatpickr.min.css">

</head>

<body>

    <?php include 'switcher.php' ?>

    <!-- Loader -->
    <div id="loader" >
        <img src="../assets/images/media/loader.svg" alt="">
    </div>
    <!-- Loader -->

    <div class="page">

        <?php include 'header.php' ?>

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                  <h1 class="page-title my-auto"><?= $title ?></h1>
                  <div>
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item">
                        <a href="product.php">Product</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                    </ol>
                  </div>
                </div>
                <!-- PAGE-HEADER END -->


                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-body add-products p-0">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="p-4">
                                        <div class="row gx-5">
                                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                                <div class="card custom-card shadow-none mb-0 border-0">
                                                    <div class="card-body p-0">
                                                        <div class="row gy-3">
                                                            <div class="col-xl-12">
                                                                <label for="product-name-add" class="form-label">Product Name</label>
                                                                <input type="text" class="form-control" id="product-name-add" name="name" value="<?= $name ?>" placeholder="Name" required>
                                                                <label for="product-name-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Product Name should not exceed 30 characters</label>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="product-category-add" class="form-label">Category</label>
                                                                <select class="form-control" data-trigger id="product-category-add" name="kategori" required>
                                                                    <option value="">Category</option>
                                                                    <option <?php if ($kategori == "T-Shirt") { echo 'selected'; } ?> value="T-Shirt">T-Shirt</option>
                                                                    <option <?php if ($kategori == "Headware") { echo 'selected'; } ?> value="Headware">Headware</option>
                                                                    <option <?php if ($kategori == "Lanyard") { echo 'selected'; } ?> value="Lanyard">Lanyard</option>
                                                                    <option <?php if ($kategori == "Totebag") { echo 'selected'; } ?> value="Totebag">Totebag</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="product-size-add" class="form-label">Size</label>
                                                                <select class="form-control" data-trigger id="product-size-add" name="size" required>
                                                                    <option value="">Size</option>
                                                                    <option <?php if ($size == "X-Small") { echo 'selected'; } ?> value="X-Small">X-Small</option>
                                                                    <option <?php if ($size == "Small") { echo 'selected'; } ?> value="Small">Small</option>
                                                                    <option <?php if ($size == "Medium") { echo 'selected'; } ?> value="Medium">Medium</option>
                                                                    <option <?php if ($size == "Large") { echo 'selected'; } ?> value="Large">Large</option>
                                                                    <option <?php if ($size == "X-Large") { echo 'selected'; } ?> value="X-Large">X-Large</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-4">
                                                                <label for="product-cost-add" class="form-label">Quantity</label>
                                                                <input type="number" class="form-control" id="product-cost-add" name="qty" value="<?= $qty ?>" placeholder="Quantity" required>
                                                                <label for="product-cost-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Mention final Quantity of the product</label>
                                                            </div>
                                                            <div class="col-xl-6 color-selection">
                                                                <label for="product-color-add" class="form-label">Colors</label>
                                                                <?php
                                                                if ($_GET['id_product'] !== "new") {
                                                                ?>
                                                                <select class="form-control" id="product-color-add" name="color[]" multiple required>
                                                                    <option <?php if (in_array("White", $color)) { echo 'selected'; } ?> value="White">White</option>
                                                                    <option <?php if (in_array("Black", $color)) { echo 'selected'; } ?> value="Black">Black</option>
                                                                    <option <?php if (in_array("Red", $color)) { echo 'selected'; } ?> value="Red">Red</option>
                                                                    <option <?php if (in_array("Orange", $color)) { echo 'selected'; } ?> value="Orange">Orange</option>
                                                                    <option <?php if (in_array("Yellow", $color)) { echo 'selected'; } ?> value="Yellow">Yellow</option>
                                                                    <option <?php if (in_array("Green", $color)) { echo 'selected'; } ?> value="Green">Green</option>
                                                                    <option <?php if (in_array("Blue", $color)) { echo 'selected'; } ?> value="Blue">Blue</option>
                                                                    <option <?php if (in_array("Pink", $color)) { echo 'selected'; } ?> value="Pink">Pink</option>
                                                                    <option <?php if (in_array("Purple", $color)) { echo 'selected'; } ?> value="Purple">Purple</option>
                                                                </select>
                                                                <?php
                                                                }else {
                                                                ?>
                                                                <select class="form-control" id="product-color-add" name="color[]" multiple required>
                                                                    <option value="White">White</option>
                                                                    <option value="Black">Black</option>
                                                                    <option value="Red">Red</option>
                                                                    <option value="Orange">Orange</option>
                                                                    <option value="Yellow">Yellow</option>
                                                                    <option value="Green">Green</option>
                                                                    <option value="Blue">Blue</option>
                                                                    <option value="Pink">Pink</option>
                                                                    <option value="Purple">Purple</option>
                                                                </select>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="product-cost-add" class="form-label">Enter Price</label>
                                                                <input type="text" class="form-control" id="product-cost-add" name="price" value="<?= $price ?>" placeholder="Price" required>
                                                                <label for="product-cost-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Mention final price of the product</label>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <label for="product-description-add" class="form-label">Product Description</label>
                                                                <textarea class="form-control" id="product-description-add" name="description" rows="10" required><?= $description ?></textarea>
                                                                <label for="product-description-add" class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Description should not exceed 500 letters</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                                <div class="card custom-card shadow-none mb-0 border-0">
                                                    <div class="card-body p-0">
                                                        <div class="row gy-4">
                                                            <div class="col-xl-12 product-documents-container">
                                                                <p class="fw-semibold mb-2 fs-14">Product Images :</p>
                                                                <!-- <input type="file" class="" name="photo[]" multiple > -->
                                                                <input class="form-control" type="file" name="photo[]" id="formFileMultiple" multiple/>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="publish-date" class="form-label">Publish Date</label>
                                                                <input type="text" class="form-control" id="publish-date" placeholder="Choose date" name="date" value="<?= $date ?>" required>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <label for="publish-time" class="form-label">Publish Time</label>
                                                                <input type="text" class="form-control" id="publish-time" placeholder="Choose time" name="time" value="<?= $time ?>" required>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <label for="product-status-add" class="form-label">Published Status</label>
                                                                <select class="form-control" data-trigger name="status" id="product-status-add" required>
                                                                    <option value="">Select</option>
                                                                    <option <?php if ($status == 1) { echo 'selected'; } ?> value="1">Published</option>
                                                                    <option <?php if ($status == 2) { echo 'selected'; } ?> value="2">Scheduled</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-xl-6 d-none">
                                                                <label for="product-tags" class="form-label">Product Tags</label>
                                                                <select class="form-control" name="product-tags" id="product-tags" multiple>
                                                                    <option value="Relaxed" selected>Relaxed</option>
                                                                    <option value="Solid">Solid</option>
                                                                    <option value="Washed">Washed</option>
                                                                    <option value="Plain" selected>Plain</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                                        <?php
                                        if ($_GET['id_product'] == "new") {
                                            echo'
                                                <button class="btn btn-primary-light m-1" type="submit" name="save">Add Product<i class="bi bi-download ms-2"></i></button>
                                            ';
                                        }else {
                                            echo'
                                                <button class="btn btn-success-light m-1" type="submit" name="save">Update Product<i class="las la-edit ms-2"></i></button>
                                            ';
                                        }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="input-group">
                    <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                    <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Username">
                    <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i class="fe fe-mic header-link-icon"></i></a>
                    <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="mt-4">
                    <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p>
                    <span class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                  </div>
                  <div class="my-4">
                    <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                      <a href="notifications.html"><span>Notifications</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                      <a href="alerts.html"><span>Alerts</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                      <a href="mail.html"><span>Mail</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="btn-group ms-auto">
                    <button class="btn btn-sm btn-primary-light">Search</button>
                    <button class="btn btn-sm btn-primary">Clear Recents</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- Start Switcher -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar-right" aria-labelledby="offcanvasRightLabel2">
            <div class="offcanvas-header border-bottom bg-primary text-fixed-white">
                <h6 class="offcanvas-title d-inline-flex text-fixed-white" id="offcanvasRightLabel2">
                    <span class=" me-2 d-inline-flex">
                        <i class="fe fe-bell my-auto"></i> <span class=" pulse w-9 h-9 bg-success rounded-circle"></span>
                    </span>
                    Notifications
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <nav class="nav nav-tabs nav-justified" role="tablist">
                    <button class="nav-link active" id="sidebar-side1" data-bs-toggle="tab" data-bs-target="#sidebar-slidepane-1"
                        type="button" role="tab" aria-controls="sidebar-slidepane-1" aria-selected="true"><i class="d-inline-flex fe fe-settings me-1"></i> Feeds</button>
                    <button class="nav-link" id="sidebar-side2" data-bs-toggle="tab" data-bs-target="#sidebar-slidepane-2"
                        type="button" role="tab" aria-controls="sidebar-slidepane-2" aria-selected="false"><i class="d-inline-flex fe fe-message-circle me-1"></i>Chat</button>
                    <button class="nav-link" id="sidebar-side3" data-bs-toggle="tab" data-bs-target="#sidebar-slidepane-3"
                        type="button" role="tab" aria-controls="sidebar-slidepane-3" aria-selected="false"><i class="d-inline-flex fe fe-anchor me-1"></i>Timeline</button>
                </nav>
                <div class="tab-content">
                    <div class="tab-pane fade show active border-0 p-0" id="sidebar-slidepane-1" role="tabpanel" aria-labelledby="sidebar-side1" tabindex="0">
                        <div class="p-3 fw-semibold">Feeds</div>
                        <div class="py-3 px-4 pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-primary-transparent"><i class="fe fe-user text-primary"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">New user registered</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings me-1"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-secondary-transparent"><i class="fe fe-shopping-cart text-secondary"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">New order delivered</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings me-1"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-danger-transparent"><i class="fe fe-bell text-danger"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">You have pending tasks</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings me-1"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-warning-transparent"><i class="fe fe-gitlab text-warning"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">New version arrived</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings me-1"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-pink-transparent"><i class="fe fe-database text-pink"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">Server #1 overloaded</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings me-1"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-info-transparent"><i class="fe fe-check-circle text-info"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">New project launched</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings me-1"></i></a>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 fw-semibold">Settings</div>
                        <div class="py-3 px-4 pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-primary-transparent"><i class="fe fe-settings text-primary"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">General Settings</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-secondary-transparent"><i class="fe fe-map-pin text-secondary"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">Map Settings</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-danger-transparent"><i class="fe fe-headphones text-danger"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">Support Settings</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-warning-transparent"><i class="fe fe-credit-card text-warning"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">Payment  Settings</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 mb-sm-0 mb-3">
                                    <span class="feeds avatar avatar-sm avatar-rounded bg-pink-transparent"><i class="fe fe-bell text-pink"></i></span>
                                </div>
                                <div class="col-sm-10 ps-sm-0 my-auto">
                                    <div class="d-flex align-items-end justify-content-between ms-2">
                                        <h6 class="mb-0 fw-normal fs-14">Notification Settings</h6>
                                        <div>
                                            <a aria-label="anchor" href="javascript:void(0)" class="text-primary"><i class="fe fe-settings"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade border-0 p-0" id="sidebar-slidepane-2" role="tabpanel" aria-labelledby="sidebar-side2" tabindex="0">
                        <div class="p-3 fw-semibold">Today</div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/2.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark" >Addie Minstra</div>
                                    <p class="mb-0 fs-12 text-muted"> Hey! there I' am available.... </p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md online avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/11.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Rose Bush</div>
                                    <p class="mb-0 fs-12 text-muted"> Okay...I will be waiting for you </p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/10.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Claude Strophobia</div>
                                    <p class="mb-0 fs-12 text-muted"> Hi we can explain our new project......</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/13.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Eileen Dover</div>
                                    <p class="mb-0 fs-12 text-muted"> New product Launching...</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md online avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/12.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Willie Findit</div>
                                    <p class="mb-0 fs-12 text-muted"> Okay...I will be waiting for you </p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/15.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Manny Jah</div>
                                    <p class="mb-0 fs-12 text-muted">  Hi we can explain our new project......</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-0 px-3">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/4.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Cherry Blossom</div>
                                    <p class="mb-0 fs-12 text-muted"> Hey! there I' am available....</p>
                                </a>
                            </div>
                        </div>
                        <div class="p-3 fw-semibold">Yesterday</div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md online avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/7.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Simon Sais</div>
                                    <p class="mb-0 fs-12 text-muted">Schedule Realease...... </p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/9.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Laura Biding</div>
                                    <p class="mb-0 fs-12 text-muted">Hi we can explain our new project...... </p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md online avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/2.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Addie Minstra</div>
                                    <p class="mb-0 fs-12 text-muted">Contact me for details....</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/9.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Ivan Notheridiya</div>
                                    <p class="mb-0 fs-12 text-muted">Hi we can explain our new project......</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/14.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Dulcie Veeta</div>
                                    <p class="mb-0 fs-12 text-muted"> Okay...I will be waiting for you</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/11.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Florinda Carasco</div>
                                    <p class="mb-0 fs-12 text-muted">New product Launching...</p>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center py-3 px-3 pt-0">
                            <div class="me-2">
                                <span class="avatar avatar-md online avatar-rounded cover-image"  data-bs-image-src="../assets/images/faces/11.jpg"></span>
                            </div>
                            <div class="">
                                <a href="chat.html">
                                    <div class="fw-semibold text-dark">Cherry Blossom</div>
                                    <p class="mb-0 fs-12 text-muted">cherryblossom@gmail.com</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade border-0 p-3" id="sidebar-slidepane-3" role="tabpanel" aria-labelledby="sidebar-side3" tabindex="0">
                        <ul class="task-list timeline-task">
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold fs-14">Task Finished<span
                                            class="text-muted fs-11 mx-2 fw-normal">09 July 2021</span></h6>
                                    <p class="text-muted fs-12 mb-0">Adam Berry finished task on<a href="javascript:void(0)" class="fw-semibold text-primary"> Project Management</a></p>
                                </div>
                                <div class="ms-auto d-md-flex task-icon-link">
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted me-2"><i class="fe fe-edit"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted"><i class="fe fe-trash-2 fs-12"></i></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold fs-14">New Comment<span
                                            class="text-muted fs-11 mx-2 fw-normal">05 July 2021</span></h6>
                                    <p class="text-muted fs-12 mb-0">Victoria commented on Project <a href="javascript:void(0)"
                                            class="fw-semibold text-primary"> AngularJS Template</a></p>
                                </div>
                                <div class="ms-auto d-md-flex task-icon-link">
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted me-2"><i class="fe fe-edit"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted"><i class="fe fe-trash-2 fs-12"></i></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold fs-14">New Comment<span
                                            class="text-muted fs-11 mx-2 fw-normal">25 June 2021</span></h6>
                                    <p class="text-muted fs-12 mb-0">Victoria commented on Project <a href="javascript:void(0)"
                                            class="fw-semibold text-primary"> AngularJS Template</a></p>
                                </div>
                                <div class="ms-auto d-md-flex task-icon-link">
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted me-2"><i class="fe fe-edit"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted"><i class="fe fe-trash-2 fs-12"></i></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold fs-14">Task Overdue<span
                                            class="text-muted fs-11 mx-2 fw-normal">14 June 2021</span></h6>
                                    <p class="text-muted mb-0 fs-12">Petey Cruiser finished task <a href="javascript:void(0)"
                                            class="fw-semibold text-primary"> Integrated management</a></p>
                                </div>
                                <div class="ms-auto d-md-flex task-icon-link">
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted me-2"><i class="fe fe-edit"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted"><i class="fe fe-trash-2 fs-12"></i></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold fs-14">Task Overdue<span
                                            class="text-muted fs-11 mx-2 fw-normal">29 June 2021</span></h6>
                                    <p class="text-muted mb-0 fs-12">Petey Cruiser finished task <a href="javascript:void(0)"
                                            class="fw-semibold text-primary"> Integrated management</a></p>
                                </div>
                                <div class="ms-auto d-md-flex task-icon-link">
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted me-2"><i class="fe fe-edit"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted"><i class="fe fe-trash-2 fs-12"></i></a>
                                </div>
                            </li>
                            <li class="d-sm-flex">
                                <div>
                                    <i class="task-icon1"></i>
                                    <h6 class="fw-semibold fs-14">Task Finished<span
                                            class="text-muted fs-11 mx-2 fw-normal">09 July 2021</span></h6>
                                    <p class="text-muted fs-12 mb-0">Adam Berry finished task on<a href="javascript:void(0)"
                                            class="fw-semibold text-primary"> Project Management</a></p>
                                </div>
                                <div class="ms-auto d-md-flex task-icon-link">
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted me-2"><i class="fe fe-edit"></i></a>
                                    <a aria-label="anchor" href="javascript:void(0)" class="text-muted"><i class="fe fe-trash-2 fs-12"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Switcher -->


        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 text-center">
            <div class="container">
                <span class=""> Copyright © <span id="year"></span> <a
                        href="javascript:void(0);" class="text-primary">Sash</a>.
                    Designed with <span class="bi bi-heart-fill text-danger"></span> by <a href="javascript:void(0);">
                        <span class="text-primary">Spruko</span>
                    </a> All
                    rights
                    reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->

    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <!-- <script src="../assets/js/simplebar.js"></script> -->

    <!-- Color Picker JS -->
    <script src="../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    
    <!-- Custom-Switcher JS -->
    <script src="../assets/js/custom-switcher.min.js"></script>

    <!-- Date & Time Picker JS -->
    <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>

    <!-- Quill Editor JS -->
    <script src="../assets/libs/quill/quill.min.js"></script>

    <!-- Internal Quill JS -->
    <script src="../assets/js/quill-editor.js"></script>

    <!-- Prism JS -->
    <script src="../assets/libs/prismjs/prism.js"></script>
    <script src="../assets/js/prism-custom.js"></script>

    <!-- Filepond JS -->
    <script src="../assets/libs/filepond/filepond.min.js"></script>
    <script src="../assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
    <script src="../assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="../assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
    <script src="../assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>
    <script src="../assets/libs/filepond-plugin-image-edit/filepond-plugin-image-edit.min.js"></script>
    <script src="../assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="../assets/libs/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
    <script src="../assets/libs/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
    <script src="../assets/libs/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
    <script src="../assets/libs/filepond-plugin-image-transform/filepond-plugin-image-transform.min.js"></script>

    <!-- Internal Add Products JS -->
    <script src="../assets/js/add-products.js"></script>

    <!-- Form Validation JS -->
    <script src="../assets/js/validation.js"></script>

    <!-- Dropzone JS -->
    <script src="../assets/libs/dropzone/dropzone-min.js"></script>

    <!-- Fileupload JS -->
    <script src="../assets/js/fileupload.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>


</body>

</html>