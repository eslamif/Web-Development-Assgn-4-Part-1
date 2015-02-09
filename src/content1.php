<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: text/html');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	session($_POST);
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') {
	session($_GET);	
}


/*------ FUNCTION DEFINITIONS ------*/
//Track Session
function session($http) {
	//Start and End session
	session_start();
	if(isset($http['action']) && $http['action'] == 'end') {
		//End session
		$_SESSION = array();
		session_destroy();
		
		//Redirect user
		/*
		$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
		$filePath = implode('/', $filePath);
		$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
		header("Location: {$redirect}/Logout.html", true);
		die();	
		*/
	}
	
	//Active session - write and read
	if(session_status() == PHP_SESSION_ACTIVE) {
		validateUsername($_POST['username']);
		
		//Validate username
		if(isset($http['username'])) {
			$_SESSION['username'] = $http['username'];
		}
		
		//Set user status as logged in
		if(!isset($_SESSION['loggedIn'])) {
			$_SESSION['loggedIn'] = true;
		}
		
		//Track number of visits
		if(!isset($_SESSION['visits'])) {
			$_SESSION['visits'] = 0;
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
	}
}

//Greet user
function greetUser() {
	echo "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times. \n";
	echo "Click <a href=http://localhost/myhost-exemple/cs290-ass4-p1/src/login.php>here</a> to logout";
}






?>