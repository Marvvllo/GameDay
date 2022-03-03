<?php

	$no=1;

	$queryAdmin	= mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama ASC");

	if (mysqli_num_rows($queryAdmin) == 0) {
		echo "<h3>Saat ini belum ada data user ysng dimasukkan</h3>";
	} else {
		echo "<table class='table-list'>";

			echo "<tr class='baris-title'>
							<th class='kolom-nomor'>No</th>
							<th class='kiri'>Nama</th>
							<th class='kiri'>Email</th>
							<th class='kiri'>Phone</th>
							<th class='kiri'>Level</th>
							<th class='tengah'>status</th>
							<th class='tengah'>Action</th>
						</tr>";

		while ($rowUser = mysqli_fetch_array($queryAdmin)) {
			echo "<tr>
							<td class='kolom-nomor'>$no</td>
							<td class='kiri'>$rowUser[nama]</td>
							<td class='kiri'>$rowUser[email]</td>
							<td class='kiri'>$rowUser[phone]</td>
							<td class='kiri'>$rowUser[level]</td>
							<td class='tengah'>$rowUser[status]</td>
							<td class='tengah'>
								<a class='tombol-action' href='" . BASE_URL . "index.php?page=my_profile&module=user&action=form&user_id=$rowUser[user_id]'>Edit</a>
							</td>
						</tr>";
			$no++;
		}

		echo "</table>";
	}

?>