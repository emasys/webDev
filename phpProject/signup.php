<?php $title = 'Registration Form';

  		include('includes/header.php');?>
		<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
		<script type="text/javascript">
       /* $(document).ready(function()
{
$("#username").change(function() 
{ 

var username = $("#username").val();
var msgbox = $("#status");


if(username.length > 3)
{
$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

$.ajax({  
    type: "POST",  
    url: "check_ajax.php",  
    data: "username="+ username,  
    success: function(msg){  
   
   $("#check").ajaxComplete(function(event, request){ 

	if(msg == 'OK')
	{ 
	
	    $("#username").removeClass("text-error");
	    $("#username").addClass("text-success");
        msgbox.html('<font color="Green"> Available </font>  ');
	}  
	else  
	{  
	     $("#username").removeClass("text-success");
		 $("#username").addClass("text-error");
		msgbox.html(msg);
	}  
   
   });
   } 
   
  }); 

}
else
{
 $("#username").addClass("text-error");
$("#status").html('<font color="#cc0000">Enter valid User Name</font>');
}



return false;
});

$("#email").change(function() 
{ 

var email = $("#email").val();
var msgbox = $("#statue");


if(email.length > 8)
{
$("#statue").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

$.ajax({  
    type: "POST",  
    url: "check_email.php",  
    data: "email="+ email,  
    success: function(msg){  
   
   $("#statue").ajaxComplete(function(event, request){ 

	if(msg == 'OK')
	{ 
	
	    $("#email").removeClass("red");
	    $("#email").addClass("green");
        msgbox.html('<font color="Green"> Available </font>  ');
	}  
	else  
	{  
	     $("#email").removeClass("green");
		 $("#email").addClass("red");
		msgbox.html(msg);
	}  
   
   });
   } 
   
  }); 

}
else
{
 $("#email").addClass("red");
$("#statue").html('<font color="#cc0000">Enter valid email address</font>');
}



return false;
});

});*/
</script>
		<?PHP include('includes/nav.php');
		
?>
    
                
<div class="row-fluid">
 <div class="text-center text-error">           
 <?php





require_once('config.inc.php');



$page_title = 'Registeration Page';

	if(isset($_POST['submitted'])){
		
		require_once(MYSQL);
		
		
		
		$trimmed = array_map('trim', $_POST);
		
		
		$un = $gd = $e = $p = FALSE;
		
		
		if(!empty($_POST['username'])){
			
			$un = mysqli_real_escape_string($dbc, $trimmed['username']);
			
			
			}else{
				echo '<div class="alert alert-error"> please enter your username.</div>';
				}
				
				
		if(!empty($_POST['gender'])){
			
			$gd = mysqli_real_escape_string($dbc, $trimmed['gender']);
			
			
			}else{
				echo '<p class="error"> please select your gender.</p>';
				}
				
		
		
		if(preg_match('/^[\w.-]+@[\w.-]+\.[A-Za-z]{2,6}$/i', $trimmed['email'])){
			
			$e = mysqli_real_escape_string($dbc, $trimmed['email']);
			
			
			}else{
				echo '<p class="error"> please enter a valid email address.</p>';
				}
		
		
		
		if(preg_match('/^\w{4,40}$/i', $trimmed['password1'])){
			
			if($trimmed['password1'] == $trimmed['password2']){
				
			$p = mysqli_real_escape_string($dbc, $trimmed['password1']);	
				
				}else{
					echo '<p class="error"> your password did not match the confirmed password.</p>';
					
					}
			
			}else{
				echo '<p class="error"> please enter your password.</p>';
				}
				
				
				if($un && $gd && $e && $p){
					
					//$q = "SELECT user_id FROM user WHERE email = '$e'";
					
					//$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br/>MySQL Error: " . mysqli_error($dbc));
					
					
					//if(mysqli_num_rows(r) == 0){
						
						$a = md5(uniqid(rand(), true));
						
						$q = "INSERT INTO  user (email, pass, username, gender, active, registration_date) 
						VALUE ('$e', SHA1('$p'), '$un', '$gd', '$a', NOW() )";
						
						/*$q = "INSERT INTO  users(email, pass, first_name, last_name, active, registration_date) 
						VALUE ('$e', SHA1('$p'), '$fn', '$ln', '$a', NOW() )";*/
						
						
						$r = mysqli_query($dbc, $q) or trigger_error("Query: $q\n<br/>MySQL Error: " . mysqli_error($dbc));
						
						
					if(mysqli_affected_rows($dbc) == 1){
						
						//$body = " thank you for registering here. To activate your account, click on this link:\n\n";
						
						//$body .= BASE_URL . 'activate.php?x=' . urlencode($e) . "&y=$a";
						
						//mail($trimmed['email'], 'Registration confirmation', $body, 'From: admin@site.com');
						
						
						echo '<h3 class="text-success">Thank you for registering! A comfirmation email has been sent to you. please click the link in that email 
						to activate your account.</h3>';
						
						include('includes/footer.php');
						exit();
						
						}else{
							echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
							
							}
						
						
						
						/*}else{
							echo '<p class="error">That email address has already been registered. If you have forgotten your password,
							use the link at right to have your password sent to you.</p>';
							}*/
					}else{
						echo '<p class="error">Please re-enter your passwords and try again.</p>';
						}
						
						mysqli_close($dbc);
		
		}//submitted


?>

