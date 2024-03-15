<?php
include 'system/html/config/koneksi.php';
include 'system/html/config/appcode.php';
date_default_timezone_set("Asia/Jakarta");

if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $telp = $_POST['telp'];
  $id_customer = generate_customer();
  $register = mysqli_query($conn, "INSERT INTO `tb_customer`(`id_customer`, `name`, `user`, `pass`, `phone`, `tgl_buat`) 
                                    VALUES (
                                      '". $id_customer ."',
                                      '". $name ."',
                                      '". $user ."',
                                      '". $pass ."',
                                      '". $telp ."',
                                      '" . date("Y-m-d H:i:s") . "'
                                      )");

if ($register) {
  $msg_status = "Anda telah membuat akun, silahkan untuk login !";
  echo '
      <script>
          alert("' . $msg_status . '");
          window.location.href="login.php";
      </script>
    ';
}else {
  $msg_status = "Anda memasuki data yang salah !";
  echo '
      <script>
          alert("' . $msg_status . '");
          window.location.href="register.php";
      </script>
    ';
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/style_login.css" />
    <title>CRAFT MERCH CUSTOMIZED</title>
  </head>
  <body>
    <section>
      <div class="form-box">
        <div class="form-value">
          <form action="" method="post">
            <h2>Register</h2>
            <div class="inputbox">
              <ion-icon name="mail-outline"></ion-icon>
              <input type="text" name="name" required />
              <label for="">Name</label>
            </div>
            <div class="inputbox">
              <ion-icon name="person-outline"></ion-icon>
              <input type="text" name="user" required />
              <label for="">Username</label>
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <input type="password" name="pass" required />
              <label for="">Password</label>
            </div>
            <div class="inputbox">
              <ion-icon name="call-outline"></ion-icon>
              <input type="number" name="telp" required />
              <label for="">Phone Number</label>
            </div>
            <button type="submit" name="register">Register</button>
            <div class="register">
              <p>Sudah punya akun? <a href="login.php">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script
      type="module"
      src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
