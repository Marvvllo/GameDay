<div class="login-container">
	
<form class="login-form" action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST" >

	<?php
		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

		if($notif == true) {
			echo "
			<div class='notif'>Maaf, email dan password yang kamu masukkan salah</div>
			";
		}
	?>

	<div class="element-form">
		<label>Email</label>
		<span> <input type="text" name="email" /> </span>
	</div>
	<div class="element-form">
		<label>Password</label>
		<span> <input type="password" name="password"/> </span>
	</div>

	<button type="submit" class="tombol-action login-btn">LOGIN</button>

	<p class="register-link">atau <a href="<?php echo BASE_URL."index.php?page=register"?>">Register</a></p>

</form>

</div>