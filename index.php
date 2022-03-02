<?php
include_once('./function/helper.php');
// include_once('./function/koneksi.php');

$page = isset($_GET['page']) ? $_GET['page'] : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>GameDay | Tiket Permainan</title>
</head>
<body>
	<header>
		 <!-- header atas -->
		<div class="nav__upper">
			<a href="<?php echo BASE_URL?>" class="logo" >GameDay</a>
				<ul class="nav__upperlink">
					<li><a href="<?php echo BASE_URL."sale.php"?>">On Sale</a></li>
					<li><a href="<?php echo BASE_URL."index.php?page=pesanan"?>">Pesanan</a></li>
					<?php if (@$_GET['level']) {?>
						<li><a href="<?php echo BASE_URL."index.php?page=login"?>">Login</a></li>
					<?php } else { ?>
						<li><a href="<?php echo BASE_URL."index.php?page=my_profile"?>">Akun</a></li>
					<?php } ?>
				</ul>
		</div>
		 <!-- header bawah -->
		<div class="nav__lower">
			<ul class="nav__lowerlink">
					<li><a href="<?php echo BASE_URL."index.php?kategori_id="?>">Basket</a></li>
					<li><a href="<?php echo BASE_URL."index.php?kategori_id="?>">Sepak Bola</a></li>
					<li><a href="<?php echo BASE_URL."index.php?kategori_id="?>">E-Sports</a></li>
				</ul>
		</div>
	</header>

	<main id="content">
			<?php
			$filename = "$page.php";

			if (file_exists($filename)) {
				include_once($filename);
			} else {
				// include("./main.php");
			}
			?>
		</main>

</body>
</html>