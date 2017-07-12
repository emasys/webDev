<?php

if(!isset($_COOKIE['user_id'])){
	//$url = "index.php";
	header('Location: index.php');
	exit();
	}else{
		
		setcookie('user_id' , '' , time()-3600, '/', '', 0, 0);
		setcookie('first_name' , '' , time()-3600, '/', '', 0, 0);
		}
	
	$title = "logout";
	
	  	include('includes/header.php');
		include('includes/nav.php');
	echo "<h1>LOGGED OUT!</h1>
	
	<p>you are now logged OUT {$_COOKIE['first_name']}</p>
	<p><a href=\"logout.php\"></a></p>";
	
	include('includes/footer.php');

?>