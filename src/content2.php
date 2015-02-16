<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html');

session_start();
	
if($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_SESSION['loggedIn'])) {
	echo "You must log in first. Please click 
	<a href=http://localhost/myhost-exemple/cs290-ass4-p1/src/login.php>here</a> to log in.";
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') {
	session();	
}


/*------ FUNCTION DEFINITIONS ------*/
function session() {
	//Track and greet user
	if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['loggedIn'])) {	
		if(!isset($_SESSION['visits2'])) {
			$_SESSION['visits2'] = -1;
		}
		
		$_SESSION['visits2']++;
		greetUser();			
	}	
}

//Greet user
function greetUser() {
	echo "Hi $_SESSION[username], you have visited this content2.php page $_SESSION[visits2] times.";
	echo "Click <a href=http://localhost/myhost-exemple/cs290-ass4-p1/src/content1.php?action=end>here</a> to logout";
	echo "<br><br>";
	echo "Click <a href=http://localhost/myhost-exemple/cs290-ass4-p1/src/content1.php>here</a> to go to content1.php";
}
?>