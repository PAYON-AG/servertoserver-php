<?php 
function initialPayment() {
	$url = "https://test.oppwa.com/v1/payments";
	$data = "authentication.userId=8a8294174b7ecb28014b9699220015cc" .
		"&authentication.password=sy6KJsT8" .
		"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1" .
		"&amount=92.12" .
		"&currency=EUR" .
		"&paymentBrand=PAYOLUTION_ELV" .
		"&paymentType=DB" .
		"&customer.givenName=Jane" .
		"&customer.surname=Jones" .
		"&customer.email=test@test.com" .
		"&customer.ip=123.123.123.123" .
		"&billing.city=Munich" .
		"&billing.country=DE" .
		"&billing.street1=123 Street" .
		"&billing.postcode=A1 2BC" .
		"&customParameters[PAYOLUTION_ITEM_PRICE_1]=2.00" .
		"&customParameters[PAYOLUTION_ITEM_DESCR_1]=Test item #1" .
		"&customParameters[PAYOLUTION_ITEM_PRICE_2]=3.00" .
		"&customParameters[PAYOLUTION_ITEM_DESCR_2]=Test item #2" .
		"&testMode=EXTERNAL" .
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