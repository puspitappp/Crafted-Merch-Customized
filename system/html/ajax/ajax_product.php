<?php
include "../config/koneksi.php";
include "../config/appcode.php";
session_start();

if (isset($_POST['get_product'])) {
    $hasil = "";
    $id_hapus = mysqli_real_escape_string($conn, $_POST['get_product']);
    $deleteData = mysqli_query($conn, "DELETE FROM tb_product WHERE id_product = '". $id_hapus ."'");

    $hasil = $hasil . '
    <table class="table text-nowrap">
        <thead>
            <tr>
                <th scope="col">ID Product</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Color</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
    ';
            $query = mysqli_query($conn, "SELECT * FROM tb_product");
            while ($row = mysqli_fetch_assoc($query)) {
                
            $hasil = $hasil . '
            <tr>
                <td>' . $row['id_product'] .'</td>
                <td>
                    <div class="d-flex align-items-center">
                        <span class="avatar avatar-xs me-2 online avatar-rounded">
                            <img src="../assets/images/faces/3.jpg" alt="img">
                        </span>' . $row['name'] .'
                    </div>
                </td>
                <td>' . $row['kategori'] .'</td>
                <td>Rp.' . $row['price'] .'</td>
                <td>' . $row['qty'] .' Pcs</td>
                <td>
                    <div class="avatar-list-stacked">
            ';
                            $color = explode(" | ", $row['color']);
                            $last_color = count($color) - 3;

                            if ($row['color'] == NULL) {
                                $hasil = $hasil . '
                                    <span class="badge bg-success-transparent">Tidak Ada Warna</span>
                                    ';
                            }elseif (count($color) == 0 || count($color) == 1 || count($color) == 2) {
                                for ($i=0; $i < count($color); $i++) { 
                                    $hasil = $hasil . '
                                    <span class="avatar avatar-sm avatar-rounded" style="background-color: '. $color[$i] .';"></span>
                                    ';
                                }
                            }else{
                                for ($i=0; $i < 3; $i++) { 
                                    $hasil = $hasil . '
                                    <span class="avatar avatar-sm avatar-rounded" style="background-color: '. $color[$i] .';"></span>
                                    ';
                                }
                            }

                            if ($last_color > 0) {
                                $hasil = $hasil . '
                                <a class="avatar avatar-sm bg-primary text-fixed-white avatar-rounded" href="javascript:void(0);">
                                    +'.$last_color.'
                                </a>    
                                ';
                            }
            $hasil = $hasil . '
                    </div>
                </td>
                <td>
            ';
                    if ($row['status'] == 1) {
                        $hasil = $hasil . '
                            <span class="badge bg-success-transparent"><i class="ri-check-fill align-middle mw-1"></i>
                                Published
                            </span>
                            ';
                    }else {
                        $hasil = $hasil . '
                            <span class="badge bg-danger-transparent"><i class="ri-close-fill align-middle mw-1"></i>
                                Scheduled
                            </span>
                            ';
                    }

                    if ($row['qty'] > 0) {
                        $hasil = $hasil . '
                            <span class="badge bg-success-transparent"><i class="ri-check-fill align-middle mw-1"></i>
                                In Stock
                            </span>
                            ';
                    }else {
                        $hasil = $hasil . '
                            <span class="badge bg-danger-transparent"><i class="ri-close-fill align-middle mw-1"></i>
                                Out Of Stock
                            </span>
                            ';
                    }
            $hasil = $hasil . '
                </td>
                <td>
                    <div class="hstack gap-2 fs-15">
                        <a href="edit_product.php?id_product='. $row['id_product'] .'" class="btn btn-icon btn-sm btn-info-transparent rounded-pill"><i class="ri-edit-line"></i></a>
                        <button type="button" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill hapus_button" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable2" data-id_hapus="'. $row['id_product'] .'"><i class="ri-delete-bin-line"></i></button>
                    </div>
                </td>
            </tr>
            ';
            }
            $hasil = $hasil . '
        </tbody>
    </table>
    ';

    echo $hasil;
}

?>