<?php $title = 'Private diaries'; ?>

  		<?php include('includes/header.php');?>
		<?php include('includes/nav.php');?>
        
        
        <div class="row-fluid" >
            <div class="">
                
                <div class="span9 sidebar">
<?php 


 // For testing purposes:
 //$_SESSION['user_id'] = 1;
 //$_SESSION['user_tz'] = 'America/New_York';
  //$_SESSION = array();

 // Need the database connection:
/* require_once('mysqli_connect.php');

  $display = 10;
  
  if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.

 $pages = $_GET['p'];

 } else { // Need to determine.

 // Count the number of records:
 $q = "SELECT COUNT(subjects) FROM threads";
 $r = @mysqli_query ($dbc, $q);
 $row = @mysqli_fetch_array ($r, MYSQLI_NUM);
 $records = $row[0];

 // Calculate the number of pages...
 if ($records > $display) { // More than

 $pages = ceil ($records/$display);
 } else {
	
	$pages = 1;
 }

 } // End of p IF.

 
 
 // Determine where in the database to

 if (isset($_GET['s']) && is_numeric ($_GET['s'])) {
 $start = $_GET['s'];
 } else {
 $start = 0;
 }
 // The language ID is stored in the session.
 // Check for a new language ID...
/* if (isset($_GET['lid']) &&
is_numeric($_GET['lid'])) {
 $_SESSION['lid'] = (int) $_GET['lid'];
 } elseif (!isset($_SESSION['lid'])) {
$_SESSION['lid'] = 1; // Default.
 }

 // Get the words for this language.
 $words = FALSE; // Flag variable.
 if ($_SESSION['lid'] > 0) {
 $q = "SELECT * FROM words WHERE lang_id
= {$_SESSION['lid']}";
 $r = mysqli_query($dbc, $q);
 if (mysqli_num_rows($r) == 1) {
 $words = mysqli_fetch_array($r,
MYSQLI_ASSOC);
 }
 }

 // If we still don't have the words, get the default language:
 if (!$words) {
 $_SESSION['lid'] = 1; // Default.
 $q = "SELECT * FROM words WHERE lang_id
= {$_SESSION['lid']}";
 $r = mysqli_query($dbc, $q);
 $words = mysqli_fetch_array($r,
MYSQLI_ASSOC);
 }

 mysqli_free_result($r);*/
 ?>

 <style type="text/css" media="screen">
 /*body { background-color: #ffffff; }

 .content {
 background-color: #f5f5f5;
 padding-top: 10px; padding-right:
10px; padding-bottom: 10px; paddingleft:
10px;
 margin-top: 10px; margin-right: 10px;
margin-bottom: 10px; margin-left:
10px;
 }

 a.navlink:link { color: #003366; textdecoration:
none; }
 a.navlink:visited { color: #003366;
text-decoration: none; }
 a.navlink:hover { color: #cccccc; textdecoration:
none; }

 .title {
 font-size: 24px; font-weight: normal;
color: #ffffff;
 margin-top: 5px; margin-bottom: 5px;
margin-left: 20px;
 padding-top: 5px; padding-bottom: 5px;
padding-left: 20px;
 }*/
 </style>
 

 <table width="90%" border="0"
cellspacing="10" cellpadding="0"
align="center">
<tr>
 <td colspan="2" bgcolor="#003366"
align="center"></td>
 </tr>

 <tr>
 <td valign="top" nowrap="nowrap"
width="10%"><b>
 <?php // Display links:

/* // Default links:
 echo '<a href="index.php"
class="navlink">' . $words['home'] .
'</a><br />
 <a href="forum.php" class="navlink">' .
$words['forum_home'] . '</a><br />';


 // Display links based upon login status:
 if (isset($_SESSION['user_id'])) {

 // If this is the forum page, add a link for posting new threads:
 if (stripos($_SERVER['PHP_SELF'],
'forum.php')) {
 echo '<a href="post.php"
class="navlink">' .
$words['new_thread'] .
'</a><br />';
 }

 // Add the logout link:
 echo '<a href="logout.php"
class="navlink">' . $words['logout'] .
'</a><br />';

 } else {
	// Register and login links:
 echo '<a href="register.php"
class="navlink">' . $words['register'] .
'</a><br />
 <a href="login.php" class="navlink">' .
$words['login'] . '</a><br />';

 }

 // For choosing a forum/language:
 echo '</b><p><form action="forum.php"
method="get">
 <select name="lid">
 <option value="0">' . $words['language'] .
'</option>
 ';

 // Retrieve all the languages...
 $q = "SELECT lang_id, lang FROM languages
ORDER BY lang_eng ASC";
 $r = mysqli_query($dbc, $q);
 if (mysqli_num_rows($r) > 0) {
 while ($menu_row =
mysqli_fetch_array($r, MYSQLI_NUM)) {
 echo "<option
value=\"$menu_row[0]\">$menu_row[1]
</option>\n";
 }
 }
 mysqli_free_result($r);
 unset($menu_row);

 echo '</select><br />
 <input name="submit" type="submit"
value="' . $words['submit'] . '" />
 </form></p>
 </td>

 <td valign="top" class="content">';*/
 ?>            
        <?php # Script 15.4 - forum.php
 // This page shows the threads in a forum.
 

 // Retrieve all the messages in this forum...

 // If the user is logged in and has chosen

 // use that to convert the dates and

/* if (isset($_SESSION['user_tz'])) {
 $first = "CONVERT_TZ(p.posted_on, 'UTC',
'{$_SESSION['user_tz']}')";
 $last = "CONVERT_TZ(p.posted_on, 'UTC',
'{$_SESSION['user_tz']}')";
 } else {*/
/* $first = 'p.posted_on';
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
 echo '<div>';

 // Fetch each thread:
 while ($row = mysqli_fetch_array($r,
MYSQLI_ASSOC)) {

 echo '<h3 class=""><a href="read.php?tid=' . $row['thread_id'] . '">' . $row['subject'] . '</a></h3>';

 }

 echo '</div>'; // Complete the table.

 } else {
 echo '<p><a href="post.php">Click here</a> to create your personalized online diary.</p>';
 }

 if ($pages > 1) {

 // Add some spacing and start a

 echo '<br /><p>';

 // Determine what page the script is on:
 $current_page = ($start/$display) + 1;
 if ($current_page != 1) {

'<a href="manage.php?s=' . ($start - $display) . '&p=' . $pages . '">Previous</a> ';
 }

 // Make all the numbered pages:
 for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="manage.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '">' . $i . '</a> ';
 } else {
 echo $i . ' ';
 }
 } // End of FOR loop.

 // If it's not the last page, make a

 if ($current_page != $pages) {
 echo '<a href="manage.php?s=' .($start + $display) . '&p=' . $pages .'">Next</a>';
 }

 echo '</p>'; // Close the paragraph.

} // End of links section.

 
 */?>
           
        		</div>
             
			</div><!-- content -->
		</div>
        
        
        
        
		<?php // include('includes/footer.php');?>    
    
	<script src="js/jquery.js"></script>
    <script src="js/jq.js"></script>
	<script>
		$(document).ready(function(){
		$('#managep').addClass('active');
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
