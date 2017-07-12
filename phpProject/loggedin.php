<?php

if(!isset($_COOKIE['user_id'])){
	//$url = "index.php";
	header('Location: index.php');
	exit();
	}
	
	$title = "loggedin!";
	
	  	include('includes/header.php');
		include('includes/nav.php');
	echo "<h1>LOGGED IN!</h1>
	
	<p>you are now logged in {$_COOKIE['first_name']}</p>
	<p><a href=\"logout.php\"></a></p>";
	
	include('includes/footer.php');
	

?>