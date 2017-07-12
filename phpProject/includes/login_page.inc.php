<?php

$title = "login";

	include('includes/header.php');
	include('includes/nav.php');
	
	if(!empty($errors)){
		echo "<h1> ERROR! </h1>
		
		<p class=\"error\"> the following error(s) occurred:<br/>";
		
		foreach($errors as $msg){
			echo "- $msg <br/>\n";
			}
			
			echo "</p><p>please try again.</p>";
		}


?>


<div class="row-fluid">
	<div class="span9 custom-container" id="register">
        <form class="form-horizontal"  action="login.php" method="post">
            <fieldset>
	
             <div class=" ">
             <header>
            	<h2>Login</h2>
                <p class="text-error">Please fill the form carefully as all fields are required... </p>
            </header>
            	<legend><h3>only if you have an account</h3></legend>
             	<div class="">
                <div class="control-group">
                	<label class="control-label">email</label>
               	 	<div class="controls">
                		<input type="text" class="input-xxlarge"   name="email" placeholder="enter your email" />
                	</div>
                </div>
                
                <div class="control-group">
               		<label class="control-label">password</label>
                	<div class="controls">
                		<input type="password" class="input-xxlarge"    name="pass"  placeholder="enter your password" />
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

<?php
include("includes/footer.php");
?>