<?php

include_once('../../function/koneksi.php');
include_once('../../function/helper.php');

$nama_game = $_POST['nama_game'];
$kategori_id = $_POST['kategori_id'];
$spesifikasi = $_POST['spesifikasi'];
$tanggal_game = date('Y-m-d', strtotime($_POST['tanggal_game']));
$status = $_POST['status'];
$button = $_POST['button'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$update_gambar = "";

if (!empty($_FILES["file"]["name"])) {
	$nama_file = $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]['tmp_name'], "../../images/game/" . $nama_file);

	$update_gambar = ", gambar='$nama_file'";
}

if ($button == "Add") {
	mysqli_query($koneksi,
	"INSERT INTO game (nama_game, kategori_id, spesifikasi, tanggal_game, gambar, harga, stok, status)
								VALUES ('$nama_game', '$kategori_id', '$spesifikasi', $tanggal_game, '$nama_file', '$harga', '$stok', '$status')");
} else if ($button == "Update") {
	$game_id = $_GET['game_id'];

	mysqli_query($koneksi,
	"UPDATE game SET kategori_id='$kategori_id',
											nama_game='$nama_game',
											spesifikasi='$spesifikasi',
											tanggal_game='$tanggal_game',
											harga='$harga',
											stok='$stok',
											status='$status'
											$update_gambar WHERE game_id='$game_id'
											");
}

// header("location: " . BASE_URL . "index.php?page=my_profile&module=game&action=list");

?>