<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);

$httpRequest = getHttpRequest();
$httpRequest = prependHttpType($httpRequest);
$jsonObject = httpToJson($httpRequest);
displayReturn($jsonObject);


/*------ FUNCTION DEFINITIONS ------*/
//Determine server request type
function getHttpRequest() {
	 if($_SERVER['REQUEST_METHOD'] == 'POST') {
		return $_POST;
	}
	else if($_SERVER['REQUEST_METHOD'] == 'GET') {
		return $_GET;
	}	
}

//Prepend http request type to http request
function prependHttpType($httpRequest) {
	$httpType =  $_SERVER['REQUEST_METHOD'];
	$httpRequest = array('parameters'=>$httpRequest);						
	$httpRequest = array('Type'=>$httpType) + $httpRequest;				
	return $httpRequest;
}

//Convert http request to JSON object
function httpToJson($httpRequest) {
	$jsonObject = json_encode($httpRequest);
	return $jsonObject;
}

//Return JSON object
function displayReturn($jsonObject) {
	echo $jsonObject . "<br>";
}



/*
//Determine server request type
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	httpToJson($_POST);
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') {
	httpToJson($_GET);
}

function httpToJson($type) {
	if($type == NULL) {
		echo "type is null <br>";
	}
	foreach($type as $key => $value) {						//iterate through http keys and values
		if($key != "" && $value == "") {					//if key=true && value=false, value = undefined
			$type[$key] = NULL;
		}
	}
	
	//Structure array to {"Type":"[GET|POST]","parameters":{"key1":"value1", ... ,"keyn":"valuen"}}
	$httpType =  $_SERVER['REQUEST_METHOD'];
	$type = array('parameters'=>$type);						//add second array for parameters
	$type = array('Type'=>$httpType) + $type;				//prepend type:GET|POST
	
	$jsonObject = json_encode($type);
	echo $jsonObject;
}
*/



?>
