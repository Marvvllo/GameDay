
	<div id="detail-barang">
	
		<?php
			$game_id = $_GET['game_id'];

			$query = mysqli_query($koneksi, "SELECT * FROM game WHERE game_id='$game_id' AND status='on'");
			$row = mysqli_fetch_assoc($query);
			$hari = $arrayHari[date( "w", strtotime($row['tanggal_game']))];
			$tanggal = date( "d", strtotime($row['tanggal_game']));
			$bulan = date( "m", strtotime($row['tanggal_game']));
			$tahun = date( "Y", strtotime($row['tanggal_game']));
			
			echo "<div class='container-detail'>
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
										</div>
										
									<p class='harga-game'>".rupiah($row['harga'])."</p>
									<a class='tombol-action tombol-beli' href='" . BASE_URL . "index.php?page=tambah_keranjang&barang_id=$row[game_id]'>Beli Tiket</a>
								</div>


						</div>
						";
	
		?>
	
	</div>