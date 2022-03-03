<?php
session_start();
include_once('./function/helper.php');
include_once('./function/koneksi.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
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
		<div class="nav__upper">
			<a href="<?php echo BASE_URL ?>" class="logo">GameDay</a>
			<ul class="nav__upperlink">
				<li><a href="index.html">On Sale</a></li>
				<li>
					<?php
					if ($user_id) {
						echo " 
								<a href='" . BASE_URL . "index.php?page=my_profile&module=pesanan&action=list'>My Profile</a>
								
								<li><a href='" . BASE_URL . "logout.php'>Logout</a></li>";
					} else {
						echo "<a href='" . BASE_URL . "index.php?page=login'>Login</a>";
					}
					?></li>

			</ul>
		</div>
		<div class="nav__lower">
			<ul class="nav__lowerlink">
				<li><a href="<?php echo BASE_URL . "index.php?kategori_id=" ?>">Basket</a></li>
				<li><a href="<?php echo BASE_URL . "index.php?kategori_id=" ?>">Sepak Bola</a></li>
				<li><a href="<?php echo BASE_URL . "index.php?kategori_id=" ?>">E-Sports</a></li>
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