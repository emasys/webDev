
		

	<div class="row-fluid" >
    <div class="">
        
        <div class="span12 sidebar">
        	<legend><h3>
            
            <?php
            if(isset($_SESSION['user_id'])){
				
				echo' It\'s your world, RULE IT!';
				
				}else{
            
            	echo 'Getting Started';
            }
            ?>
            </h3></legend>
            <p>
			
			<?php
            
				if(isset($_SESSION['user_id'])){
      echo "welcome back {$_SESSION['username']}, let's continue from where we stopped that last time. ";
	 }else{
		 
		 echo '
		 
		 To get started you need to <a href="signup.php">sign Up</a> first. After you have done that, you can now begin to store your day-to-day
		 activities in our unlimited database....
		  <a href="signup.php" class="btn btn-primary">Register Now</a>
		 ';
		 
		 }
			
			?>
            	 
            </p>
           
        </div>
             
	</div><!-- content -->
	</div>
		