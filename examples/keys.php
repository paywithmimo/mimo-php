<?php
session_start();
// Access token parameters
$apiKey='NfXwj_-nso1NYdpZ';
$apiSecret='xv-lHx9FusqgBWbEWkjDSn5x';
$permissions='';
$redirectUri = 'http://192.168.101.111:641/examples/oauth.php';
if(isset($_SESSION['token']))
	$token=$_SESSION['token'];
else
	$token = '';
	
?>
