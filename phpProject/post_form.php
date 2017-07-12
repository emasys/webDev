<?php # Script 15.6 - post_form.php
 // This page shows the form for posting messages.
 // It's included by other pages, never called directly.

 // Redirect if this page is called directly:
 /*if (!isset($_SESSION['user_id'])) {
 header ("Location: http://localhost/project/index.php");
 exit();
 }*/
 
 

 // Only display this form if the user is logged in:
if (isset($_SESSION['user_id'])) {

 // Display the form:
 echo '<form action="post.php" method="post" accept-charset="utf-8">';

 // If on read.php...
 if (isset($tid) && $tid) {

 // Print a caption:
 echo "<h3>What's on your mind?</h3>";

 // Add the thread ID as a hidden input:
 echo '<input name="tid"
type="hidden" value="' . $tid . '"
/>';
} else { // New thread

 // Print a caption:
 echo '<legend><h3> New Post </h3></legend>';

 // Create subject input:
 echo '<p><label>Subject</label><input class="input-block-level"  name="subject"
type="text" 
maxlength="100" ';

 // Check for existing value:
 if (isset($subject)) {
 echo "value=\"$subject\" ";
 }

 echo '/></p>';

 } // End of $tid IF.

 // Create the body textarea:
 echo '<p><textarea name="body" rows="8" class="input-block-level">';

 if (isset($body)) {
 echo $body;
 }

 echo '</textarea></p>';

 // Finish the form:
 echo '<input name="submit" class="btn" type="submit"
value="Submit"
/><input name="submitted" type="hidden"
value="TRUE" />
 </form>';

 } else {
 echo '<div class="alert"><a href="login.php">log in</a> or <a href="signup.php">sign up</a> to create your own diary now. </div>';
 }

 ?>