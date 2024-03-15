<?php
include 'system/html/config/koneksi.php';
include 'system/html/config/appcode.php';
session_start();

if (isset($_POST['sent_data'])) {
    $hasil = "";
    $id_cart = mysqli_real_escape_string($conn, $_POST['sent_data']);
    $deleteData = mysqli_query($conn, "UPDATE tb_cart SET status = 'sent' WHERE id_cart = '" . $id_cart . "'");

    $hasil = $hasil . '
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
    ';
            $query = mysqli_query($conn, "SELECT * FROM tb_cart");
            while ($row = mysqli_fetch_assoc($query)) {
                
                $hasil = $hasil . '
                <tr>
                    <td>'. $row['id_cart'] .'</td>
                    <td>'. $row['id_customer'] .'</td>
                    <td>
                        '. $row['id_product'] .'
                        <button type="button" class="btn btn-info-light btn-wave" style="margin-left: 5px;" data-bs-toggle="popover"
                        data-bs-placement="top" data-bs-custom-class="header-info" data-bs-trigger="focus"
                        title="Informasi Data" 
                        data-bs-content="Color : '. $row['color'] .' <br>
                                         Size : '. $row['size'] .' <br>
                                         Qty : '. $row['qty'] .'">
                        <i class="fe fe-alert-circle" style="margin-right: 5px;"></i>Info
                    </button>
                    </td>
                    <td>Rp.'. money($row['biaya'] * $row['qty']) .'</td>
                    <td>
                ';
                if ($row['status'] == "cart") {
                    $hasil = $hasil . '
                        <span class="badge bg-light-transparent text-dark fs-15"><i class="ri-shopping-cart-2-line align-middle mw-1"></i>
                            Cart
                        </span>
                        ';
                }elseif ($row['status'] == "pay") {
                    $hasil = $hasil . '
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
                    $hasil = $hasil . '
                        <span class="badge bg-success-transparent fs-15"><i class="ri-truck-line align-middle mw-1"></i></i>
                            Sent
                        </span>
                        ';
                }
                $hasil = $hasil . '
                    </td>
                </tr>
            ';
            } 
            $hasil = $hasil . '
            </tbody>
        </table>
    ';
    
    $hasil = $hasil . '
        <script>
            window.location.href="cart.php";
        </script>
        ';
    echo $hasil;
}

if (isset($_POST['ubah_data_qty_kurang'])) {
    $hasil = "";
    $no_id = mysqli_real_escape_string($conn, $_POST['ubah_data_qty_kurang']);

    $sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT qty FROM tb_cart WHERE id_cart = '" . $no_id . "'"));
    $qty = $sql['qty'] - 1;
    $sql_update_barang_keluar = mysqli_query($conn, "
            UPDATE
                tb_cart
            SET
                qty = '" . $qty . "'
            WHERE
                id_cart = '" . $no_id . "'
        ");
    
    $hasil = $hasil . '
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
                ';
                  $query = mysqli_query($conn, "SELECT a.*, b.name, b.price FROM tb_cart a
                                                JOIN tb_product AS b ON a.id_product = b.id_product WHERE id_customer = '". $_SESSION['id_cust'] ."'");
                  while ($row = mysqli_fetch_assoc($query)) {
                    $id_cart = $row['id_cart'];
                  $hasil = $hasil . '
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
                              >'. $row['name'] .'</a
                            >
                          </div>
                          <div class="mb-1">
                            <span
                              class="me-1 d-inline-flex align-items-center"
                              >Size:</span
                            ><span class="fw-semibold text-muted"
                              >'. $row['size'] .'</span
                            >
                          </div>
                          <div class="mb-1">
                            <span
                              class="me-1 d-inline-flex align-items-center"
                              >Color:</span
                            ><span class="fw-semibold text-muted"
                              >'. $row['color'] .'<span
                                class="badge bg-success-transparent ms-3"
                                >In Offer</span
                              ></span
                            >
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="fw-semibold fs-14">Rp.'. money($row['price']) .'</div>
                    </td>
                    <td class="product-quantity-container">
                      <div class="input-group border rounded flex-nowrap">
                        <button
                          type="button" name=""
                          class="btn btn-icon btn-light input-group-text flex-fill product-quantity-minus border-0 ubah_data_qty_kurang" data-no_id="'. $id_cart .'"
                        >
                          <i class="ri-subtract-line"></i>
                        </button>
                        <input
                          type="text"
                          class="form-control form-control-sm border-0 text-center w-100"
                          aria-label="quantity"
                          id="product-quantity"
                          value="'. $row['qty'] .'"
                        />
                        <button
                          type="button"
                          class="btn btn-icon btn-light input-group-text flex-fill product-quantity-plus border-0"
                        >
                          <i class="ri-add-line"></i>
                        </button>
                      </div>
                    </td>
                    <td>
                      <div class="fs-14 fw-semibold">'. money($row['biaya']) .'</div>
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
                        class="btn btn-icon btn-danger btn-delete"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        data-bs-title="Remove From cart"
                      >
                        <i class="ri-delete-bin-line"></i>
                      </button>
                    </td>
                  </tr>
                  ';
                   }
                   $hasil = $hasil . '
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
                  ';
                  $queryCart = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(biaya) AS ttl_ksl FROM tb_cart WHERE id_customer = '". $id_cust ."'"));
                  $query = mysqli_query($conn, "SELECT * FROM tb_cart WHERE id_customer = '". $id_cust ."'");
                  $totalQuery = mysqli_num_rows($query);

                  $hasil = $hasil . '
                  <div class="card-body p-0">
                    <div class="p-4 border-bottom border-block-end-dashed">
                      <div
                        class="d-flex align-items-center justify-content-between mb-3"
                      >
                        <div class="text-muted">Sub Total</div>
                        <div class="fw-semibold fs-14">Rp.'. money($queryCart['ttl_ksl']) .'</div>
                      </div>
                      <div
                        class="d-flex align-items-center justify-content-between mb-0"
                      >
                        <div class="text-muted">Total Items</div>
                        <div class="fw-semibold fs-14 text-success">
                          '. $totalQuery .' Items
                        </div>
                      </div>
                    </div>
                    <div class="py-3 px-4">
                      <div
                        class="d-flex align-items-center justify-content-between"
                      >
                        <div class="fw-semibold fs-18">Total :</div>
                        <div class="fw-semibold fs-18">$1,387</div>
                      </div>
                    </div>
                    <div class="p-3 border-top text-center">
                      <a href="checkout.html" class="btn btn-primary m-1"
                        >Checkout</a
                      >
                      <a href="products.html" class="btn btn-light m-1"
                        >Countinue Shopping</a
                      >
                    </div>
                  </div>
                </div>
              </div>
    ';

    echo $hasil;
}
?>