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
		
		
		$data = array(
										'client_id'=>$apiKey,
										'client_secret'=>$apiSecret,
										'about'=>$_POST['sAboutme'],
										'account_type'=>$_POST['sAccountType'],
										'address'=>$_POST['sAddress1'],
										'address_2'=>$_POST['sAddress2'],
										'address_type'=>$_POST['sAddressType'],
										'challenge_answer'=>$_POST['sAnswer'],
										'challenge_question'=>$_POST['sQuestion'],
										'city'=>$_POST['sCity'],
										'country'=>$_POST['sCountry'],
										'dob'=>$_POST['dDOB'],
										'email'=>$_POST['sEmail'],
										'facebook'=>$_POST['sFacebook'],
										'first_name'=>$_POST['sFirstName'],
										'gender'=>$_POST['sGender'],
										'middle_name'=>$_POST['sMiddleName'],
										'password'=>$_POST['sPassword'],
										'pin'=>$_POST['sUserPin'],
										'state'=>$_POST['sState'],
										'surname'=>$_POST['sSurname'],
										'terms_and_conditions'=>'1',
										'twitter'=>$_POST['sTwitter'],
										'username'=>$_POST['sUserName'],
										'website'=>$_POST['sWebsite'],
										'zip'=>$_POST['sZipcode'],
										'mobile_phone'=>$_POST['sMobile']
		);
		
		
		
		//$encodeData = "client_id=$apiKey&client_secret=$apiSecret&about=$Aboutme&account_type=$AccountType&address=$Address1&address_2=$Address2&address_type=$AddressType&challenge_answer=$Answer&challenge_question=$Question&city=$City&country=$Country&dob=$DOB&email=$Email&facebook=$Facebook&first_name=$FirstName&gender=$Gender&middle_name=$MiddleName&password=$Password&pin=$UserPin&state=$State&surname=$Surname&terms_and_conditions=$Terms&twitter=$Twitter&username=$UserName&website=$Website&zip=$Zipcode&company_name=$CompanyName&company_id_number=$CompanyId&rc_incorporation_year=$CompanyYear";
		//echo $encodeData;
		$registration = $Mimo->registration($data);
		
		if(!$registration)
		{
			$Mimo->getError();
		}
		else
		{
			if(empty($registration['Success']))
			{
				echo $registration['Message'];
				exit;
			}
			else
			{
				echo $registration['Success'];
				exit;
			}
		}
		
	}
	else
	{
			
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MIMO - Registration</title>
</head>

<body>

<form name="registration_form" method="post" action="" onsubmit="return validRegister();">
					<h1>User Registration</h1>
					<div class="main_div">
		    			<div class="container_mt">
		    				<span class="ttl01">First Name :</span><input type="text" name="sFirstName" id="sFirstName" maxlength="25" tabindex="1"/>
		    				<span class="reqstar">*</span>
		        		</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Middle Name : </span><input type="text" name="sMiddleName" id="sMiddleName" maxlength="25" tabindex="2"/>
		       			</div>
						<div class="container_mt padt10">
		    				<span class="ttl01">Surname : </span><input type="text" name="sSurname" id="sSurname" maxlength="25" tabindex="3"/>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">User Name : </span><input type="text" name="sUserName" id="sUserName" maxlength="50" tabindex="4"/>
		    				<span class="reqstar">*</span>
		    			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Pin# : </span><input type="text" name="sUserPin" id="sUserPin" maxlength="4" tabindex="5" />
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Password : </span><input type="password" name="sPassword" id="sPassword" maxlength="16" tabindex="6"/>
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Email-Id : </span><input type="text" name="sEmail" id="sEmail" maxlength="100" tabindex="7" />
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Mobile Number : </span><input type="text" name="sMobile" id="sMobile" maxlength="20" tabindex="7" />
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Date of Birth : </span><input type="text" name="dDOB" id="dDOB" maxlength="10" tabindex="8" />
		    				<span class="reqstar">*</span>
		    				<span>(DD/MM/YYYY)</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Gender : </span>
		    				<select name="sGender" id="sGender" tabindex="9" style="width: 167px;">
								<option value="Male" selected="selected">Male</option>
								<option value="Female">Female</option>
							</select>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Account Type : </span>
		    				<select name="sAccountType" id="sAccountType" tabindex="10" style="width: 167px;" onchange="validACType(this.value);">
								<option value="personal" selected="selected">Personal</option>
								<option value="merchant">Merchant</option>
							</select>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Address Type : </span>
		    				<select name="sAddressType" id="sAddressType" tabindex="11" style="width: 167px;">
								<option value="home" selected="selected">Home</option>
								<option value="business">Business</option>
								<option value="mailing">Mailing</option>
							</select>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Address 1 : </span><input type="text" name="sAddress1" id="sAddress1" maxlength="150" tabindex="12" size="20"/>
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Address 2 : </span><input type="text" name="sAddress2" id="sAddress2" maxlength="150" tabindex="13" size="20"/>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">City : </span><input type="text" name="sCity" id="sCity" maxlength="150" tabindex="14" size="20"/>
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">State / Province : </span><input type="text" name="sState" id="sState" maxlength="150" tabindex="15" size="20"/>
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Country : </span><input type="text" name="sCountry" id="sCountry" maxlength="200" tabindex="16" size="20"/>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Zipcode : </span><input type="text" name="sZipcode" id="sZipcode" maxlength="20" tabindex="17" size="20" />
		       			</div>
		       			<div class="container_mt padt10" id="comname" style="display:none;">
		    				<span class="ttl01">Company Name : </span><input type="text" name="sCompanyName" id="sCompanyName" maxlength="100" tabindex="18" size="20"/>
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10" id="comnumber" style="display:none;">
		    				<span class="ttl01">Company# : </span><input type="text" name="sCompanyId" id="sCompanyId" maxlength="50" tabindex="19" size="20" />
		    				<span class="reqstar">*</span>
		    				<span>(RC Number)</span>
		       			</div>
		       			<div class="container_mt padt10" id="comyear" style="display:none;">
		    				<span class="ttl01">Incorporation Year : </span><input type="text" name="nCompanyYear" id="nCompanyYear" maxlength="4" tabindex="20" size="20" />
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Website : </span><input type="text" name="sWebsite" id="sWebsite" maxlength="100" tabindex="21" size="20"/>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Facebook : </span><input type="text" name="sFacebook" id="sFacebook" maxlength="100" tabindex="21" size="20"/>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Twitter : </span><input type="text" name="sTwitter" id="sTwitter" maxlength="100" tabindex="22" size="20"/>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">About Me : </span><textarea name="sAboutme" id="sAboutme" rows="3" cols="17" tabindex="23"></textarea>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Security Question : </span>
		    				<select name="sQuestion" id="sQuestion" tabindex="24" style="width: 190px;">
								<option value="" selected="selected">--- Security Question ---</option>
								<option value="What is your favourite TV show?">What is your favourite TV show?</option>
							</select>
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Answer : </span><input type="text" name="sAnswer" id="sAnswer" maxlength="150" tabindex="25" size="20"/>
		    				<span class="reqstar">*</span>
		       			</div>
		       			<div class="container_mt padt10">
		    				<span class="ttl01">Terms &amp; Conditions : </span><input type="checkbox" disabled="disabled" name="eTerms" id="eTerms" value="1" tabindex="26" checked="checked" />
		       			</div>
		       			<div class="container_mt padt10 regbtn">
		       			<input type="submit" name="btnRegister" value="Register" id="btnRegister" tabindex="27">&nbsp;<input type="reset" name="reset" id="reset" value="Clear" tabindex="28"/>
		       			</div>
		    		</div>
				</form>

</body>
</html>
<?php

	
?>
