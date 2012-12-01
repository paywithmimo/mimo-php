<html>
<head>
  <title>User Search : MIMO</title>
</head>
<body>
    <h1>User Profile</h1>
    <br><form name="userinfo_form" method="post" action="" >

<table >
	<tbody><tr>
		<td><input id="rdblSearchParameter_0" type="radio" name="rdblSearchParameter" value="username" checked="checked"><label for="rdblSearchParameter_0">User Name</label></td>
	</tr><tr>
		<td><input id="rdblSearchParameter_1" type="radio" name="rdblSearchParameter" value="email"><label for="rdblSearchParameter_1">Email</label></td>
	</tr><tr>
		<td><input id="rdblSearchParameter_2" type="radio" name="rdblSearchParameter" value="phone"><label for="rdblSearchParameter_2">Phone</label></td>
	</tr><tr>
		<td><input id="rdblSearchParameter_3" type="radio" name="rdblSearchParameter" value="account_number"><label for="rdblSearchParameter_3">Account Number</label></td>
	</tr>
</tbody></table>
    <br>
    Enter search value :<input name="txtValue" type="text" id="txtValue">
    <span id="VldValueReq" style="display:none;">Please enter serach parameter value</span>
    <br>
    <input type="submit" name="btnSubmit" value="Get User Profile"  id="btnSubmit"></form>
    <br>
    <br>
   
</div>
<?php
if(isset($_POST['btnSubmit'])){
	$field=$_POST['rdblSearchParameter'];
	$datastring=$_POST['txtValue'];
	// Include the Mimo REST Client
	require '../lib/MimoRestClient.php';
	
	// Include any required keys
	require 'keys.php';
	
	// Instantiate a new Mimo REST Client
	$Mimo = new MimoRestClient();
	
	// Seed a previously generated access token
	$Mimo->setToken($token);

	// To get user account basic information
	$user_info = $Mimo->getUser($field,$datastring);
	if(!$user_info) { $Mimo->getError(); }else{
		if(!empty($user_info['account_number'])){
			print_r($user_info);
		}
		if(empty($user_info['Success'])){
			if(isset($user_info['Message']))
			{
				echo $user_info['Message'];
				exit;	
			}
			
		}
		else{
			print_r($user_info);
		}
	}
}
?>

</body>
</html>