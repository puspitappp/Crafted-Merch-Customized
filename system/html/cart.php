<?php
include 'config/koneksi.php';
include 'config/appcode.php';

if (isset($_POST['delete'])) {
    $id_hapus = mysqli_real_escape_string($conn, $_POST['id_hapus']);
    $deleteData = mysqli_query($conn, "DELETE FROM tb_customer WHERE id_customer = '". $id_hapus ."'");
    if ($deleteData) {
        $msg_status = "Hapus Data berhasil !";
    } else {
        $msg_status = "Hapus Data gagal !";
    }
    echo '
        <script>
            alert("' . $msg_status . '");
            window.location.href="customer.php";
        </script>
        ';
}
// var_dump($_POST['id_cart']);
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

<!-- Prism CSS -->
<link rel="stylesheet" href="../assets/libs/prismjs/themes/prism-coy.min.css">

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

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                  <h1 class="page-title my-auto">Customer</h1>
                  <div>
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)">Tables</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">Tables</li>
                    </ol>
                  </div>
                </div>
                <!-- PAGE-HEADER END -->
                <div class="toast-container position-fixed top-0 end-0 p-3">
                    <div id="solid-successToast" class="toast colored-toast bg-success text-fixed-white" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-header bg-success text-fixed-white">
                            <i class="fe fe-bell header-link-icon" style="margin-right: 10px;"></i>
                            <strong class="me-auto">Information Delete</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <p id="testing">tes</p>
                        </div>
                    </div>
                </div>

                <!-- Start:: row-11 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <!-- <div class="card-header justify-content-between">
                                <div class="card-title">
                                    <a href="edit_customer.php?id_customer=new" class="btn btn-sm btn-primary-light">Tambah Data<i class="bi bi-plus-lg ms-2 d-inline-block align-middle"></i></a>
                                </div>
                                <div class="prism-toggle">
                                    <button class="btn d-none btn-sm btn-primary-light">Show Code<i class="ri-code-line ms-2 d-inline-block align-middle"></i></button>
                                </div>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive data_cart">
                                    <table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID Cart</th>
                                                <th scope="col">ID Customer</th>
                                                <th scope="col">ID Product</th>
                                                <th scope="col">Biaya</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysqli_query($conn, "SELECT * FROM tb_cart");
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                
                                            ?>
                                            <tr>
                                                <td><?= $row['id_cart'] ?></td>
                                                <td><?= $row['id_customer'] ?></td>
                                                <td>
                                                    <?= $row['id_product'] ?>
                                                    <button type="button" class="btn btn-info-light btn-wave" style="margin-left: 5px;" data-bs-toggle="popover"
                                                    data-bs-placement="top" data-bs-custom-class="header-info" data-bs-trigger="focus"
                                                    title="Informasi Data" 
                                                    data-bs-content='Color : <?= $row['color'] ?> <br>
                                                                     Size : <?= $row['size'] ?> <br>
                                                                     Qty : <?= $row['qty'] ?>'>
                                                    <i class="fe fe-alert-circle" style="margin-right: 5px;"></i>Info
                                                </button>
                                                </td>
                                                <td>Rp.<?= money($row['biaya']) ?></td>
                                                <td>
                                                    <?php 
                                                    if ($row['status'] == "cart") {
                                                        echo'
                                                            <span class="badge bg-light-transparent text-dark fs-15"><i class="ri-shopping-cart-2-line align-middle mw-1"></i>
                                                                Cart
                                                            </span>
                                                            ';
                                                    }elseif ($row['status'] == "pay") {
                                                        echo'
                                                            <div class="d-flex" style="align-items:center">
                                                                <span class="badge bg-warning-transparent fs-15"><i class="ri-bank-card-line align-middle mw-1"></i>
                                                                    Pay
                                                                </span>
                                                                <i class="las la-long-arrow-alt-right mx-2" style="font-size:20px"></i>
                                                                <button type="button" class="btn btn-sm btn-success btn-wave sentData" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-success"
                                                                    data-bs-placement="top" title="Klik untuk mengirim barang <br><br> Harap pastikan sudah selesai sebelum mengklik. Operasi ini tidak dapat diubah"
                                                                    data-id_cart="'. $row['id_cart'] .'">
                                                                    <i class="ri-truck-line align-middle mw-1"></i>
                                                                </button>
                                                            </div>
                                                            ';
                                                    }elseif ($row['status'] == "sent") {
                                                        echo'
                                                            <span class="badge bg-success-transparent fs-15"><i class="ri-truck-line align-middle mw-1"></i></i>
                                                                Sent
                                                            </span>
                                                            ';
                                                    }
                                                    ?>
                                                </td>
                                                <!-- <td>
                                                    <div class="hstack gap-2 fs-15">
                                                        <a href="edit_customer.php?id_customer=<?= $row['id_customer'] ?>" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                                                        <button type="button" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill hapus_button" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable2" data-id_hapus="<?= $row['id_customer'] ?>"><i class="ri-delete-bin-line"></i></button>
                                                    </div>
                                                </td> -->
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer d-none border-top-0">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End:: row-11 -->
                

            </div>
        </div>
        <!--APP-CONTENT CLOSE-->

        <div class="modal fade" id="exampleModalScrollable2" tabindex="-1"
            aria-labelledby="exampleModalScrollable2" data-bs-keyboard="false"
            aria-hidden="true">
            <!-- Scrollable modal -->
            <div class="modal-dialog modal-dialog-centered">
                <form action="" method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="staticBackdropLabel2">Delete Data
                            </h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control id_hapus" name="id_hapus">
                            <p>Apakah Anda Yakin Menghapus Data Ini ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger deleteData" data-bs-dismiss="modal" 
                                aria-label="Close">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

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
    <script src="../assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    
    <!-- Custom-Switcher JS -->
    <script src="../assets/js/custom-switcher.min.js"></script>

    <!-- Prism JS -->
    <script src="../assets/libs/prismjs/prism.js"></script>
    <script src="../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
