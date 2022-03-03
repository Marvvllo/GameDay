<?php

$game_id = isset($_GET['game_id']) ? $_GET['game_id'] : false;

$nama_game = "";
$kategori_id = "";
$spesifikasi = "";
$tanggal_game = "2022-04-03";
$gambar = "";
$stok = "";
$harga = "";
$status = "";
$keterangan_gambar = "";
$button = "Add";

if ($game_id) {
	$query = mysqli_query(
		$koneksi,
		"SELECT * FROM game WHERE game_id='$game_id'"
	);
	$row = mysqli_fetch_assoc($query);

	$nama_game = $row['nama_game'];
	$kategori_id = $row['kategori_id'];
	$spesifikasi = $row['spesifikasi'];
	$tanggal_game = $row['tanggal_game'];
	$gambar = $row['gambar'];
	$harga = $row['harga'];
	$stok = $row['stok'];
	$status = $row['status'];
	$button = "Update";

	$keterangan_gambar = "(Klik pilih gambar jika ingin mengganti gambar di samping)";
	$gambar = "<img src='" . BASE_URL . "images/game/$gambar' style='width: 200px; vertical-align: middle;' /> ";
}

?>

<script src="<?php echo BASE_URL . "js/ckeditor/ckeditor.js"; ?>"></script>

<form action="<?php echo BASE_URL . "module/game/action.php?game_id=$game_id"; ?>" method="POST" enctype="multipart/form-data">
	<div class="element-form">
		<label>Kategori</label>
		<span>
			<select name="kategori_id">
				<?php
				$query = mysqli_query(
					$koneksi,
					"SELECT kategori_id, kategori FROM kategori WHERE status='on'
					ORDER BY kategori ASC"
				);
				while ($row = mysqli_fetch_assoc($query)) {
					if ($kategori_id == $row['kategori_id']) {
						echo "<option value='$row[kategori_id]' selected='true'>$row[kategori]</option>";
					} else {
						echo "<option value='$row[kategori_id]'>$row[kategori]</option>";
					}
				}
				?>
			</select>
		</span>
	</div>

	<div class="element-form">
		<label>Nama Game</label>
		<span><input type="text" name="nama_game" value="<?php echo $nama_game; ?>" /></span>
	</div>

	<div class="element-form" style="margin-bottom: 10px;">
		<label>Spesifikasi</label>
		<p>
			<span><textarea name="spesifikasi" id="editor"><?php echo $spesifikasi ?></textarea></span>
	</div>

	<div class="element-form">
		<label>Tanggal Game</label>
		<span><input type="date" name="tanggal_game" value="<?php echo $tanggal_game; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Stok</label>
		<span><input type="number" name="stok" value="<?php echo $stok; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Harga</label>
		<span><input type="number" name="harga" value="<?php echo $harga; ?>" /></span>
	</div>

	<div class="element-form">
		<label>Gambar Produk</label>
		<span>
			<input type="file" name="file" /> <?php echo $gambar ?>
		</span>
	</div>

	<div class="element-form">
		<label>Status</label>
		<span>
			<input type="radio" name="status" value="on" <?php if ($status == "on") echo "checked='true'" ?> /> On
			<input type="radio" name="status" value="off" <?php if ($status == "off") echo "checked='true'" ?> /> Off
		</span>
	</div>

	<div class="element-form">
		<span><input type="submit" name="button" value="<?php echo $button; ?>" /></span>
	</div>

</form>

<script>
	CKEDITOR.replace("editor")
</script>