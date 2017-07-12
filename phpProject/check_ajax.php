<?php

include('mysqli_connect.php');


if(isset($_POST['username']))
{
$un = $_POST['username'];
//$username = mysqli_real_escape_string($username);
$sql_check = mysqli_query("SELECT user_id FROM users WHERE username='$un'");

if(mysqli_num_rows($sql_check))
{
echo '<font color="#cc0000"><STRONG>'.$un.'</STRONG> is already in use.</font>';
}
else
{
echo 'OK';
}

}


?>