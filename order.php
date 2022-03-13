<div id="order-barang">

	<?php
	$game_id = $_GET['game_id'];

	$query = mysqli_query($koneksi, "SELECT * FROM game WHERE game_id='$game_id' AND status='on'");
	$row = mysqli_fetch_assoc($query);
	$hari = $arrayHari[date("w", strtotime($row['tanggal_game']))];
	$tanggal = date("d", strtotime($row['tanggal_game']));
	$bulan = date("m", strtotime($row['tanggal_game']));
	$tahun = date("Y", strtotime($row['tanggal_game']));

	echo "<div class='container-order'>

						<div class='detail-game'>
							<div class='kiri'>
								<div class='frame-gambar'>
									<img src='" . BASE_URL . "images/game/$row[gambar]' />
								</div>
								<div class='nama-game'>
									<h2>$row[nama_game]</h2>
								</div>
								<div class='keterangan-game'>
									$row[spesifikasi]
								</div>
							</div>
								
							<div class='kanan'>
								<div class='tanggal-game'>
								<h3>Tanggal</h3>
								<p>$hari, $tanggal-$bulan-$tahun</p>
								</div>
								
								<div class='quantity-game'>
									<h3>Quantity</h3>
									<input value='1' min='1' max='$row[stok]' type='number' class='update-quantity' name='update-quantity'>
								</div>

								<div class='harga-pesanan'>
									<h3>Harga</h3>
									<p>$row[harga]</p>
								</div>

							</div>
								<a class='tombol-action tombol-checkout' href='" . BASE_URL . "index.php?page=order&game_id=$row[game_id]'>Checkout</a>
						</div>

						</div>
						";

	?>

</div>

<script>
	$(".update-quantity").on("input", function(e) {
		location.reload()
	})
</script>