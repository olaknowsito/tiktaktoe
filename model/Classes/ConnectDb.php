<?php 
	Class ConnectDb {
		private $con;

		public function dbConnection() {
			$this->con = mysqli_connect("d6q8diwwdmy5c9k9.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "yq81l3ubfab8m3na", "utahtcg5ni58z09x", "w2y4gwabtqrm6uzk");
			return $this->con;
		}
	}

?>