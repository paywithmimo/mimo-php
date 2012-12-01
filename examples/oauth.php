<?php
// Include the Mimo REST Client
include('../lib/MimoRestClient.php');

// Include any required keys
include('keys.php');

// Instantiate a new Mimo REST Client
$Mimo = new MimoRestClient($apiKey, $apiSecret, $redirectUri);
/**
 * STEP 1: 
 *   Create an authentication URL
 *   that the user will be redirected to
 **/


if(!isset($_GET['code']) && !isset($_GET['error'])) {
	$authUrl = $Mimo->getAuthUrl();
	header("Location: {$authUrl}");
}

/**
 * STEP 2:
 *   Exchange the temporary code given
 *   to us in the querystring, for
 *   a never-expiring OAuth access token
 **/
if(isset($_GET['error'])) {
	echo "There was an error. Mimo said: {$_GET['error_description']}";
}

else if(isset($_GET['code'])) {
	$code = $_GET['code'];
  
	

	$token = $Mimo->requestToken($code); 
	if(!$token) { $Mimo->getError(); } // Check for errors
	else {
		if(!isset($_SESSION))
			session_start();
		$_SESSION['token'] = $token;
		// Print the access token
		echo $_SESSION['token'];
	} 
}

?>