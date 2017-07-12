<?php $title = 'Registration Form';

  		include('includes/header.php');
		include('includes/nav.php');
		
?>
    
                
<div class="row-fluid">
 <div class="text-center text-error">           
 <?php

 
 // Check if the form has been submitted:
 if (isset($_POST['submitted'])) {

 require_once ('mysqli_connect.php');
// Connect to the db.

 $errors = array(); // Initialize an error array.

 // Check for a first name:
 if (empty($_POST['first_name'])) {
 $errors[] = 'You forgot to enter your first name.';
 } else {
 $fn = trim($_POST['first_name']);
 }

 // Check for a last name:
 if (empty($_POST['last_name'])) {
 $errors[] = 'You forgot to enter your last name.';
 } else {
 $ln = trim($_POST['last_name']);
 }

 

 
 // Check for a gender:
 if (empty($_POST['gender'])) {
 $errors[] = 'You forgot to choose your gender.';
 } else {
 $gd = trim($_POST['gender']);
 }
 

 

 // Check for an email address:
 if (empty($_POST['email'])) {
 $errors[] = 'You forgot to enter your
email address.';
 } else {
 $e = trim($_POST['email']);
}

 // Check for a password and match against the confirmed password:
 if (!empty($_POST['pass1'])) {
 if ($_POST['pass1'] !=
$_POST['pass2']) {
 $errors[] = 'Your password did not
match the confirmed password.';
 } else {
 $p = trim($_POST['pass1']);
 }
 } else {
 $errors[] = 'You forgot to enter your
password.';
 }

 if (empty($errors)) { // If everything's OK.

 // Register the user in the database...

 // Make the query:
 $q = "INSERT INTO user (first_name, last_name, gender, email, pass, reg_date) 
 VALUES ('$fn', '$ln', '$gd', '$e' ,SHA1('$p'), NOW() )";
 $r = @mysql_query ($q); // Run the query.
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
//include ('footer.html');


 } // End of if ($r) IF.

 mysql_close(); // Close the database connection.

 
 
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

 } // End of the main Submit conditional.
 ?>
 </div>
 	<div class="row-fluid">
	<div class="span9 custom-container" id="register">
        <form class="form-horizontal" id="registerHere" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
	
             <div class=" ">
             <header>
            	<h2>Registration Form</h2>
                <p class="text-error">Please fill the form carefully as all fields are required... </p>
            </header>
            	<legend><h3>Personal Information</h3></legend>
             	<div class="">
                <div class="control-group">
                	<label class="control-label">First Name</label>
               	 	<div class="controls">
                		<input type="text" class="input-xxlarge"  required  id="first" name="first_name" placeholder="enter your first name" 
                        value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" />
                	</div>
                </div>
                
                <div class="control-group">
               		<label class="control-label">Last Name</label>
                	<div class="controls">
                		<input type="text" class="input-xxlarge"  required  name="last_name" id="last" placeholder="enter your last name"
                        value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>" />
                	</div>
                </div>
                
                                
                <div class="control-group">
                	<label class="control-label">Gender</label>
                	<div class="controls">
                		<select name="gender" required>
                       		<option name="male" value="male">Male</option>
                            <option name="female"  value="female">Female</option>
                            
                        </select>
                	</div>
                </div>
                

                
                
                
                </div>
                <legend><h3>Login Information</h3></legend>
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
                		<input type="password" class="input-xxlarge"  required  id="pass1" name="pass1" placeholder="enter your password">
                	</div>
                </div>
                <div class="control-group">
                	<label class="control-label">Confirm Password</label>
                	<div class="controls">
                		<input type="password" class="input-xxlarge"  required  id="pass2" name="pass2" placeholder="confirm your password">
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
    
	<script src="js/jquery.js"></script>
    <script src="js/jq.js"></script>
	<script>
		$(document).ready(function(){
		$('.carousel').carousel();
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
