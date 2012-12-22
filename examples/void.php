<html>
<head>
  <title>Money Transfer : MIMO</title>
</head>
<body>
<div>
   
    <a href="oauth.php">Home</a>
    <br>
    <a href="userinfo.php">User Profile</a> <br>
   <a href="transaction.php">Money Transfer</a><br>
   <a href="refund.php">Refund</a><br>
   
<form name="userinfo_form" method="post" action="" >
    <h1>Cancel Transaction</h1>
    <br>
    Transaction ID : <input name="txtTxnID" type="text" id="txtTxnID">
    <span id="valtxtTxnID" style="display:none;">Please enter Transaction ID</span>
    <br>
    <br>
    <input type="submit" name="btnVoid" value="Cancel Transaction" id="btnVoid">
    <br>
    </form>
    </div>
<?php
if(isset($_POST['btnVoid'])){ 
  $txtTxnID=$_POST['txtTxnID'];
	// Include the Mimo REST Client
	require '../lib/MimoRestClient.php';
	// Include any required keys
	require 'keys.php';
	// Instantiate a new Mimo REST Client
	$Mimo = new MimoRestClient();
	// Seed a previously generated access token
	$Mimo->setToken($token);

	// Perform Transaction
	$void = $Mimo->void($txtTxnID);
	print_r($void);exit;
	if(!$void) { $Mimo->getError(); }else{

		if(empty($void['Success'])){
			echo $void['Message'];exit;
		}else{
			echo $void['Success'];exit;
		}		
	}
}
?>

</body>
</html>
