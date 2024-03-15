<?php
ob_start();
session_start();
include 'system/html/config/koneksi.php';

if (isset($_POST['login'])) {
  $flag = 0;
  $sql = "select * from tb_customer where user='" . mysqli_real_escape_string($conn, $_POST['username']) . "' and pass='" . mysqli_real_escape_string($conn, $_POST['password']) . "'  ";
  $data = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($data)) {
      $flag = 1;
      $_SESSION['id_cust'] = $row['id_customer'];
      $_SESSION['nm_user'] = $row['name'];
      // $_SESSION['branch'] = $row['cabang'];
      // $_SESSION['grup'] = $row['grup'];
      // $_SESSION['group'] = $row['grup'];
      // $_SESSION['jenis_pajak'] = $row['jenis_pajak'];
      // $_SESSION['sop'] = $row['sop_checker'];
      // $_SESSION['pass_user'] = mysqli_real_escape_string($conn, $_POST['pass']);
      //   $_SESSION['id_cabang']=$row['id_cabang'];

      // header('Location:dashboard.php');
      // alert('Anda telah login dengan nama ". $row['name'] ."');
      echo "
            <script type='text/javascript'>
              window.location.href='index.php';
            </script>";
  }
  if ($flag == 0) {
      echo "<script type='text/javascript'>alert('Maaf, Login Gagal')</script>";
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
            <h2>Login</h2>
            <div class="inputbox">
              <ion-icon name="mail-outline"></ion-icon>
              <input type="text" name="username" required />
              <label for="">Username</label>
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed-outline"></ion-icon>
              <input type="password" name="password" required />
              <label for="">Password</label>
            </div>
            <div class="forget">
              <label for=""
                ><input type="checkbox" />Remember Me
                </label
              >
            </div>
            <button type="submit" name="login">Log in</button>
            <div class="register">
              <p>Belum punya akun? <a href="register.php">Register</a></p>
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
