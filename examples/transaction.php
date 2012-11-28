<?php
// Include the Mimo REST Client
require '../lib/MimoRestClient.php';

// Include any required keys
require 'keys.php';

// Instantiate a new Mimo REST Client
$Mimo = new MimoRestClient();

// Seed a previously generated access token
$Mimo->setToken($token);

// Perform Transaction
$transaction = $Mimo->transaction($amount='500',$note='Mimo Transfer Test');
if(!$transaction) { $Mimo->getError(); }else{
	print_r($transaction);
}
?>