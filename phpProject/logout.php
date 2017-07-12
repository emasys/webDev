<?php 
// This is the logout page for the site.

 require_once ('config.inc.php');
 $page_title = 'Logout';
 include ('includes/header.php');


 if (!isset($_SESSION['user_id'])) {

 $url = BASE_URL . 'index.php'; 
 ob_end_clean(); // Delete the buffer.
 header("Location: $url");
 exit(); // Quit the script.

 } else { // Log out the user.

 $_SESSION = array(); 
 session_destroy(); // Destroy the session itself.
 setcookie (session_name(), '', time()- 300); // Destroy the cookie.

 }

 // Print a customized message:
 header("Location: $url");
 exit();
 ?>