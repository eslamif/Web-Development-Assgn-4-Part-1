<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);




//Determine server request type
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo "It's a POST request! <br>";
}
else if($_SERVER['REQUEST_METHOD'] == 'GET') {
	echo "It's a GET request! <br>";
	httpToJson($_GET);

}



//Convert httpRequest to JSON object
function httpToJson($type) {
	foreach($type as $key => $value) {
		echo "$key : $value <br>";	
	}
	
	//Structure array to {"Type":"[GET|POST]","parameters":{"key1":"value1", ... ,"keyn":"valuen"}}
	$httpType =  $_SERVER['REQUEST_METHOD'];
	$type = array('parameters'=>$type);				//add second array for parameters
	$type = array('Type'=>$httpType) + $type;		//prepend type:GET|POST
	

	
	

	
	
	global $jsonObject;
	$jsonObject = json_encode($type);
	echo $jsonObject;
}




?>
