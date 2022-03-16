<?php
	define('BASE_URL', 'http://localhost/gameday/');

	function rupiah($angka) {
		$hasilRupiah = "Rp " . number_format($angka, 2, ',', '.');
		return $hasilRupiah;
	};
	
	$arrayHari[0] = "Minggu";
	$arrayHari[1] = "Senin";
	$arrayHari[2] = "Selasa";
	$arrayHari[3] = "Rabu";
	$arrayHari[4] = "Kamis";
	$arrayHari[5] = "Jumat";
	$arrayHari[6] = "Sabtu";


	$arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran Sedang Divalidasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "Pembayaran Ditolak";
?>