<?php

	if ($level == "superadmin") {
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, pesanan_detail.game_id, user.nama FROM pesanan 
																						JOIN pesanan_detail ON pesanan.pesanan_id=pesanan_detail.pesanan_id
																						JOIN user ON pesanan.user_id=user.user_id 
																						ORDER BY pesanan.tanggal DESC");

	} else {
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, game.nama_game, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id WHERE pesanan.user_id='$user_id' 
																						ORDER BY pesanan.tanggal DESC");
	}

	if (mysqli_num_rows($queryPesanan) == 0) {
		echo "<h3>Saat ini belum ada data pesanan</h3>";
	} else {

		echo "<table class='table-list'>
						<tr class='baris-title'>
							<th class='tengah'>ID</th>
							<th class='kiri'>Nama Game</th>
							<th class='kiri'>Status</th>
							<th class='kiri'>Nama</th>
							<th class='tengah'>Action</th>
						</tr>";

		$adminButton = "";
		while ($row = mysqli_fetch_assoc($queryPesanan)) {
			$queryGame = mysqli_query($koneksi, "SELECT nama_game FROM game WHERE game_id=$row[game_id]");
			$rowGame = mysqli_fetch_assoc($queryGame);

			if ($level == "superadmin") {
				$adminButton = "<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
			}

			$status = $row['status'];
			echo "<tr>
							<td class='tengah'>$row[pesanan_id]</td>
							<td class='kiri'>$rowGame[nama_game]</td>
							<td class='kiri'>$arrayStatusPesanan[$status]</td>
							<td class='kiri'>$row[nama]</td>
							<td class='tengah'>
								<a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
								$adminButton
							</td>
						</tr>";
		}

		echo "</table>";

	}

?>