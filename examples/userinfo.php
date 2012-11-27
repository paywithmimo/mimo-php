<?php
// Include the Mimo REST Client
require '/lib/MimoRestClient.php';

// Include any required keys
require '/keys.php';

// Instantiate a new Mimo REST Client
$Mimo = new MimoRestClient();

// Seed a previously generated access token
$Mimo->setToken($token);

// To get user account basic information
$user_info = $Mimo->getUser($userField='username',$datastring='mimo-php');
if(!$user_info) { $Mimo->getError(); }else{
	print_r($user_info);
}
?>