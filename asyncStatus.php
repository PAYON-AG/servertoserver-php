<?php 
function getPaymentStatus($paymentId) {
	$url = "https://test.oppwa.com/v1/payments/" . $paymentId .
		"?authentication.userId=8a8294174b7ecb28014b9699220015cc" .
        	"&authentication.password=sy6KJsT8" .
        	"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return json_decode($response, true);
}
$status = getPaymentStatus("8a8294494ce19bdf014ce509f20b13e7");
if (substr($status["result"]["code"], 0, 3) === "000")
{
	echo "SUCCESS &lt;br/>&lt;br/> Here is the result of your transaction: &lt;br/>&lt;br/>";
	print_r($status);
}
else
{
	echo "ERROR &lt;br/>&lt;br/> Here is the result of your transaction: &lt;br/>&lt;br/>";
	print_r( $status);
}
?>