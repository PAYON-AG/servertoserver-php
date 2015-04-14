<?php 
function initialPayment() {
	$url = "https://test.oppwa.com/v1/payments";
	$data = "authentication.userId=8a8294184b4f2868014b4f86f767015d" .
		"&authentication.password=F8T7N4PD" .
		"&authentication.entityId=8a8294184b4f2868014b4f87bf160173" .
		"&amount=12.03" .
		"&currency=EUR" .
		"&paymentBrand=EPS" .
		"&paymentType=PA" .
		"&bankAccount.country=AT" .
		"&shopperResultUrl=https://docs.oppwa.com";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData= curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;
}
$responseData= initialPayment();
echo $responseData;
?>