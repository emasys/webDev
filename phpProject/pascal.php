<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div align="center">
<form action='pascal.php' method='post'>
<input type='text' name='val' style='' placeholder="Enter any number">
<input type="submit" value='Get Pascal'>
</form>
<?php

$value = @$_POST['val'];
//factorial
function factorial($n){
	if($n == 1 || $n == 0){
		return 1;
		}else{
			return factorial($n-1) * $n;
			
			}
	
	}

//A function that computes combination
function combination($n){
$top = factorial($n);

for($r = 0; $r <= $n; $r++){
	$s = $n - $r;
	$second = factorial($s);
	$facR = factorial($r);
echo $top / ($second * $facR) . " ";



	}

}

echo"<p style='color: #777; font-size: 2em;'>The pascal triangle for \"$value\" is: </p>";
for($j = 0; $j < $value; $j++){
	echo "<table>
	<tr ><td>"."</td><td >".combination($j)."</td></tr>
	</table>";
	}


?>
</div>
</body>
</html>