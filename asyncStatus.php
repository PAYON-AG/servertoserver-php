<?php 
function request() {
	$url = "https://test.oppwa.com/v1/payments/8a8294494f72e836014f83b142787af3";
	$url .= "?authentication.userId=8a8294174b7ecb28014b9699220015cc";
	$url .= "&authentication.password=sy6KJsT8";
	$url .= "&authentication.entityId=8a8294174b7ecb28014b9699220015ca";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;
}
$responseData = request();
echo $responseData;
?>
