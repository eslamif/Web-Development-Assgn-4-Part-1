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
	if($httpRequest == NULL) {
		$httpRequest = array('TYPE' => 'GET|POST', 'parameters' => 'null');	
		return $httpRequest;
	}
	else if($httpRequest != NULL) {					
		foreach($httpRequest as $key => $value) {					
			if($key != NULL && $value == NULL) {					
				$httpRequest[$key] = NULL;
			}
		}
		$httpType =  $_SERVER['REQUEST_METHOD'];
		$httpRequest = array('parameters'=>$httpRequest);						
		$httpRequest = array('Type'=>$httpType) + $httpRequest;				
		return $httpRequest;
	}
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
?>
