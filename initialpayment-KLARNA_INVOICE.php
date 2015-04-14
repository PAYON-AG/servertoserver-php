<?php 
function initialPayment() {
	$url = "https://test.oppwa.com/v1/payments";
	$data = "authentication.userId=8a8294174b7ecb28014b9699220015cc" .
		"&authentication.password=sy6KJsT8" .
		"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1" .
		"&amount=92.12" .
		"&currency=EUR" .
		"&paymentBrand=KLARNA_INVOICE" .
		"&paymentType=PA" .
		"&customer.givenName=Jane" .
		"&customer.surname=Jones" .
		"&billing.country=SE" .
		"&cart.items[0].merchantItemId=1" .
		"&cart.items[0].discount=0.00" .
		"&cart.items[0].quantity=5" .
		"&cart.items[0].name=Product 1" .
		"&cart.items[0].price=1.00" .
		"&cart.items[0].tax=6.00" .
		"&shopperResultUrl=https://docs.oppwa.com";
	
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