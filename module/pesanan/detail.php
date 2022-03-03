<?php

	$pesanan_id = $_GET["pesanan_id"];

	$query = mysqli_query($koneksi, "SELECT pesanan.nama_penerima, pesanan.nomor_telepon, pesanan.alamat, pesanan.tanggal_pemesanan, user.nama, kota.kota, kota.tarif
																	FROM pesanan JOIN user ON pesanan.user_id=user.user_id JOIN kota ON kota.kota_id=pesanan.kota_id WHERE pesanan.pesanan_id='$pesanan_id'");

	$row = mysqli_fetch_assoc($query);

	$tanggal_pemesanan = $row['tanggal_pemesanan'];
	$nama_penerima = $row['nama_penerima'];
	$nomor_telepon = $row['nomor_telepon'];
	$alamat = $row['alamat'];
	$tarif = $row['tarif'];
	$nama = $row['nama'];
	$kota = $row['kota'];

?>

<div id="frame-faktur">

	<h3 align='center'>Detail Pesanan</h3>

	<hr/>

	<table>

		<tr>
			<td>Nomor Faktur</td>
			<td>:</td>
			<td><?php echo $pesanan_id ?></td>
		</tr>
		<tr>
			<td>Nama Pemesan</td>
			<td>:</td>
			<td><?php echo $nama?></td>
		</tr>
		<tr>
			<td>Nama Penerima</td>
			<td>:</td>
			<td><?php echo $nama_penerima?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td><?php echo $alamat?></td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>
			<td>:</td>
			<td><?php echo $nomor_telepon?></td>
		</tr>
		<tr>
			<td>Tanggal Pemesanan</td>
			<td>:</td>
			<td><?php echo $tanggal_pemesanan?></td>
		</tr>
	</table>
</div>

<table class="table-list">

	<tr class="baris-title">
		<th class="no">No</th>
		<th class="kiri">Nama Barang</th>
		<th class="tengah">Qty</th>
		<th class="kanan">Harga Satuan</th>
		<th class="kanan">Total</th>
	</tr>

	<?php
	
		$queryDetail = mysqli_query($koneksi, "SELECT pesanan_detail.*, barang.nama_barang FROM pesanan_detail JOIN barang ON
																					pesanan_detail.barang_id=barang.barang_id WHERE pesanan_detail.pesanan_id='$pesanan_id'");
	
		$no = 1;
		$subtotal = 0;

		while($rowDetail = mysqli_fetch_assoc($queryDetail)) {

			$total = $rowDetail['harga'] * $rowDetail['quantity'];
			$subtotal += $total;

			echo "<tr>
							<th class='no'>$no</th>
							<th class='kiri'>$rowDetail[nama_barang]</th>
							<th class='tengah'>$rowDetail[quantity]</th>
							<th class='kanan'>".rupiah($rowDetail['harga'])."</th>
							<th class='kanan'>".rupiah($total)."</th>
						</tr>";
			$no++;
		}
		$subtotal += $tarif;
	?>
	<tr>
		<td class="kanan" colspan="4">Biaya Pengiriman</td>
		<td class="kanan"><?php echo rupiah($tarif); ?></td>
	</tr>

	<tr>
		<td class="kanan" colspan="4">Sub total</td>
		<td class="kanan"><b><?php echo rupiah($subtotal); ?></b></td>
	</tr>
	
</table>

<div id="frame-keterangan-pembayaran">
	<p>Silahkan Lakukan pembayaran ke Bank MNR<br />
		Nomor Account : 1400-0999-1600 (A/N KeebShopByKel3).<br />
		Setelah melakukan pembayaran silahkan lakukan konfirmasi pembayaran
		<a href="<?php echo BASE_URL . "index.php?page=my_profile&module=pesanan&action=konfirmasi_pembayaran&pesanan_id='$pesanan_id'"; ?>">Disini</a>
	</p>
</div>