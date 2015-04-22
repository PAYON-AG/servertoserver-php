<?php 
function registration() {
	$url = "https://test.oppwa.com/v1/registrations";
	$data = "authentication.userId=8a8294174b7ecb28014b9699220015cc" .
		"&authentication.password=sy6KJsT8" .
		"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1" .
		"&paymentBrand=DIRECTDEBIT_SEPA" .
		"&bankAccount.bic=MARKDEF1100" .
		"&bankAccount.iban=DE23100000001234567890" .
		"&bankAccount.country=DE" .
		"&bankAccount.holder=Jane Jones";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;
}
$responseData = registration();
echo $responseData;
?>