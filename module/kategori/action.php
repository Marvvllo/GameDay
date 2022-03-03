<?php

	include("../../function/koneksi.php");
	include("../../function/helper.php");

	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
	$kategori = $_POST['kategori'];
	$status = $_POST['status'];
	$button = $_POST['button'];

	if ($button == "Add") {
	mysqli_query($koneksi, 
	"INSERT INTO kategori (kategori, status)
	VALUES('$kategori', '$status')
	");
	} else {
		mysqli_query($koneksi,
		"UPDATE kategori SET kategori='$kategori', status='$status'
		WHERE kategori_id='$kategori_id'
		");
	}

	header("location: " . BASE_URL . "index.php?page=my_profile&module=kategori&action=list");

?>