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
	$tanggal_pemesanan = date("m-d-Y", strtotime($row['tanggal_pemesanan']));
	$spesifikasi = $row['spesifikasi'];
	$nama = $row['nama'];
	$quantity = $row['quantity'];
	$qrImage = urlencode(BASE_URL . "index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$pesanan_id");
?>

<div class="detail-pesanan">
		<div class="keterangan-pesanan">
			<h2><?php echo $nama_game ?></h2>
			<p><?php echo $tanggal_pemesanan ?></p>
			<p><?php echo $spesifikasi ?></p>
			<p><?php echo $nama ?></p>
			<p><?php echo $quantity ?> Kursi</p>
		</div>
		<?php
			if ($row['status'] == 3) {
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
	
