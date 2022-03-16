<?php

	$pesanan_id = $_GET["pesanan_id"];

	$query = mysqli_query($koneksi, "SELECT pesanan.*, user.nama, pesanan_detail.*, game.nama_game, game.spesifikasi
																		FROM pesanan 
																		JOIN user on pesanan.user_id = user.user_id 
																		JOIN pesanan_detail ON pesanan.pesanan_id = pesanan_detail.pesanan_id
																		JOIN game on pesanan_detail.game_id = game.game_id 
																		WHERE pesanan.pesanan_id='1'");
	$row = mysqli_fetch_assoc($query);

	$nama_game = $row['nama_game'];
	$spesifikasi = $row['spesifikasi'];
	$nama = $row['nama'];
	$hari = $arrayHari[date( "w", strtotime($row['tanggal']))];
	$tanggal = date("m-d-Y", strtotime($row['tanggal']));
	$quantity = $row['quantity'];
	$qrImage = urlencode(BASE_URL . "index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$pesanan_id");
?>

<div class="detail-pesanan">

	<div class="keterangan-pesanan">
		<div class="body-pesanan">
			<h3><?php echo $nama_game ?></h3>
			<p>Game</p>
		</div>
		<div class="body-pesanan">
			<h3><?php echo $nama ?></h3>
			<p>Nama</p>
		</div>
		<div class="body-pesanan">
			<h3><?php echo $spesifikasi ?></h3>
			<p>Tempat, waktu</p>
		</div>
		<div class="body-pesanan">
			<h3><?php echo $hari . ", " . $tanggal ?></h3>
			<p>Hari, tanggal</p>
		</div>
	</div>
	
	<div class="tiket-pesanan">
		<div class="quantity-pesanan">
			<h3><?php echo $quantity ?></h3>
			<p>Kursi</p>
		</div>
	<?php
		if ($row['status'] == 2) {
			echo "<img src='https://chart.googleapis.com/chart?cht=qr&chs=500x500&chl=$qrImage' />";
		} else {
			echo "<div id='frame-keterangan-pembayaran'>
							<p>
								Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran
								<a href='echo" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id='$pesanan_id'>Disini</a>
							</p>
						</div>";
		}
	?>
	</div>

</div>
	
