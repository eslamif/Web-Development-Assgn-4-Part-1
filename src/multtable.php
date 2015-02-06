<?php
//Enable error detection
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Validate Input
$inputValid = validateFourInputs($_GET);

if($inputValid == true) 
	$inputValid = validateParameters($_GET);

if($inputValid == true)
	$inputValid = validateIntInput($_GET);

//Create table
if($inputValid == true)
	createTable($_GET);


/*-------- FUNCTION DEFINITIONS --------*/
//Validate 4 inputs were passed
function validateFourInputs($http) {
	if(count($http) != 4) {
		echo "Error: you did not enter 4 parameters. Please try again.";
		return false;
	}
	else return true;
}

//Validate parameter names
function validateParameters($http) {
	$paramNames = array('min-multiplicand' => NULL, 'max-multiplicand' => NULL,
			'min-multiplier' => NULL, 'max-multiplier' => NULL);
	
	$invalidNames = array();
	
	foreach($paramNames as $key => $value) {
		if(array_key_exists($key, $http) == false) {
			array_push($invalidNames, $key);
		}
	}
	
	//Prompt user with missing parameters
	$elementCount = 0;
	if(count($invalidNames) == 0)
		return true;
	else {
		echo "The following parameters are missing: [";
		foreach($invalidNames as $key => $value) {
			echo "$invalidNames[$key]";
			$elementCount++;
			if($elementCount < count($invalidNames)) {
				echo " ... ";
			}
		}
		echo "]<br>";
		return false;
	}
}

function validateIntInput($http) {
	$invalidInt = array();
	
	foreach($http as $httpKey => $httpValue) {
		if(ctype_digit($httpValue) == false) {
			array_push($invalidInt, $httpKey);
		}
	}

	//Prompt user with missing parameters
	$elementCount = 0;
	if(count($invalidInt) == 0)
		return true;
	else {
		echo "The values for the following parameters are not integers: [";
		foreach($invalidInt as $key => $value) {
			echo "$invalidInt[$key]";
			$elementCount++;
			if($elementCount < count($invalidInt)) {
			echo " ... ";
			}
			}
			echo "]<br>";
				return false;
	}	
}


//Create table
function createTable($http) {
	//Calculate table height & width
	foreach($http as $key => $value) {
		if($key == "max-multiplicand") 
			$maxHeight = $value;
		else if($key == "min-multiplicand")
			$minHeight = $value;
		else if($key == "max-multiplier")
			$maxWidth = $value;
		else if($key == "min-multiplier")
			$minWidth = $value;
	}
	
	$height = $maxHeight - $minHeight + 2;
	$width = $maxWidth - $minWidth + 2;
	
	//Draw table
	echo "<table>";
	for($i = 0; $i < $height; $i++) {
		echo "<tr>";
		for($j = 0; $j < $width; $j++) {
			echo "<td>Width</td>";
		}
		echo "</tr>";
	}
	echo"</table>";
}














?>