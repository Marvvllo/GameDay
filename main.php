<?php

$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;
$search = isset($_GET['search']) ? $_GET['search'] : false;

?>

<form class="cari-form" action="<?php echo BASE_URL . "index.php"?>" method="GET">
	<input class="cari-text" type="text" placeholder="Cari.." name="search">
	<input class="cari-btn" type="image" src="./images/icon/magnifying-glass-solid.svg">
</form>

<div id="slides">
	<?php
	$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status ='on' ORDER BY banner_id DESC LIMIT 3");
	while ($rowBanner = mysqli_fetch_assoc($queryBanner)) {
		echo "<a href='" . BASE_URL . "$rowBanner[link]'><img src='" . BASE_URL . "images/slide/$rowBanner[gambar]' /> </a>";
	}
	?>
</div>

<div id="frame-barang">
	<ul class="game-list">
		<?php

		// Display barang sesuai kategori
		if ($kategori_id) {
			$queryGame = mysqli_query($koneksi, "SELECT * FROM game WHERE kategori_id='$kategori_id' AND status='on' ORDER BY tanggal_game ASC");
		} else if($search) {
			$queryGame = mysqli_query($koneksi, "SELECT * FROM game WHERE nama_game like '%$search%' OR spesifikasi like '%$search%' OR spesifikasi like '%$search%' OR tanggal_game like '%$search%' OR harga like '%$search%' AND status='on'");
		} else {
			$queryGame = mysqli_query($koneksi, "SELECT * FROM game WHERE status='on' ORDER BY tanggal_game ASC");
		}

		if (mysqli_num_rows($queryGame) == 0) {
			echo "<h3>Saat ini belum ada game di dalam kategori ini</h3>";
		} else {
			while ($row = mysqli_fetch_array($queryGame)) {
				$hari = $arrayHari[date( "w", strtotime($row['tanggal_game']))];
				$tanggal = date( "d", strtotime($row['tanggal_game']));
				$bulan = date( "m", strtotime($row['tanggal_game']));
				$tahun = date( "Y", strtotime($row['tanggal_game']));
				echo "
					<li class='game-item'>
						<p class='price'>" . rupiah($row['harga']) . "</p>

						<div class='game-img__container'>
							<a href='" . BASE_URL . "index.php?page=detail&game_id=$row[game_id]'>
								<img class='game-img__image' src='" . BASE_URL . "images/game/$row[gambar]'>
								<div class='game-img__text'>
									<p>$row[nama_game]</p>
									<p>$row[spesifikasi]</p>
								</div>
							</a>
						</div>
	
						<div class='keterangan-gambar'>
							<p><a href='" . BASE_URL . "index.php?page=detail&game_id=$row[game_id]'>$hari, $tanggal-$bulan-$tahun</a></p>
							<span>Stok : $row[stok]</span>
						</div>
					</li>
					";
			}
		}
		?>

	</ul>
</div>