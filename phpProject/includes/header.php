<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title; 
	
			
	
	?></title>
    
 <?php    
			ob_start();
			session_start();
			//$_SESSION['user_id'];
			 require_once('mysqli_connect.php');
 //The language ID is stored in the session.
 // Check for a new language ID...
 if (isset($_GET['lid']) && is_numeric($_GET['lid'])) {
 $_SESSION['lid'] = (int) $_GET['lid'];
 } elseif (!isset($_SESSION['lid'])) {
$_SESSION['lid'] = 1; // Default.
 }

 // Get the words for this language.
 $words = FALSE; // Flag variable.
 if ($_SESSION['lid'] > 0) {
 $q = "SELECT * FROM words WHERE lang_id = {$_SESSION['lid']}";
 $r = mysqli_query($dbc, $q);
 if (mysqli_num_rows($r) == 1) {
 $words = mysqli_fetch_array($r, MYSQLI_ASSOC);
 }
 }

 // If we still don't have the words, get the default language:
 if (!$words) {
 $_SESSION['lid'] = 1; // Default.
 $q = "SELECT * FROM words WHERE lang_id = {$_SESSION['lid']}";
 $r = mysqli_query($dbc, $q);
 $words = mysqli_fetch_array($r, MYSQLI_ASSOC);
 }

 mysqli_free_result($r);
 ?>
 	<script src="js/jquery-1.6.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="css/mystyles.css" rel="stylesheet" media="screen">
    <link href="css/signin.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body id="home">