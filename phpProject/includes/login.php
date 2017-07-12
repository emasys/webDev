<?php

if(isset($_POST['submitted'])){
	
	require('login_function.php');
	
	require('mysqli_connect.php');
	
	list($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
	
	if($check){
		setcookie('user_id',$data['user_id'], time()+3600, '/', '', 0, 0);
		setcookie('first_name',$data['first_name'], time()+3600, '/', '', 0, 0);
		
		//$url = 'loggedin.php';
		
		header('Location: loggedin.php');
		
		exit();
		}else{
			
			$errors = $data;
			
			}
			
			mysqli_close($dbc);
	
	}

include("login_page.inc.php");

?>