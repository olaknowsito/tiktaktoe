<?php 
	Class Player {
		private $con;
		private $list_of_employees;
		private $points_history;

		public function __construct() {
			$timezone = date_default_timezone_set('Asia/Manila');
			$connection = new ConnectDb();
			$this->con = $connection->dbConnection();
		}

		public function selectActive() {
			$query = mysqli_query($this->con, "SELECT * FROM players WHERE active=1");
			$row = mysqli_fetch_assoc($query);
			return $row;
		}

		public function clearMoveHistory() {
			$query = mysqli_query($this->con, "TRUNCATE TABLE `moves_history`");
			return;
		}

	}

?>