<div id="frame-tambah">
	<a class="tombol-action" href="<?php echo BASE_URL . "index.php?page=my_profile&module=banner&action=form" ?>">+ Tambah Banner</a>
</div>

<?php

	$no = 1;

	$queryBanner = mysqli_query($koneksi, "SELECT * FROM banner ORDER BY banner_id DESC");

	if (mysqli_num_rows($queryBanner) == 0) {
		echo "<h3>Saat ini belum ada banner di dalam database</h3>";
	} else {
		echo "<table class='table-list'>";

			echo "<tr class='baris-title'>
							<th class='kolom-nomor'>No</th>
							<th class='kiri'>Banner</th>
							<th class='kiri'>Link</th>
							<th class='tengah'>Status</th>
							<th class='tengah'>Action</th>
						</tr>";

		while ( $rowBanner = mysqli_fetch_array($queryBanner)) {

			echo "<tr class='baris-title'>
							<th class='kolom-nomor'>$no</th>
							<th class='kiri'>$rowBanner[banner]</th>
							<th class='kiri'>
								<a href='".BASE_URL."$rowBanner[link]' target='_blank' rel='noopener noreferrer'>$rowBanner[link]</a>
							</th>
							<th class='tengah'>$rowBanner[status]</th>
							<th class='tengah'>
								<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=banner&action=form&banner_id=$rowBanner[banner_id]'>Edit</a>
							</th>
						</tr>";

			$no++;
		}

		echo "</table>";
	}

?>

