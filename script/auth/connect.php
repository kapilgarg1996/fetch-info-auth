<?php
	function connect(){
		$servername = "localhost" ;
		$username = "root" ;
		$password = "kapilgarg" ;
		$dbname = "fetchinfoauth" ;
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		return $conn ;
	}
?>