<?php 
	Class MoveHistory {
		private $con;
		private $list_of_employees;
		private $points_history;

		public function __construct() {
			$timezone = date_default_timezone_set('Asia/Manila');
			$connection = new ConnectDb();
			$this->con = $connection->dbConnection();
		}


        public function savePlayerMove($player_id, $box_number) {
			$query = mysqli_query($this->con, "INSERT INTO moves_history VALUES ('', '$player_id', '$box_number')");
			return;
		}
		
		public function currentSelectedBox($player_id) {
			$query = mysqli_query($this->con, "SELECT * FROM moves_history WHERE player_id = '$player_id'");
			return $query;
		}

		public function switchPlayer() {
			$get_active = mysqli_query($this->con, "SELECT * FROM players WHERE active=1");
			$row = mysqli_fetch_assoc($get_active);
			$old_active_player = $row['player_id'];

			mysqli_query($this->con, "UPDATE players SET active=1 WHERE active=0");

			mysqli_query($this->con, "UPDATE players SET active=0 WHERE player_id='$old_active_player'");

			return $old_active_player;
		}

		public function countBox() {
			$query = mysqli_query($this->con, "SELECT * FROM moves_history");
			$count = mysqli_num_rows($query);
			return $count;
		}
		
	}

?>