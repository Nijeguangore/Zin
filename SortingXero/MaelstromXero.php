<?php
	$loginSuccess = false;
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
		if(password_verify($_POST['passcode'],$dbCode)){
			session_id("Zinner");
			session_start();
			$_SESSION["playerName"] = $_POST['moniker'];
			$_SESSION["playerLock"] = $dbCode;
			$_SESSION["playerPersona"] = $personaValue;
			$loginSuccess = true;
		}
		else{
			echo "SumtingWong";
		}
	}
	else{
		echo "Fetch failure";
	}
	$dbConn->close();
	if($loginSuccess){
		header ("Location:../Boot/XeroLanding.php");
		die();
	}
	else{
		header("Location: ./LocateUser.php");
	}
?>
