<?php 
function deleteRegistration() {
	$url = "https://test.oppwa.com/v1/registrations/8a8294494cfff3e0014d04c4789b5193";
	$url .= "?authentication.userId=8a8294174b7ecb28014b9699220015cc" .
		"&authentication.password=sy6KJsT8" .
		"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'DELETE');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;
}
$responseData = deleteRegistration();
echo $responseData;
?>