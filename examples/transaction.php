<html>
<head>
  <title>Money Transfer : MIMO</title>
</head>
<body>
<div>
   
    <a href="oauth.php">Home</a>
    <br>
    <a href="userinfo.php">User Profile</a> <br>
<form name="userinfo_form" method="post" action="" >
    <h1>Money Transfer</h1>
    <br>
    note : <input name="txtnote" type="text" id="txtnote">
    <span id="VldNoteReq" style="display:none;">Please enter Note</span>
    <br>
    <br>
    amount : <input name="txtAmount" type="text" id="txtAmount">
    <span id="vldAmountReq" style="display:none;">Please enter Amount</span>
    <br>
    <br>
    <input type="submit" name="btnAmount" value="Money Transfer" id="btnAmount">
    <br>
    </form>
    </div>
<?php
if(isset($_POST['btnAmount'])){ 
	$amount=$_POST['txtAmount'];
	$note=$_POST['txtnote'];
	// Include the Mimo REST Client
	require '../lib/MimoRestClient.php';

	// Include any required keys
	require 'keys.php';

	// Instantiate a new Mimo REST Client
	$Mimo = new MimoRestClient();

	// Seed a previously generated access token
	$Mimo->setToken($token);

	// Perform Transaction
	$transaction = $Mimo->transaction($amount,$note);
	if(!$transaction) { $Mimo->getError(); }else{
		if(empty($transaction['Success'])){
			echo $transaction['Message'];exit;
		}else{
			echo $transaction['Success'];exit;
		}		
	}
}
?>

</body>
</html>
