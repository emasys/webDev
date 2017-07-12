<?php
define ('LIVE', TRUE);
define('EMAIL', 'emasysnd@gmail.com');
define('BASE_URL', 'http://localhost/project/');

define('MYSQL', 'mysqli_connect.php');

//date_default_timezone_set('US/Eastern');

/*

//create error handler

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars){
	
	$message = "<p>
				An error occurred in the script '$e_file' on line $e_line: $e_message\n<br/>";
				
	$message .= "date/time" . date('n-j-Y H:i:s') . "\n<br/>";
	
	$message .= "<pre>" . print_r($e_vars, 1) . "</pre>\n
	</p>";
	
	if(!LIVE){
		echo '<div id="error">' . $message . '</div><br/>';
		}else{
			mail(EMAIL, 'site error!', $message , 'From: emasysnd@gmail.com' );
			
			
	if($e_number != E_NOTICE){
		echo '<div id="error" class="alert alert-error" >A system error occured, we appologise for the inconveniences.</div><br/>';
		}
	}
	
	}
	
	set_error_handler('my_error_handler');
*/
?>