<?php
	$SerialToCheck = "1603LZ0D" . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . "8"; // XXX8
	$SerialToCheck1 = "1552LZ0D" . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . "8"; // XXX8
	$SerialToCheck2 = "1503LZ0D" . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . "8"; // XXX8
	$SerialToCheck3 = "1546MR0A" . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9); //XXXX
	$SerialArray = array($SerialToCheck, $SerialToCheck1, $SerialToCheck2, $SerialToCheck3);
	$randomSerial = $SerialArray[array_rand($SerialArray)];
	echo "<p>Trying: " . $randomSerial . "</p>";
	$url = "https://support.logitech.com/apexremote";
	$data = "{\n\t\"action\": \"SupportFindProductRegistrationController\",\n\t\"method\": \"fetchProductFromSerial\",\n\t\"data\": [\n\t\t\"" . $randomSerial . "\",\n\t\t\"en_us\"\n\t],\n\t\"type\": \"rpc\",\n\t\"tid\": 5,\n\t\"ctx\": {\n\t\t\"csrf\": \"blah\",\n\t\t\"vid\": \"\",\n\t\t\"ns\": \"\",\n\t\t\"ver\": 30\n\t}\n}";
	$data_string = json_encode($data);
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type:application/json',
		'referer: https://support.logitech.com/en_us/register'
	));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	$result= curl_exec ($ch);
	echo $result;
	curl_close($ch);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<title>logitech serial generator</title>
</head>
<body>
</body>
</html>
