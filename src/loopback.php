<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Determine server request type
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	httpToJson($_POST);
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') {
	httpToJson($_GET);
}

function httpToJson($type) {
	foreach($type as $key => $value) {						//iterate through http keys and values
		if($key != "" && $value == "") {					//if key=true && value=false, value = undefined
			$type[$key] = "undefined";
		}
		else if($key == "" && $value == "") {			//if no key or value passed
			
		}
	}
	
	//Structure array to {"Type":"[GET|POST]","parameters":{"key1":"value1", ... ,"keyn":"valuen"}}
	$httpType =  $_SERVER['REQUEST_METHOD'];
	$type = array('parameters'=>$type);						//add second array for parameters
	$type = array('Type'=>$httpType) + $type;				//prepend type:GET|POST
	
	global $jsonObject;
	$jsonObject = json_encode($type);
	echo $jsonObject;
}



/* The following code should produce the same result, but receiving fatal error at line 34.
 
$test = restructureHttp($http);
$jsonObject = httpToJson(&$test);	//Fatal error: Call-time pass-by-reference has been removed in line 34
displayHttp($jsonObject);

//Structure array to {"Type":"[GET|POST]","parameters":{"key1":"value1", ... ,"keyn":"valuen"}}
function restructureHttp(&$http) {
	$httpType =  $_SERVER['REQUEST_METHOD'];
	$http = array('parameters'=>$http);						//add second array for parameters
	$http = array('Type'=>$httpType) + $http;				//prepend type:GET|POST
	return $http;
}

//Convert http string to JSON object
function httpToJson(&$http) {
	$jsonObject = json_encode($http);
	return $jsonObject;
}

function displayHttp(&$input) {
	echo $input . "<br>";
}
*/
?>
