<?php
	define('BASE_URL', 'http://localhost/gameday/');

	function rupiah($angka) {
		$hasilRupiah = "Rp" . number_format($angka, 2, ',', '.');
		return $hasilRupiah;
	};
?>