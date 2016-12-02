<?php
	$mysqlUser = "root";
	$mysqlDb = "Gsource";
	$mysqlPass = "ayeDiosmio420";
	$server = "localhost";

	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);

	$dbConn = new mysqli($server,$mysqlUser,$mysqlPass,$mysqlDb);
	$userExistQuery = 
		$dbConn->prepare("Select codeId,personaSeed from Users where moniker = ?");
	$userExistQuery->bind_param("s",$givenName);
	$givenName = $_POST['moniker'];
	
	$userExistQuery->execute();
	$userExistQuery->bind_result($dbCode,$personaValue);
	if($userExistQuery->fetch()){
		echo $personaValue;
	}
	else{
		echo "Shag me baby";
	}
	$dbConn->close();
?>
