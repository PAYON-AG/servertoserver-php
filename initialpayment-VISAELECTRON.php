<?php 
function initialPayment() {
	$url = "https://test.oppwa.com/v1/payments";
	$data = "authentication.userId=8a8294174b7ecb28014b9699220015cc" .
		"&authentication.password=sy6KJsT8" .
		"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1" .
		"&amount=92.00" .
		"&currency=EUR" .
		"&paymentBrand=VISAELECTRON" .
		"&paymentType=PA" .
		"&card.number=4917300800000000" .
		"&card.holder=Jane Jones" .
		"&card.expiryMonth=05" .
		"&card.expiryYear=2018" .
		"&card.cvv=123";
	
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