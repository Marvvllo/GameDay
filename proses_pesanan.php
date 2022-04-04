<?php
    include_once("function/koneksi.php");
    include_once("function/helper.php");

    session_start();

		$user_id = $_SESSION['user_id'];
    $game_id = $_POST['game_id'];
    $queryGame = mysqli_query($koneksi, "SELECT * FROM game WHERE game_id='$game_id' AND status='on'");
    $rowGame = mysqli_fetch_array($queryGame);
    $tanggal = $rowGame['tanggal_game'];

    if (!$user_id) {
			header("Location:".BASE_URL."index.php?page=login");
    }

    $query = mysqli_query($koneksi, "INSERT INTO `pesanan` (`pesanan_id`, `user_id`, `tanggal`, `status`)
                                    VALUES (NULL, $user_id, '$tanggal', '0'); ");
    echo $tanggal;
    if($query){
        $last_pesanan_id = mysqli_insert_id($koneksi);
        
        
        $quantity = $_POST["quantity"];
        $harga = $_POST["harga"];
				$queryDetail =  mysqli_query($koneksi, "INSERT INTO pesanan_detail(pesanan_id, game_id, quantity, harga)
				VALUES ($last_pesanan_id, '$game_id', '$quantity', '$harga' )");
    } else{
      echo "
          <p>Pesanan anda gagal, mohon coba lagi.</p>
          ";
    }
    
    header("Location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id");
    
?>