<?php


 /*
 // Check if the form has been submitted:
 if (isset($_POST['submitted'])) {

 require_once ('mysqli_connect.php');
// Connect to the db.

 $errors = array(); // Initialize an error array.

 // Check for a username:
 if (empty($_POST['username'])) {
 $errors[] = 'You forgot to enter your username.';
 } else {
 $un = mysqli_real_escape_string($dbc,trim($_POST['username']));
 }


 
 // Check for a gender:
 if (empty($_POST['gender'])) {
 $errors[] = 'You forgot to choose your gender.';
 } else {
 $gd = mysqli_real_escape_string($dbc,
trim($_POST['gender']));
 }
 

 

 // Check for an email address:
 if (empty($_POST['email'])) {
 $errors[] = 'You forgot to enter your
email address.';
 } else {
 $e = mysqli_real_escape_string($dbc,
trim($_POST['email']));
}

 // Check for a password and match against the confirmed password:
 if (!empty($_POST['password1'])) {
 if ($_POST['password1'] !=
$_POST['password2']) {
 $errors[] = 'Your password did not
match the confirmed password.';
 } else {
 $p = mysqli_real_escape_string($dbc,
trim($_POST['password1']));
 }
 } else {
 $errors[] = 'You forgot to enter your
password.';
 }

 if (empty($errors)) { // If everything's OK.

 // Register the user in the database...

 // Make the query:
 $q = "INSERT INTO user (username, gender, email, pass, registration_date) 
 VALUES ('$un', '$gd', '$e' ,SHA1('$p'), NOW() )";
 $r = @mysqli_query ($dbc, $q); // Run the query.
 if ($r) { // If it ran OK.

 // Print a message:
 echo '<span class="text-success"><h1>Thank you!</h1>
 <p>You are now registered.<a href="login.php" class="btn btn-success">click here</a> to log in!</p><p><br /></p></span>';
//include ('footer.html');
 } else { // If it did not run OK.

 // Public message:
echo '<h1>System Error</h1>
 <p class="error">You could not be registered due to a system error.
We apologize for any inconvenience.</p>
<p class="error">click your back button to go back to the sign up page or <a href="signup.php" class="btn btn-info">click here</a> to restart.</p>';
include ('includes/footer.php');


 } // End of if ($r) IF.

 mysqli_close($dbc); // Close the database connection.

 
 
 exit();

 } else { // Report the errors.

 echo '<h1>Error!</h1>
 <p class="error">The following
error(s) occurred:<br />';
 foreach ($errors as $msg) { // Print each error.
 echo " - $msg<br />\n";
 }
 echo '</p><p>Please try
again.</p><p><br /></p>';

 } // End of if (empty($errors)) IF.

 mysqli_close($dbc); // Close the database connection.

 } */ // End of the main Submit conditional.
 ?>
 </div>
 	<div class="row-fluid">
	<div class="span9 custom-container" id="register">
        <form class="form-horizontal" id="registerHere" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
	
             <div class=" ">
             <header>
            	<h2>Registration Form</h2>
                <p class="text-success">Please fill the form carefully as all fields are required... </p>
            </header>
            	<legend><h3>Personal Information</h3></legend>
             	<div class="">
                <div class="control-group">
                	<label class="control-label">Username</label>
               	 	<div class="controls">
                		<input type="text" class="input-xxlarge"  required id="username" name="username" placeholder="enter your preferred username" 
                        value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>" />
                        <span id="status"></span>
                	</div>
                </div>
                
                
                
                                
                <div class="control-group">
                	<label class="control-label">Gender</label>
                	<div class="controls">
                		<select name="gender" required>
                       		<option name="null" value="null">Select your Gender</option>
                            <option name="male" value="male">Male</option>
                            <option name="female"  value="female">Female</option>
                            
                        </select>
                	</div>
                </div>
                

                
                
                
                </div>
                
               <div class="control-group">
                	<label class="control-label">Email</label>
                	<div class="controls">
               	 		<input type="text" class="input-xxlarge"  required  name="email" placeholder="enter a valid email address" id="email"
                        value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /><span id="statue" class="label"></span>
                	</div>
                </div>
                
                <div class="control-group">
                	<label class="control-label">Password</label>
                	<div class="controls">
                		<input type="password" class="input-xxlarge"  required  id="password1" name="password1" placeholder="enter your password">
                	</div>
                </div>
                <div class="control-group">
                	<label class="control-label">Confirm Password</label>
                	<div class="controls">
                		<input type="password" class="input-xxlarge"  required  id="password2" name="password2" placeholder="confirm your password">
                	</div>
                </div>                
                

                
                <div class="control-group">
                	<label class="control-label"></label>
                	<div class="controls">
                		<button type="submit" class="btn btn-primary" >Create My Account</button>
                        <button type="reset" class="btn btn-info" id="reset" >Clear and Restart</button>
                	</div>
                </div>
		</div>
        <input type="hidden" name="submitted" value="TRUE" />
      </fieldset>
     </form>
     </div> 
     
     <div class="span3 sidebar">
     	<legend><h3>Getting Started</h3></legend>
            <p>
            	To get started you need to <a href="signup.php">sign Up</a> first. After you have done that, you can now beging to store your day-to-day
                activities in our unlimited database.... 
            </p>
            <a href="signup.php" class="btn btn-primary">Register Now</a>
     </div>
     </div>      
     </div>  
    


       
       
       
       
       
       
       	<?php include('includes/footer.php');?>    
    <script src="js/jquery-1.6.4.min.js"></script>
    
	<script src="js/jquery.js"></script>
    <script src="js/jq.js"></script>
	<script>
		
		$(document).ready(function() {
            $('#signup').hide();
        }); 
    </script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script> 
    
     </body>
</html>
