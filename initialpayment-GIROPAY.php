<?php 
function initialPayments() {
	$url = "https://test.oppwa.com/v1/payments";
	$data = "authentication.userId=8a8294184b4f2868014b4f86f767015d" .
		"&authentication.password=F8T7N4PD" .
		"&authentication.entityId=8a8294184b4f2868014b4f87bf160173" .
		"&amount=92.12" .
		"&currency=EUR" .
		"&paymentBrand=GIROPAY" .
		"&paymentType=PA" .
		"&bankAccount.bic=TESTDETT421" .
		"&bankAccount.iban=DE14940593100000012346" .
		"&bankAccount.country=DE" .
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
$responseData = initialPayments();
echo $responseData;
?>