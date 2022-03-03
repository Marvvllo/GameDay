<div id="frame-tambah">
	<a href="<?php echo BASE_URL . "index.php?page=my_profile&module=game&action=form"; ?>"
	class="tombol-action">+ Tambah Game</a>
</div>

<?php

	$query = mysqli_query($koneksi,
	"SELECT game.*, kategori.kategori FROM game
	JOIN kategori ON game.kategori_id=kategori.kategori_id");

	if (mysqli_num_rows($query) == 0) {
		echo "<h3>Saat ini belum ada barang di dalam table barang</h3>";
	} else {

		echo "<table class='table-list'>";

		echo "<tr class='baris-title'>
						<th class='kolom-nomor'>No</th>
						<th class='kiri'>Game</th>
						<th class='kiri'>Tanggal</th>
						<th class='kiri'>Kategori</th>
						<th class='kiri'>Harga</th>
						<th class='tengah'>Status</th>
						<th class='tengah'>Action</th>
					</tr>";

					$no = 1;
					while ($row=mysqli_fetch_assoc($query)) {
						
						echo "<tr>
										<td class='kolom-nomor'>$no</td>
										<td class='kiri'>$row[nama_game]</td>
										<td class='kiri'>$row[tanggal_game]</td>
										<td class='kiri'>$row[kategori]</td>
										<td class='kiri'>".rupiah($row['harga'])."</td>
										<td class='tengah'>$row[status]</td>
										<td class='tengah'>
											<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=game&action=form&game_id=$row[game_id]'>Edit</a>
										</td>
									</tr>";
									
						$no++;
					}

					echo "</table>";
		

	}

?>