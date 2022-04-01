<?php
    include_once("function/koneksi.php");
    include_once("function/helper.php");

    session_start();

		$user_id = $_SESSION['user_id'];
    $tanggal = date('Y-m-d');


    if (!$user_id) {
			header("Location:".BASE_URL."index.php?page=login");
    }

    $query = mysqli_query($koneksi, "INSERT INTO `pesanan` (`pesanan_id`, `user_id`, `tanggal`, `status`)
                                    VALUES (NULL, $user_id, '$tanggal', '0'); ");
    echo $tanggal;
    if($query){
        $game_id = $_POST['game_id'];
        $quantity = $_POST["quantity"];
        $harga = $_POST["harga"];
				$queryDetail =  mysqli_query($koneksi, "INSERT INTO pesanan_detail(pesanan_id, game_id, quantity, harga)
				VALUES (LAST_INSERT_ID(), '$game_id', '$quantity', '$harga' )");
    } else{
      echo "
          <p>Pesanan anda gagal, mohon coba lagi.</p>
          ";
    }
    
    header("Location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$pesanan_id");
    
?>