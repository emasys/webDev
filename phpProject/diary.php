<?php 
 $title = 'Read through';
 include ('includes/header.php');
 include('includes/nav.php');
 ?>
 
 
  	<div class="row-fluid">
	<div class="span9 custom-container" id="register">
 
 <?php
 echo '<h1>Read through</h1>';

 require_once ('mysqli_connect.php');

 // Number of records to show per page:
 //$display = 3;

 // Determine how many pages there are...
 //if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.

 //$pages = $_GET['p'];

 //} else { // Need to determine.

 // Count the number of records:
 /*$q = "SELECT COUNT(user_id) FROM users";
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
 }*/

 // Make the query:
 $q = "SELECT messages, DATE_FORMAT(posted_on, '%e-%b-%y %l:%i %p') AS dr, user_id FROM users ORDER BY posted_on 
 ASC LIMIT $start, $display";
 $r = @mysqli_query ($dbc, $q);

 // Table header:
/* echo '<table class="table table-striped">
 <thead>
 <tr>
 <th align="left"><b>Edit</b></th>
 <th align="left"><b>Delete</b></th>
 <th align="left"><b>Last Name</b></th>
 <th align="left"><b>First Name</b></th>
 <th align="left"><b>Date Registered</b></th>
 </tr> ';*/

 // Fetch and print all the records....

 //$bg = '#eeeeee'; // Set the initial


while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

 //$bg = ($bg=='#eeeeee' ? '#ffffff' : '#eeeeee'); // Switch the background


 echo $row['messeges'] ;

 } // End of WHILE loop.

 
 mysqli_free_result ($r);
 mysqli_close($dbc);

 // Make the links to other pages, if

 if ($pages > 1) {

 // Add some spacing and start a

 echo '<br /><p>';

 // Determine what page the script is on:
 $current_page = ($start/$display) + 1;
 if ($current_page != 1) {

'<a href="view_users.php?s=' . ($start - $display) . '&p=' . $pages . '">Previous</a> ';
 }

 // Make all the numbered pages:
 for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="view_users.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '">' . $i . '</a> ';
 } else {
 echo $i . ' ';
 }
 } // End of FOR loop.

 // If it's not the last page, make a

 if ($current_page != $pages) {
 echo '<a href="view_users.php?s=' .($start + $display) . '&p=' . $pages .'">Next</a>';
 }

 echo '</p>'; // Close the paragraph.

} // End of links section.

?>   
   </div>
   </div>

<?php
 include ('includes/footer.php');
   ?>
   
   