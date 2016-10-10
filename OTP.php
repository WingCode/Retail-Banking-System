<?php
	// Textlocal account details
	$username = 'smallstar1234@gmail.com';
	$hash = 'Smallstar1234';
	
	// Message details
	$numbers = array(8280294927, 447987654321);
	$sender = urlencode('OTP');
	$message = rawurlencode('You have accessed banking section');
 
        $numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>