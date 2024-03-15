<?php
include "../config/koneksi.php";
include "../config/appcode.php";
session_start();

if (isset($_POST['get_customer'])) {
    $hasil = "";
    $id_hapus = mysqli_real_escape_string($conn, $_POST['get_customer']);
    $deleteData = mysqli_query($conn, "DELETE FROM tb_customer WHERE id_customer = '". $id_hapus ."'");

    $hasil = $hasil . '
    <table class="table text-nowrap">
        <thead>
            <tr>
                <th scope="col">ID Customer</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">No.Hp</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
    ';
            $query = mysqli_query($conn, "SELECT * FROM tb_customer");
            while ($row = mysqli_fetch_assoc($query)) {
                
                $hasil = $hasil . '
                <tr>
                    <td>' . $row['id_customer'] .'</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                <img src="../assets/images/faces/3.jpg" alt="img">
                            </span>' . $row['name'] .'
                        </div>
                    </td>
                    <td>' . $row['user'] .'</td>
                    <td>' . $row['phone'] .'</td>
                    <td>
                        <div class="hstack gap-2 fs-15">
                            <button type="button" class="btn btn-icon btn-sm btn-danger-transparent rounded-pill hapus_button" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable2" data-id_hapus="'. $row['id_customer'] .'"><i class="ri-delete-bin-line"></i></button>
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