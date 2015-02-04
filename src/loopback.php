<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "R1 <br>";


//Determine server request type
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo "It's a POST request! <br>";
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') {
	echo "It's a GET request! <br>";

	foreach($_GET as $key => $value) {
		echo "$key : $value <br>";
	}

}



//echo htmlspecialchars($_GET["name"]);
?>
