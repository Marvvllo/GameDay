<?php

session_start();
include_once('./function/helper.php');
include_once('./function/koneksi.php');

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

if (!$user_id) {
	header("location: " . BASE_URL . "index.php?page=login");
}

$game_id = $_POST['game_id'];

$queryGame = mysqli_query($koneksi, "SELECT * FROM game WHERE game_id='$game_id' AND status='on'");
	$rowGame = mysqli_fetch_assoc($queryGame);




mysqli_query($koneksi, "INSERT INTO pesanan ('user_id', 'tanggal', 'status')
																		VALUES ($user_id, $rowGame[tanggal_game], 0)")

?>