<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);

//***************************************************************************************************
//***************************************************************************************************
//CHANGES TO MAKE BEFORE SUBMITTING
//form action to ONID path


//Log out of SESSION?
if(isset($_GET['logout']) && $_GET['logout'] == true) {
	echo "Log out";
}
?>


<!-- Username form -->
<form action="http://localhost/myhost-exemple/cs290-ass4-p1/src/content1.php" method="POST">
	<input type="text" name="username" > Username
	<br>
	<button type="submit">Login</button>
	<!--<button name="login">Login</button>-->
</form>