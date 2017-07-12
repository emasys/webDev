<?php

/*function absolute_url ($page = 'index.php'){
	
	$url ='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
	
	//REMOVE any trailling slashes
	
	$url= rtrim($url, '/\\');
	
	//add the site
	
	$url .= '/' . $page;
	
	//return url
	
	return $url;
	}*/// end of absolute
	
	
function check_login ($dbc, $email = '' , $pass = '' ){
	
	$errors = array();
	
	//validate email
	
	if(empty($email)){
		
		$errors[] = "you forgot to type your email";
		}else{
			$e = mysqli_real_escape_string($dbc, trim($email));
			}
	
	
	//validate password
	
	if(empty($pass)){
		
		$errors[] = "you forgot to type your email";
		}else{
			$p = mysqli_real_escape_string($dbc, trim($pass));
			}
			
	
	if(empty($errors)){
		$q = "SELECT first_name , user_id FROM user WHERE email='$e' AND pass= SHA1('$p')"; 
		
		$r = @mysqli_query($dbc, $q);
		
		
		//check result
		
	if(mysqli_num_rows($r)==1){
		
		//fetch the result
		
		$row= mysqli_fetch_array($r, MYSQLI_ASSOC);
		
		return array(true, $row);
		
		}else{
			$errors[] = "your informations are wrong";
			
			}
		}
	}

?>