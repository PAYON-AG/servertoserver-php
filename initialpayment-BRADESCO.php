<?php 
function initialPayment() {
	$url = "https://test.oppwa.com/v1/payments";
	$data = "authentication.userId=8a8294174b7ecb28014b9699220015cc" .
		"&authentication.password=sy6KJsT8" .
		"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1" .
		"&amount=1.03" .
		"&currency=BRL" .
		"&paymentBrand=BRADESCO" .
		"&paymentType=PA" .
		"&customer.givenName=Braziliano" .
		"&customer.surname=Babtiste" .
		"&billing.city=Brasilia" .
		"&billing.country=BR" .
		"&billing.state=DE" .
		"&billing.street1=Amazonstda" .
		"&billing.postcode=12345678" .
		"&customParameters[BRADESCO_cpfsacado]=11111111111" .
		"&shopperResultUrl=https://docs.oppwa.com" .
		"&testMode=EXTERNAL";
	
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
$responseData = initialPayment();
echo $responseData;
?>