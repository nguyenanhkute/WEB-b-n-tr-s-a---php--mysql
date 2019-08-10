<?php
	include 'C:\xampp\htdocs\anatea\connect.php';
	include 'C:\xampp\htdocs\anatea\model\search.php';

	$search = isset($_POST['txtSearch']) ? $_POST['txtSearch'] : '';
	if ($search !== "") 
	{
		$num = mysqli_fetch_row(search($search));
		if ($num > 0 && $search != "") 
		{
			echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
			header("Location:\anatea\search.php?name=$search");
		}
		else 
		{
			header("Location:\anatea\search.php?name=null");	
		}
	}	
	else
	{
		header("Location:\anatea\search.php?name=null");
	}
?>
