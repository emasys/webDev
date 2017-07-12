<?php $title = "Login"; ?>

  		<?php include('includes/header.php');?>
		<?php include('includes/nav.php');?>
        
        <?php

require_once('config.inc.php');



//include('header.php');

if(isset($_POST['submitted'])){
	
	
	require_once(MYSQL);
	
	if(!empty($_POST['user'])){
		
		$un = mysqli_real_escape_string($dbc, $_POST['user']);
		
		}else{
			
			$un = FALSE;
			
			echo '<div class="alert alert-error" >You forgot to enter your username</div>';
			
			}
			
	
	if(!empty($_POST['password'])){
		
		$p = mysqli_real_escape_string($dbc, $_POST['password']);
		
		}else{
			
			$p = FALSE;
			
			echo '<div class="alert alert-error" >You forgot to enter your password</div>';
			
			}
	
	
	if($un && $p){
		
		//$q = "SELECT user_id, first_name, user_level FROM users WHERE (email='$e' AND pass=SHA1('$p')) AND active IS NULL";
		
		$q = "SELECT * FROM user WHERE (username='$un' AND pass=SHA1('$p')) "; //AND active IS NULL";
		
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if(@mysqli_num_rows($r) == 1 ){
			
			$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC);
			
			mysqli_free_result($r);
			
			mysqli_close($dbc);
			
			
			$url = BASE_URL . 'index.php';
			
			ob_end_clean();
			
			header("Location: $url");
			
			exit();
			
			}else{
				
				echo '<div class="alert alert-error">Either the email address and password 
				entered do not match those on file or you have 
				not yet activated your account.</div>';
				
				}
		}else{
			echo '<div class="alert alert-error">Please try again.</div>';
			}
			
			mysqli_close($dbc);
	
	}



?>
        
<div class="row-fluid">
	<div class="span9 custom-container" id="register">
        <form class="form-horizontal"  action="login.php" method="post">
            <fieldset>
	
             <div class=" ">
             <header>
            	<h2>Login</h2>
             </header>
            	<legend><h3>only if you have an account</h3></legend>
             	<div class="">
                <div class="control-group">
                	<label class="control-label">username</label>
               	 	<div class="controls">
                		<input type="text" class="input-xxlarge" id="user"  name="user" placeholder="enter your username" />
                	</div>
                </div>
                
                <div class="control-group">
               		<label class="control-label">Password</label>
                	<div class="controls">
                		<input type="password" class="input-xxlarge"  id="password"  name="password"  placeholder="enter your password" />
                	</div>
                </div>
                <div class="control-group">
                	<label class="control-label"></label>
                	<div class="controls">
                
                <input type="submit" class="btn btn-primary" value="login"/>
                 <input type="hidden" name="submitted" value="TRUE" />
				</div>
                </div>
	</div>
</div>
</fieldset>
</form>
</div>
</div>
		<?php include('includes/footer.php');?>    
    
	<script src="js/jquery.js"></script>
    <script src="js/jq.js"></script>
    <script>
		
		$(document).ready(function() {
            $('#signin').hide();
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

    