<div id="detail-barang">

	<?php
	$game_id = $_GET['game_id'];

	$query = mysqli_query($koneksi, "SELECT * FROM game WHERE game_id='$game_id' AND status='on'");
	$row = mysqli_fetch_assoc($query);
	$hari = $arrayHari[date("w", strtotime($row['tanggal_game']))];
	$tanggal = date("d", strtotime($row['tanggal_game']));
	$bulan = date("m", strtotime($row['tanggal_game']));
	$tahun = date("Y", strtotime($row['tanggal_game']));

	echo "
	<form action='" . BASE_URL . "proses_pesanan.php' method='GET'>
	<input type='hidden' name='game_id' value='".$game_id."'>
		<div class='container-detail'>
			<div class='frame-gambar'>
				<img src='" . BASE_URL . "images/game/$row[gambar]' />
			</div>
			
			<div class='detail-game'>

				<div class='kiri'>
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
					
					<div class='stok-game'>
						<h3>Stok</h3>
						<p>$row[stok] Kursi</p>
					</div>

					<div class='quantity-game'>
						<h3>Quantity</h3>
						<input value='1'  type='number' name='quantity' id='quantity'>
					</div>
				</div>
						
				<p class='harga-game'>" . rupiah($row['harga']) . "</p>
				<button type='submit' class='tombol-action tombol-beli'>Beli Tiket</button>

	</div>
	</form>
		";

	?>

</div>

<script>
	quantity = document.querySelector("#quantity")
	harga = document.querySelector(".harga-game")

	quantity.addEventListener('input', () => {
		value = formatRupiah(<?php echo $row['harga'] ?> * quantity.value)
		harga.innerHTML = value
	})

	const formatRupiah = (money) => {
		return new Intl.NumberFormat('id-ID', {
			style: 'currency',
			currency: 'IDR',
			minimumFractionDigits: 2
		}).format(money);
	}

	$(".tombol-beli").on("click", function(e) {
		$.ajax({
			method: "POST",
			url: "detail.php",
			data: "game_id=" + barang_id + "&quantity=" + quantity.value
		})
	})
</script>