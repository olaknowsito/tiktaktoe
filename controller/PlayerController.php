<?php
    session_start();
	include('../model/Classes/ConnectDb.php');
    include('../model/Classes/Player.php');

    $player = new Player();
    
    // clear player_history database
    $player->clearMoveHistory();

    // select who's turn
    $_SESSION['user_turn'] = $player->selectActive();

    // get moves history -- no need since it clears everytime it reloads

	header('location: ../views/tiktak.php');

?>

