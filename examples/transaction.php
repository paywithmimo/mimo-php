<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MIMO - Transaction</title>
</head>

<body>
<h1>MIMO - Transaction</h1>
<form method="post">
	<input type="text" placeholder="Amount" name="amount" />
  <br />
  <input type="text" placeholder="notes" name="notes" />
  <br />
	<input type="submit" name="do_transaction" />
</form>
<br />
<br />
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// Include the Mimo REST Client
	require '../lib/MimoRestClient.php';
	
	// Include any required keys
	require 'keys.php';
	
	// Instantiate a new Mimo REST Client
	$Mimo = new MimoRestClient();
	
	// Seed a previously generated access token
	$Mimo->setToken($token);
	
	// Perform Transaction
	$transaction = $Mimo->transaction($amount='100',$note='Mimo Transfer Test 1');
//	print_r($transaction);
	if(!$transaction) 
	{ 
		$Mimo->getError(); 
	}
	else
	{
		print_r($transaction['message']);
	}	
}

?>
</body>
</html>
