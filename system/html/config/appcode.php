<?php
function money($input)
{
	$output=number_format( $input, 0 , '' , '.' );
	return $output;
}
function generate_product()
{
	include "koneksi.php";

	$query = mysqli_query($conn, "SELECT max(id_product) as kodeTerbesar FROM tb_product WHERE id_product LIKE '%PRD-" . date("y/m/") . "%'");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
	$urutan = (int) substr($kodeBarang, 10, 8);
	$urutan++;
	$huruf = "PRD-" . date("y/m/");
	$kodesppa = $huruf . sprintf("%06s", $urutan);

	return $kodesppa;
}
function generate_customer()
{
	include "koneksi.php";

	$query = mysqli_query($conn, "SELECT max(id_customer) as kodeTerbesar FROM tb_customer WHERE id_customer LIKE '%CUS-" . date("y/m/") . "%'");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
	$urutan = (int) substr($kodeBarang, 10, 8);
	$urutan++;
	$huruf = "CUS-" . date("y/m/");
	$kodesppa = $huruf . sprintf("%06s", $urutan);

	return $kodesppa;
}
function generate_cart()
{
	include "koneksi.php";

	$query = mysqli_query($conn, "SELECT max(id_cart) as kodeTerbesar FROM tb_cart WHERE id_cart LIKE '%CRT-" . date("y/m/") . "%'");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
	$urutan = (int) substr($kodeBarang, 10, 8);
	$urutan++;
	$huruf = "CRT-" . date("y/m/");
	$kodesppa = $huruf . sprintf("%06s", $urutan);

	return $kodesppa;
}
?>