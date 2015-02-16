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
else if($_SERVER['REQUEST_METHOD'] == 'POST') {
	session($_POST);
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') {
	session($_GET);	
}


/*------ FUNCTION DEFINITIONS ------*/
//Track Session
function session($http) {
	//Start and End session

	if(isset($http['action']) && $http['action'] == 'end') {
		//End session
		$_SESSION = array();
		session_destroy();
		
		//Redirect user
		$redirect = "http://localhost/myhost-exemple/cs290-ass4-p1/src/login.php";
		header("Location: {$redirect}/Logout.html", true);
		die();			
		
		/*
		$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
		$filePath = implode('/', $filePath);
		$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
		header("Location: {$redirect}/Logout.html", true);
		die();	
		*/
	}
	
	//Set username and user status as logged in
	if(session_status() == PHP_SESSION_ACTIVE && !isset($_SESSION['loggedIn'])) {
		$validUsername = validateUsername($_POST['username']);					//Validate username
		
		if($validUsername == true) {
			if(isset($http['username'])) {
				$_SESSION['username'] = $http['username'];
			}
			
			//Set user status as logged in
			if(!isset($_SESSION['loggedIn'])) {
				$_SESSION['loggedIn'] = true;
			}
		}
	}
	
	//Track and greet user
	if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['loggedIn'])) {	
		if(!isset($_SESSION['visits'])) {
			$_SESSION['visits'] = -1;
		}
		
		$_SESSION['visits']++;
		greetUser();			
	}
}

//Validate username
function validateUsername($username) {
	//Username entered?
	if($username == "" || $username == NULL) {
		echo "A username must be entered. Click 
		<a href=http://localhost/myhost-exemple/cs290-ass4-p1/src/login.php>here</a> to return to the Login screen.";
		return false;
	}
	else
		return true;
}

//Greet user
function greetUser() {
	echo "Hi $_SESSION[username], you have visited this content1.php page $_SESSION[visits] times. \n";
	echo "Click <a href=http://localhost/myhost-exemple/cs290-ass4-p1/src/content1.php?action=end>here</a> to logout";
	echo "<br><br>";
	echo "Click <a href=http://localhost/myhost-exemple/cs290-ass4-p1/src/content2.php>here</a> to go to content2.php";
}	
?>