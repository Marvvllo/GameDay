<?php

	$pesanan_id = $_GET["pesanan_id"];

	$query = mysqli_query($koneksi, "SELECT status FROM pesanan WHERE pesanan_id='$pesanan_id'");
	$row = mysqli_fetch_assoc($query);
	$status = $row["status"];

?>

<form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">

	<div class="element-form">
		<label>Pesanan ID (Faktur ID)</label>
		<span><input type="text" value="<?php echo $pesanan_id; ?>" name="pesanan_id" readonly></span>
	</div>

	<div class="element-form">
		<label>Status</label>
		<span>
			<select name="status">
				<?php
				
					foreach($arrayStatusPesanan AS $key => $value) {
						if ($status == $key) {
							echo "<option value='$key' selected='true'>$value</option>";
						} else {
							echo "<option value='$key'>$value</option>";
						}
					}

				?>
			</select>
		</span>
	</div>

	<div class="element-form">
		<span><input class='tombol-action' type="submit" value="Edit Status" name="button"></span>
	</div>

</form>