
<div class="content  row-fluid">
			
            <div class="container">
            <div class="row-fluid header clearfix">
            	
            	<a href="index.php" class="brand"><img src="img/reallogo.fw.png"/></a>
                
            </div>
	<div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="containe">
                 
          <div class="">
          
 <?php
     /*     $first = 'p.posted_on';
 $last = 'p.posted_on';
 $un = $_SESSION['username'];
// }

 // The query for retrieving all the threads in this forum, along with theoriginal user,
 // when the thread was first posted, when it was last replied to, and how many replies it's had:
$q = "SELECT t.thread_id, t.subject,
username , COUNT(post_id) - 1 AS responses,
MAX(DATE_FORMAT($last, '%e-%b-%y %l:%i
%p')) AS last, MIN(DATE_FORMAT($first,
'%e-%b-%y %l:%i %p')) AS first FROM
threads AS t INNER JOIN posts AS p USING
(thread_id) INNER JOIN user AS u ON
t.user_id = u.user_id  WHERE username = '$un'  GROUP BY (p.thread_id)
ORDER BY last ASC LIMIT $start, $display";
 $r = mysqli_query($dbc, $q);
 if (mysqli_num_rows($r) > 0) {

 // Create a table:
 //echo '<div>';

 // Fetch each thread:
 /*while ($row = mysqli_fetch_array($r,
MYSQLI_ASSOC)) {

 echo '<h3 class="link"><a href="read.php?tid=' . $row['thread_id'] . '">' . $row['subject'] . '</a></h3>';

 }

 echo '</div>'; // Complete the table.

 } else {
 echo '<p><a href="post.php">Click here</a> to create your personalized online diary.</p>';
 }*/
?>
  
            <ul class="nav">
              <li class="link" id="homep"><a href="index.php">Home</a></li>
              <li  class="link" id="postp"><a href="post.php">New Diary</a></li>
    <?php if(!isset($_SESSION['user_id'])){echo '<li  class="link" id="explorep"> <a href="explore.php">Explore</a></li>' ;} 
          //if(isset($_SESSION['user_id'])) {echo '<li  class="link" ><a href="manage.php"></a></li>';}
          if(!isset($_SESSION['user_id'])){echo '<li  class="link" id="postp"><a href="post.php">Create your diary</a></li>' ;}
          if (isset ($_SESSION['user_id'])){
		   require_once('mysqli_connect.php');
		   
		 $first = 'p.posted_on';
		 $last = 'p.posted_on';
		 $un = $_SESSION['username'];
		// }
		
		 // The query for retrieving all the threads in this forum, along with theoriginal user,
		 // when the thread was first posted, when it was last replied to, and how many replies it's had:
		$q = "SELECT t.thread_id, username FROM threads AS t INNER JOIN posts AS p USING (thread_id)
		 INNER JOIN user AS u ON t.user_id = u.user_id  WHERE username = '$un' ";
		
		 $r = mysqli_query($dbc, $q);
		 if (mysqli_num_rows($r) > 0) {   
          if ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

 		  echo '<li class="link" id="managep"><a href="read.php?tid=' . $row['thread_id'] . '"> Manage your diary </a></li>';
		  
		   }  
		 
			 }//else {echo '<li  class="link" id="postp"><a href="post.php">Create your diary</a></li>' ;} 
}?>
              


            </ul>
             <ul class="nav pull-right">
             
             <?php

	if(isset($_SESSION['user_id'])){
     			
		 echo "<li class=\"link\"><a href=\"logout.php\" title=\"click to logout\">{$_SESSION['username']}</a></li>
     		
     ";
     
    if($_SESSION['username']=='aaa'){
    echo '
		<li class="link"><a href="view_users.php" title="view">view users</a></li>
        <li class="link"><a href="#" title="view">some admin link</a></li>
    ';
    
    }
    }else{
    	echo '<li class="link" id="signup"><a href="signup.php" title="register">Sign Up</a></li>
        	  <li class="link" id="signin"><a href="login.php" title="login">Sign In</a></li>
            
                
        ';
    
    }

?>
             
               
                <li id="form">
                	
                    <!-- <form class="navbar-form pull-right" method="POST" action=" //$_SERVER['PHP_SELF']?>">
                      <input class="input-large" type="text" placeholder="Email" name="email">
                      <input class="input-large" type="password" placeholder="Password" name="pass">
                      <button type="submit" class="btn">Sign in</button>
                      <a href="signup.php" class="btn">sign up</a>
                    </form>-->
            	</li>
            </ul>
 
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    