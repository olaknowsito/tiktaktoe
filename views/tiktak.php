<?php
	session_start();
	
	$player_set = !isset($_SESSION['user_turn']) ? header('location: ../controller/playerController.php') : $_SESSION['user_turn'];
	
	unset($_SESSION['user_turn']);
	

?>
<?php include('../partials/header.php') ?>
<?php include('../partials/nav.php') ?>
	<div class="container">
		
		<div id="player_turn" hidden><?php echo $player_set['player_id']?></div>
		<div id="player_name_turn" hidden><?php echo $player_set['name']?></div>
		<div class="row mt-5">

			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=1></div>
			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=2></div>
			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=3></div>
			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=4></div>
			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=5></div>
			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=6></div>
			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=7></div>
			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=8></div>
			<div class="col-4 col-md-4 col-lg-4 col-sm-4 box text-center" data-id=9></div>
		</div>
	</div>

<?php include('../partials/footer.php') ?>



