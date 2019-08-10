<?php
	function connect()
	{	

		$conn = mysqli_connect("127.0.0.1", "root", "", "qlbanhang");
		mysqli_set_charset($conn, 'UTF8');

		return $conn;
	}
?>