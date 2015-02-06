<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);

$inputValid = validateFourInputs($_GET);



/*------ FUNCTION DEFINITIONS ------*/
//Validate multiplicand and multiplier inputs
function validateFourInputs($http) {
	//4 parameters passed?
	if(count($http) != 4) {
		echo "Error: please input 4 parameters. Refresh the page and try again.";
		return false;
	}

	//Validate parameter names
	$paramNames = array('min-multiplicand' => NULL, 'max-multiplicand' => NULL,
						'min-multiplier' => NULL, 'max-multiplier' => NULL);

	foreach($paramNames as $paramKey => $paramValue) {
		foreach($http as $httpKey => $httpValue) {
			if(strcmp($paramKey, $httpKey) == true) {
				echo "worked <br>";
				unset($paramKey);
				break;
			}
		}
	}

	var_dump($http);
	var_dump($paramNames);
}

	/*
function validateInputNames($http, $inputValid) {
	


	if($http['min'])
		echo "true";
	else
		echo "false";
	
	foreach($http as $key => $value) {
		if($key == "min") {
			echo "success <br>";
		}
		else {
			echo "no <br>";
		}
	}

}
	*/
?>