</body>

</html>
<script type="text/javascript">
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl, {
            html: true // Mengaktifkan fitur HTML pada konten Popover
        });
    });
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            html: true // Mengaktifkan fitur HTML pada konten Popover
        });
    });


    // $(document).ready(function() {
    //     $(document).on("click", ".sentData", function() {
    //         var id_cart = $(this).data('id_cart');
    //         console.log(id_cart)
    //         $.ajax({
    //             type: "POST",
    //             url: "ajax/ajax_cart.php",
    //             data: {
    //                 "sent_data": id_cart
    //             },
    //             cache: true,
    //             beforeSend: function(response) {
    //                 // $(".preloader-it").show();
    //             },
    //             success: function(result) {
    //                 // $(".preloader-it").hide();
    //                 $(".data_cart").html(result);
    //                 localStorage.setItem('nama', id_cart);
    //             }
    //         });
    //     });
    // });

    
    // window.addEventListener('load', function() {
    //     const solidprimarytoastExample = document.getElementById('solid-dangerToast');
    //     const toast = new bootstrap.Toast(solidprimarytoastExample);
    //     toast.show();
    //     var idElement = document.querySelector('.data-id-hapus');
    //     idElement.textContent = id_hapus;
    //     console.log("tes");
    // });

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
    });

    window.addEventListener('load', function() {
        var sentData = localStorage.getItem('sentData');
        if (sentData) {
            var testing = document.getElementById('testing');
            testing.textContent = "barang dari ID " + localStorage.getItem('id_cart') + " telah dikirim.";
            const solidprimarytoastExample = document.getElementById('solid-successToast');
            const toast = new bootstrap.Toast(solidprimarytoastExample);
            toast.show();
            
            // var idElement = document.querySelector('.data-id-hapus');
            // idElement.textContent = localStorage.getItem('id_cart');

            // Memeriksa apakah status 'sentData' telah diset di localStorage
            console.log("tes");
            // Setelah console.log, hapus status 'sentData' dari localStorage
            localStorage.removeItem('sentData');
            localStorage.removeItem('id_cart');
        }
    });

    // Menyimpan nilai ke Local Storage
    // localStorage.setItem('nama', 'John');
    // localStorage.setItem('usia', '30');

    // // Mendapatkan nilai dari Local Storage
    // var nama = localStorage.getItem('nama');
    // var usia = localStorage.getItem('usia');

    // // Menggunakan nilai yang didapatkan
    // console.log('Nama:', nama);
    // console.log('Usia:', usia);
</script>